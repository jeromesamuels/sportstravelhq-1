<?php
/**
 * This class manages the composition of the PDF
 * php version 7.1
 *
 * @category Library
 * @package  App\Library
 * @author   Joseph Montane <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */

namespace App\Library;

/**
 * Class HotelAgreementPdfJob
 * php version 7.1
 *
 * @category Library
 * @package  App\Library
 * @author   Joseph Montane <jm@comentum.com>
 * @license  https://opensource.org/licenses/BSD-3-Clause BSD
 * @link     https://sportstravelhq.com
 */
class HotelAgreementPdfJob
{
    const JOB_TYPE_AGREEMENT = 'agreement';
    const JOB_TYPE_BILLING = 'billing';

    /**
     * If the job was executed
     *
     * @var bool
     */
    public $done;

    /**
     * The type of PDF job, agreement or billing
     *
     * @var string
     */
    public $type;


    /**
     * The Gearman job id
     *
     * @var string
     */
    public $id;

    /**
     * The gearman task used to execute the job
     *
     * @var \GearmanTask
     */
    public $job_handle;

    /**
     * The JSON response of the job
     *
     * @var string
     */
    public $data;

    /**
     * The command line operation ran
     *
     * @var string
     */
    public $command;

    /**
     * If the job was successful (PDF created)
     *
     * @var bool
     */
    public $success;

    /**
     * The filename of the tmp PDF
     *
     * @var string
     */
    public $file;

    /**
     * The commandline error output
     *
     * @var string
     */
    public $stderr;

    /**
     * The commandline output
     *
     * @var string
     */
    public $stdout;

    /**
     * The Base64 encoding of the PDF result
     *
     * @var string
     */
    public $pdfEncodedData;

    /**
     * The decoded base64 of pdfEncodedData
     *
     * @var string
     */
    public $pdfData;

    /**
     * If the job is done
     *
     * @return bool
     */
    public function isDone()
    {
        return $this->done;
    }

    /**
     * Set the job done status
     *
     * @param bool $done If the job is done
     *
     * @return void
     */
    public function setDone($done)
    {
        $this->done = $done;
    }

    /**
     * Get the job type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type of job
     *
     * @param string $type Agreement or billing
     *
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get the job id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the job id
     *
     * @param string $id The job ID from Gearman
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the Gearman task
     *
     * @return \GearmanTask
     */
    public function getJobHandle()
    {
        return $this->job_handle;
    }

    /**
     * Set the Gearmand task
     *
     * @param \GearmanTask $job_handle The Gearman task handle
     *
     * @return void
     */
    public function setJobHandle($job_handle)
    {
        $this->job_handle = $job_handle;
    }

    /**
     * Get the data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the data
     *
     * @param string $data The data to set
     *
     * @return void
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Get the pdf command
     *
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Set the PDF command
     *
     * @param string $command The command to set
     *
     * @return void
     */
    public function setCommand($command)
    {
        $this->command = $command;
    }

    /**
     * If the job is successful
     *
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * Sets the success status of the job
     *
     * @param bool $success The success or failure
     *
     * @return void
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }

    /**
     * Get the file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set the file
     *
     * @param string $file The name of the file to set
     *
     * @return void
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * Get the error response
     *
     * @return string
     */
    public function getStderr()
    {
        return $this->stderr;
    }

    /**
     * Set the error response
     *
     * @param string $stderr The error to set
     *
     * @return void
     */
    public function setStderr($stderr)
    {
        $this->stderr = $stderr;
    }

    /**
     * Get the output of the command
     *
     * @return string
     */
    public function getStdout()
    {
        return $this->stdout;
    }

    /**
     * Set the output of the PDF command
     *
     * @param string $stdout The output to set
     *
     * @return void
     */
    public function setStdout($stdout)
    {
        $this->stdout = $stdout;
    }

    /**
     * Parses the json response from the Gearman result
     *
     * @param string $data The JSON data to parse
     *
     * @return void
     */
    public function parseJson($data)
    {
        $data = json_decode($data, true);

        //-- If failed to parse NULL is returned
        if ($data === null) {
            return null;
        }

        if (isset($data['command'])) {
            $this->setCommand($data['command']);
        }

        if (isset($data['file'])) {
            $this->setFile($data['file']);
        }

        if (isset($data['stderr'])) {
            $this->setStderr($data['stderr']);
        }

        if (isset($data['stdout'])) {
            $this->setStdout($data['stdout']);
        }

        if (isset($data['success'])) {
            $this->setSuccess($data['success']);
        }

        if (isset($data['data'])) {
            $this->setPdfEncodedData($data['data']);
        }
    }

    /**
     * Get the encoded data of the PDF
     *
     * @return string
     */
    public function getPdfEncodedData()
    {
        return $this->pdfEncodedData;
    }

    /**
     * Sets the PDF encoded data
     *
     * @param string $pdfEncodedData The base64 encoded data of the PDF
     *
     * @return HotelAgreementPdfJob
     */
    public function setPdfEncodedData($pdfEncodedData)
    {
        $this->pdfEncodedData = $pdfEncodedData;

        return $this;
    }

    /**
     * Get the PDF data
     *
     * @return string
     */
    public function getPdfData()
    {
        return $this->pdfData;
    }

    /**
     * Sets the PDF data
     *
     * @param string $pdfData The raw binary PDF data
     *
     * @return HotelAgreementPdfJob
     */
    public function setPdfData($pdfData)
    {
        $this->pdfData = $pdfData;

        return $this;
    }

    /**
     * Decodes the base64 data of  pdfEncodedData
     *
     * @return bool
     */
    public function decodePdf()
    {
        if ($this->pdfEncodedData !== null && strlen($this->pdfEncodedData) > 0) {
            $pdf_data = base64_decode($this->pdfEncodedData);

            if ($pdf_data !== false) {
                $this->setPdfData($pdf_data);

                return true;
            }
        }

        return false;
    }
}
