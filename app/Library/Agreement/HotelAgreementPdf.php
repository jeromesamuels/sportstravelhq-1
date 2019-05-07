<?php

namespace App\Library;


use GearmanClient;
use GearmanException;
use GearmanTask;

class HotelAgreementPdf
{
    const TYPE_AGREEMENT = 'agreement';
    const TYPE_BILLING = 'billing';

    /**
     * Create a PDF
     *
     * @param array $agreement
     * @param array $billings
     *
     * @return HotelAgreementPdfJob[]|bool
     */
    public static function generateAgreementPDF(array $agreement, array $billings = [])
    {
        //-- Setup Gearman Server
        $gmc = new GearmanClient();
        try {
            $gmc->addServer();
        } catch (GearmanException $e) {
            $error = 'Gearman server may be offline:' . $e->getMessage() . PHP_EOL;

            return false;
        }

        $tasks = [];

        //-- Setup Callback
        $gmc->setDataCallback(function (GearmanTask $task) use (&$tasks) {
            $tasks[$task->unique()]['done'] = true;
            $tasks[$task->unique()]['data'] = $task->data();
        });

        //-- Add PDF tasks
        try {
            $agreement_task_id = bin2hex(random_bytes(16));
        } catch (\Exception $e) {
            $agreement_task_id = uniqid(md5(rand()), true);
        }
        $tasks[$agreement_task_id] = [
            'done' => false,
            'type' => self::TYPE_AGREEMENT,
            'id' => $agreement_task_id,
            'job_handle' => $gmc->addTask('wkhtmltopdf', json_encode([
                'type' => self::TYPE_AGREEMENT,
                'url' => FULLURL . 'hotel-agreement/agreement.php?' . http_build_query(
                        [
                            'trip_id' => $agreement['join_trip_id'],
                            'print'   => 1,
                        ]
                    ),
            ]), null, $agreement_task_id)
        ];

        foreach ($billings as $billing) {
            try {
                $billing_task_id = bin2hex(random_bytes(16));
            } catch (\Exception $e) {
                $billing_task_id = uniqid(md5(rand()), true);
            }
            $tasks[$billing_task_id] = [
                'done' => false,
                'type' => self::TYPE_BILLING,
                'id' => $billing_task_id,
                'job_handle' => $gmc->addTask('wkhtmltopdf', json_encode([
                    'type' => self::TYPE_BILLING,
                    'url' => FULLURL . 'hotel-agreement/credit-card-authorization-form.php?' . http_build_query(
                            [
                                'trip_id' => $billing['join_trip_id'],
                                'hotel_cc_auth_forms_id' => $billing['hotel_cc_auth_forms_id'],
                                'print'   => 1,
                            ]
                        ),
                ]), null, $billing_task_id)
            ];
        }

        if (!$gmc->runTasks()) {
            $error = "Gearman error: " . $gmc->error();

            return false;
        }

        //-- Wait for tasks to complete!
        $n = 0;
        while ($n < 20) { //-- time out after 10 seconds
            $completed = 0;
            foreach($tasks as $job_id => $job) {
                if ($job['done']) {
                    $completed++;
                }
            }

            if ($completed < count($tasks)) {
                $n++;
                usleep(500000);
            } else {
                break;
            }
        }

        //-- Decode json responses
        $jobs = array_map(function ($task) {
            $pdfJob = new HotelAgreementPdfJob();

            if (isset($task['done'])) {
                $pdfJob->setDone($task['done']);
            }

            if (isset($task['data'])) {
                $pdfJob->setData($task['data']);
                $pdfJob->parseJson($task['data']);
            }

            if (isset($task['type'])) {
                $pdfJob->setType($task['type']);
            }

            if (isset($task['id'])) {
                $pdfJob->setId($task['id']);
            }

            if (isset($task['job_handle'])) {
                $pdfJob->setJobHandle($task['job_handle']);
            }

            $pdfJob->decodePdf();

            return $pdfJob;
        }, $tasks);

        return array_values($jobs);
    }

    /**
     * Create final PDF of agreement
     *
     * @param $agreement
     * @param array $billings
     *
     * @return null|\SplFileInfo
     */
    public static function finalizePDF($agreement, array $billings = [])
    {
        $jobs = HotelAgreementPdf::generateAgreementPDF($agreement, $billings);

        //-- Prepare data folder
        $output = SITE_PATH . 'data/hotel-agreements';
        if (!is_dir($output)) {
            mkdir($output, 0775);
        }

        //----------------------------------------------------------------------
        //-- Prepare PDF Agreement for Corporate Hotel
        //----------------------------------------------------------------------
        $agreement_job = $jobs[0]; // Agreement is the first job
        $corp_agreement_filename = $output . '/' . $agreement['join_trip_id'] . '.corp.pdf';
        $corp_agreement_written = file_put_contents(
            $corp_agreement_filename, $agreement_job->getPdfData()
        );
        if (!$corp_agreement_written) {
            return null;
        }

        //----------------------------------------------------------------------
        //-- Prepare PDF Agreement for Hotel and Team
        //----------------------------------------------------------------------
        $pdfs = HotelAgreementPdf::prepareToMerge($jobs);
        $password = Trips::decryptPdfPassword($agreement['join_trip_id']);

        $pdfTempFileName = tempnam('/tmp', uniqid());

        HotelAgreementPdf::mergePdfs($pdfs, $pdfTempFileName, $password);

        //-- Unlink tmp pdfs used to merge
        array_map(function ($filename) {
            unlink($filename);
        }, $pdfs);


        if (is_file($pdfTempFileName) && filesize($pdfTempFileName) > 0) {
            $filename = $output . '/' . $agreement['join_trip_id'] . '.pdf';

            if (is_file($filename)) {
                unlink($filename);
            }

            $copied = copy($pdfTempFileName, $filename);
            unlink($pdfTempFileName);

            if ($copied) {
                $file = new \SplFileInfo($filename);
                return $file;
            }
            return null;
        }

        return null;
    }

    /**
     * Save tasks to file
     *
     * @deprecated
     * @param array $tasks
     */
    public static function tasksToFile($tasks) {
        foreach ($tasks as $task) {
            if ($task['type'] === self::TYPE_AGREEMENT) {
                $folder = SITE_PATH . 'data/hotel-agreements';
                if (!is_file($folder)) {
                    mkdir($folder);
                }
            }
        }
    }

    /**
     * Pdf output to render document
     *
     * @param $filename
     * @param $file_path
     */
    public static function serve($filename, $file_path)
    {
        header("Content-type:application/pdf");
        header("Content-Disposition:inline;filename='${filename}'");
        readfile($file_path);
    }

    /**
     * Write Job PDFs to file and return a list of PDF filenames
     *
     * @param HotelAgreementPdfJob[] $jobs
     *
     * @return array An array of filenames (strings)
     */
    public static function prepareToMerge(array $jobs)
    {
        $filenames = array_map(function (HotelAgreementPdfJob $job) {
            $tmpfname = tempnam('/tmp', uniqid());

            $written = file_put_contents($tmpfname, $job->getPdfData());

            return $tmpfname;

        }, $jobs);

        return $filenames;
    }

    /**
     * Take a list of PDF files and merge, 10 at a time
     *
     * @param array $pdfs
     * @param $output_pdf
     * @param stirng $password The password to protect the resulting PDF with
     */
    public static function mergePdfs(array $pdfs, $output_pdf, $password) {
        $descriptor_spec = array(
            0 => ['pipe', 'r'],  // stdin is a pipe that the child will read from
            1 => ['pipe', 'w'],  // stdout is a pipe that the child will write to
            2 => ['pipe', 'w']   // stderr is a file to write to
        );

        $cwd = SITE_PATH;
        $env = [
            'DISPLAY' => ':1' //-- Uses the display from xvfb running under supervisor
        ];

        //-- We can only process so many PDFs at a time before the command line argument length is maxed so sets of 10.
        $escaped_files_chunks = array_chunk(array_map(function ($pdf) {
            return escapeshellarg($pdf);
        }, $pdfs), 10);

        foreach ($escaped_files_chunks as $escaped_files_chunk) {

            $tmp_file = $output_pdf . '.tmp.pdf';
            if (is_file($output_pdf) && filesize($output_pdf) > 0) {
                rename($output_pdf, $tmp_file);
                //-- We push the last PDF into the front of the list to be merged from top to bottom
                $escaped_files_chunk = array_merge([$tmp_file], $escaped_files_chunk);
            }

            //-- Create an args string from the list of files
            $file_list = implode(' ',$escaped_files_chunk);

            $cmd = 'pdftk ' . $file_list . ' cat output ' . escapeshellarg($output_pdf) . ' user_pw ' . escapeshellarg($password);
//            echo '<pre>', var_dump($cmd), '</pre>';
            $process = proc_open(
                $cmd,
                $descriptor_spec,
                $pipes,
                $cwd,
                $env
            );

            $return_value = false;
            if (is_resource($process)) {
                fclose($pipes[0]);

                $stdout = stream_get_contents($pipes[1]);
                fclose($pipes[1]);

                if (is_file($output_pdf)) {
                    chmod($output_pdf, 0777);
                }

                $stderr = stream_get_contents($pipes[2]);
                fclose($pipes[2]);

                if (strlen($stderr) > 0) {
                    echo '<pre>', $stderr, '<pre>', PHP_EOL;
                }

                $return_value = proc_close($process);
            }

            if (is_file($tmp_file)) {
                unlink($tmp_file);
            }
        }
    }
}
