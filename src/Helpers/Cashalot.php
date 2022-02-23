<?php

namespace Gavan4eg\Cashalot\Helpers;


use Illuminate\Support\Facades\Log;
use phpseclib3\Crypt\EC\Curves\nistb233;

class Cashalot
{
    private $url;

    private $guz;

    public function __construct($url = null, $guz = null)
    {
        if ($url === null) {
            $this->url = 'https://fsapi.cashalot.org.ua';
        }

        if ($guz == null) {
            $this->guz = new \GuzzleHttp\Client();
        }
    }


    /**
     * Запрос состояния ПРРО
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function TransactionsRegistrarState($command)
    {
        $response = $this->guz->post($this->url,
            [
                'json' => [
                    'headers' => [
                        'Content-Type: application/json; charset=UTF-8”',
                    ],
                    'Command' => $command,
                    'NumFiscal' => config('cashalot.numfiscal'),
                    'Certificate' => config('cashalot.certificate'),
                    'PrivateKey' => config('cashalot.key'),
                    'Password' => config('cashalot.password'),

                ]]);

        $d = $response->getBody()->getContents();

        $f = json_decode($d, true);

        if ($f['ErrorMessage'] == null) {
            Log::info('success');

        } else {
            Log::warning($f['ErrorMessage']);
        }
    }


    /**
     * Запрос доступных объектов
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function Objects($command)
    {
        $response = $this->guz->post($this->url,
            [
                'json' => [
                    'headers' => [
                        'Content-Type: application/json; charset=UTF-8”',
                    ],
                    'Command' => $command,
                    'NumFiscal' => config('cashalot.numfiscal'),
                    'Certificate' => config('cashalot.certificate'),
                    'PrivateKey' => config('cashalot.key'),
                    'Password' => config('cashalot.password'),

                ]]);

        $d = $response->getBody()->getContents();

        $f = json_decode($d, true);

        if ($f['ErrorMessage'] == null) {
            Log::info('success');

        } else {
            Log::warning($f['ErrorMessage']);
        }
    }

    /**
     * Открытие смены
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function OpenShift($command)
    {
        $response = $this->guz->post($this->url,
            [
                'json' => [
                    'headers' => [
                        'Content-Type: application/json; charset=UTF-8”',
                    ],
                    'Command' => $command,
                    'NumFiscal' => config('cashalot.numfiscal'),
                    'Certificate' => config('cashalot.certificate'),
                    'PrivateKey' => config('cashalot.key'),
                    'Password' => config('cashalot.password'),

                ]]);

        $d = $response->getBody()->getContents();

        $f = json_decode($d, true);

        if ($f['ErrorMessage'] == null) {
            Log::info('success');

        } else {
            Log::warning($f['ErrorMessage']);
        }
    }

    /**
     * Открытие смены
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function CloseShift($command)
    {
        $response = $this->guz->post($this->url,
            [
                'json' => [
                    'headers' => [
                        'Content-Type: application/json; charset=UTF-8”',
                    ],
                    'Command' => $command,
                    'NumFiscal' => config('cashalot.numfiscal'),
                    'Certificate' => config('cashalot.certificate'),
                    'PrivateKey' => config('cashalot.key'),
                    'Password' => config('cashalot.password'),

                ]]);

        $d = $response->getBody()->getContents();

        $f = json_decode($d, true);

        if ($f['ErrorMessage'] == null) {
            Log::info('success');

        } else {
            Log::warning($f['ErrorMessage']);
        }
    }


    /**
     * Z отчет
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function RegisterZRep($command)
    {
        $response = $this->guz->post($this->url,
            [
                'json' => [
                    'headers' => [
                        'Content-Type: application/json; charset=UTF-8”',
                    ],
                    'Command' => $command,
                    'NumFiscal' => config('cashalot.numfiscal'),
                    'Certificate' => config('cashalot.certificate'),
                    'PrivateKey' => config('cashalot.key'),
                    'Password' => config('cashalot.password'),
                    'ZRep' => null

                ]]);

        $d = $response->getBody()->getContents();

        $f = json_decode($d, true);

        if ($f['ErrorMessage'] == null) {
            Log::info('success');

        } else {
            Log::warning($f['ErrorMessage']);
        }
    }


    /**
     * Регистрация ЧЕКА по банковской карте
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function RegisterCheck($command, $check)
    {
        $response = $this->guz->post($this->url,
            [
                'json' => [
                    'headers' => [
                        'Content-Type: application/json; charset=UTF-8”',
                    ],
                    'Command' => $command,
                    'NumFiscal' => config('cashalot.numfiscal'),
                    'Certificate' => config('cashalot.certificate'),
                    'PrivateKey' => config('cashalot.key'),
                    'Password' => config('cashalot.password'),
                    'Check' => $check
                ]
            ]);

        $d = $response->getBody()->getContents();

        $f = json_decode($d, true);

        if ($f['ErrorMessage'] == null) {
            Log::info('success');

        } else {
            Log::warning($f['ErrorMessage']);
        }
    }
}
