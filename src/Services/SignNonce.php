<?php

namespace KianKamgar\MoadianPhp\Services;

use DateTime;
use DateTimeZone;
use Exception;
use KianKamgar\MoadianPhp\Helpers\SignHelper;

class SignNonce
{
    public function __construct(
        private string $privateKey,
        private string $x5c,
        private string $nonce,
        private string $clientId,
    )
    {}

    /**
     * @throws Exception
     */
    public function getToken(): string
    {
        $header = $this->getHeader();
        $payload = $this->getPayload();
        $data = $header . '.' . $payload;
        $signature = $this->getSignature($data);

        return $data . '.' . $signature;
    }

    /**
     * @throws Exception
     */
    private function getHeader(): string
    {
        $data = [
            'alg'  => 'RS256',
            'x5c'  => [$this->x5c],
            'sigT' => $this->getSigT(),
            'typ'  => 'jose',
            'crit' => ['sigT'],
            'cty'  => 'text/plain'
        ];

        return SignHelper::base64url_encode(json_encode($data));
    }

    private function getPayload(): string
    {
        $data = [
            'nonce'    => $this->nonce,
            'clientId' => $this->clientId
        ];

        return SignHelper::base64url_encode(json_encode($data));
    }

    private function getSignature(string $data): string
    {
        return SignHelper::signData($data, $this->privateKey, OPENSSL_ALGO_SHA256);
    }

    /**
     * @throws Exception
     */
    private function getSigT(): string
    {
        return (new DateTime('now', new DateTimeZone('UTC')))
            ->format('Y-m-d\TH:i:s\Z');
    }
}