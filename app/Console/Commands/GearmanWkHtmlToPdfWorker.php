<?php

namespace App\Console\Commands;

use GearmanException;
use GearmanJob;
use GearmanWorker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GearmanWkHtmlToPdfWorker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gearman:wkhtmltopdf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the Gearman worker for processing HTML files to PDF';

    /**
     * The worker ID to track logging
     *
     * @var string
     */
    public $workerId;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        try {
            $this->workerId = bin2hex(random_bytes(16));
        } catch (\Exception $e) {
            $this->workerId = uniqid(md5(rand()), true);
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $worker = new GearmanWorker();
        Log::info('Connecting to gearman server', ['worker_id' => $this->workerId]);
        try {
            $worker->addServer();
        } catch (GearmanException $e) {
            Log::error('Gearman server may be offline:' . $e->getMessage(), ['worker_id' => $this->workerId]);

            return;
        }

        // Add accepted work
        $worker->addFunction("wkhtmltopdf", [$this, 'callback'], $this->workerId);

        // Start the worker
        Log::info('Working...', ['worker_id' => $this->workerId]);
        while ($worker->work()) {
            if ($worker->returnCode() != GEARMAN_SUCCESS) {
                Log::warning('return_code: ' . $worker->returnCode(), ['worker_id' => $this->workerId]);
                break;
            } else {
                Log::info('Job complete', ['worker_id' => $this->workerId]);
            }
        }

        // Work stopped - Long running processes are bad
        Log::info('Shutting down', ['worker_id' => $this->workerId]);
    }

    /**
     * @param \GearmanJob $job      The gearman job to process
     * @param string      $workerId The context passed which is just the worker ID
     */
    public function callback(GearmanJob $job, $workerId)
    {
        $jobId = $job->unique();

        Log::info('Received workload...', [
            'worker_id' => $workerId,
            'job-id'    => $jobId,
        ]);

        $workload = json_decode($job->workload(), true);

        $url = $workload['url'];
        Log::info('Workload:', [
            'workload'  => $workload,
            'worker_id' => $workerId,
            'job-id'    => $jobId,
        ]);

        Log::info('Processing website to PDF', [
            'worker_id' => $workerId,
            'job-id'    => $jobId,
        ]);


        $descriptorspec = array(
            0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
            1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
            2 => array("pipe", "w") // stderr is a file to write to
        );

        $tmpfname = tempnam('/tmp', isset($workload['type']) ? $workload['type'] : uniqid());

        $cwd = realpath(__DIR__ . '/../../..');
        $env = [
            'DISPLAY' => ':1',
        ];
        $cmd = 'wkhtmltox/bin/wkhtmltopdf'
               . ' -d 300 -L 3mm -R 3mm -T 10mm -B 10mm --page-width 215.9mm --page-height 279.4mm'
               . ' --viewport-size 1024x1024'
               . ' --print-media-type'
               . ' --window-status done'
               . ' --javascript-delay 5000'
               . ' --debug-javascript'
               . ' ' . escapeshellarg($url)
               . ' ' . escapeshellarg($tmpfname);

        $process = proc_open($cmd, $descriptorspec, $pipes, $cwd, $env);

        $stdout       = '';
        $stderr       = '';
        $return_value = 0;
        if (is_resource($process)) {
            fclose($pipes[0]);

            $stdout = stream_get_contents($pipes[1]);
            fclose($pipes[1]);

            $stderr = stream_get_contents($pipes[2]);
            fclose($pipes[2]);

            // It is important that you close any pipes before calling
            // proc_close in order to avoid a deadlock
            $return_value = proc_close($process);
        }

        $data = '';
        if (is_file($tmpfname)) {
            $data     = base64_encode(file_get_contents($tmpfname));
            $unlinked = unlink($tmpfname);
            if (!$unlinked) {
                Log::error("Unable to unlink $tmpfname... sometime is wrong!", [
                    'worker_id' => $workerId,
                    'job-id'    => $jobId,
                ]);
            }
        }

        $result = [
            'data'    => $data,
            'command' => $cmd,
            'success' => $return_value === 0 && strlen($data) > 0,
            'file'    => $tmpfname,
            'stderr'  => $stderr,
            'stdout'  => $stdout,
        ];

        Log::info('Sending data back', [
            'worker_id' => $workerId,
            'job-id'    => $jobId,
        ]);

        $data = json_encode($result);

        $sent = $job->sendData($data);

        if (!$sent) {
            Log::info('Unable to send back data', [
                'worker_id' => $workerId,
                'job-id'    => $jobId,
            ]);
        }
    }
}
