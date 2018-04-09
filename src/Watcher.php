<?php

namespace Aurion72\Watcher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Watcher
{
    /**
     * @var \Exception
     */
    private $exception;

    /**
     * @var \Illuminate\Http\Request
     */
    private $request;

    /**
     * @var \GuzzleHttp\Client
     */
    private $guzzle;

    private $additional_information = [];

    private $headers = [];

    private $config;

    public function __construct(Request $request, GuzzleHttp\Client $guzzle)
    {
        $this->request = $request;
        $this->guzzle = $guzzle;
        $this->config = config('aurion72_watcher');
        $this->headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$this->config['access_token'],
        ];
    }

    public function watch(\Exception $exception)
    {
        $this->exception = $exception;

        return $this;
    }

    public function setAdditionalInformation($data)
    {
        if (! is_array($data)) $data = [$data];
        $this->additional_information = $data;

        return $this;
    }

    public function getAdditionalInformation()
    {
        return $this->additional_information;
    }

    public function setHeaders($headers)
    {
        $this->headers = array_merge($headers, $this->headers);

        return $this;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getBody()
    {
        return $this->body = [
            'additional_informations' => serialize($this->additional_information),
            'message' => $this->exception->getMessage(),
            'code' => $this->exception->getCode(),
            'trace' => $this->exception->getTraceAsString(),
            'line' => $this->exception->getLine(),
            'file' => $this->exception->getFile(),
            'url' => $this->request->getUri(),
            'project_id' => $this->config['project_id'],
        ];
    }

    public function send($exception = false)
    {
        if($exception instanceof \Exception) $this->exception = $exception;
        
        if ($this->config['enabled'] && !$this->exception instanceof NotFoundHttpException && $exception->getCode() != 429) {
            DB::rollBack();

            try {
                $this->guzzle->post($this->config['watch_url'], [
                    'headers' => $this->getHeaders(),
                    'form_params' => [
                        'watcher' => $this->getBody(),
                    ],
                ]);
            } catch (\Exception $e) {
            }
        }
    }
}
