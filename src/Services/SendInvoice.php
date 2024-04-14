<?php

namespace KianKamgar\MoadianPhp\Services;

use DateTime;
use DateTimeZone;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use JetBrains\PhpStorm\ArrayShape;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Helpers\SignHelper;
use KianKamgar\MoadianPhp\Models\PublicKeyModel;
use KianKamgar\MoadianPhp\Models\SendInvoiceResultModel;
use phpseclib3\Crypt\AES;
use phpseclib3\Crypt\Random;
use phpseclib3\Crypt\RSA;

class SendInvoice extends Url
{
    private array $invoices;
    private PublicKeyModel $key;
    private RequestHelper $requestHelper;

    public function __construct(
        private string $privateKey,
        private string $x5c,
        private string $fiscalId,
    )
    {
        $this->requestHelper = new RequestHelper(
            self::SEND_INVOICE_URL,
            SendInvoiceResultModel::class
        );
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function request(array $invoices, PublicKeyModel $key, string $token): SendInvoiceResultModel|string
    {
        $this->invoices = $invoices;
        $this->key = $key;

        return $this->requestHelper
            ->setToken($token)
            ->post($this->getInvoicePackets());
    }

    public function jsonResponse(bool $json): SendInvoice
    {
        $this->requestHelper->jsonResponse($json);
        return $this;
    }

    /**
     * @throws Exception
     */
    private function getInvoicePackets(): array
    {
        $result = [];

        foreach ($this->invoices as $invoice) {

            $result[] = $this->getInvoicePacket($invoice);
        }

        return $result;
    }

    /**
     * @throws Exception
     */
    #[ArrayShape(['header' => "array", 'payload' => "string"])]
    private function getInvoicePacket(array $invoice): array
    {
        return [
            'header'  => [
                'requestTraceId' => $this->generateUuid(),
                'fiscalId'       => $this->fiscalId
            ],
            'payload' => $this->getInvoiceJwe($invoice)
        ];
    }

    /**
     * @throws Exception
     */
    private function getInvoiceJwe(array $invoice): string
    {
        $invoiceJws = $this->getInvoiceJws($invoice);
        $encryptionKey = Random::string(32);
        $initialVector = Random::string(12);
        $aes = new AES('gcm');
        $aes->setKey($encryptionKey);
        $aes->setNonce($initialVector);
        $ciphertext = $aes->encrypt($invoiceJws);
        $authTag = $aes->getTag();
        $publicKey = RSA::load($this->key->getKey());
        $encryptedKey = $publicKey->encrypt($encryptionKey);

        return $this->getHeader() . '.' .
            SignHelper::base64url_encode($encryptedKey) . '.' .
            SignHelper::base64url_encode($initialVector) . '.' .
            SignHelper::base64url_encode($ciphertext) . '.' .
            SignHelper::base64url_encode($authTag);
    }

    /**
     * @throws Exception
     */
    private function getInvoiceJws(array $invoice): string
    {
        $header = $this->getInvoiceHeader();
        $payload = $this->getInvoicePayload($invoice);
        $data = $header . '.' . $payload;
        $signature = $this->getInvoiceSignature($data);

        return $data . '.' . $signature;
    }

    /**
     * @throws Exception
     */
    private function getInvoiceHeader(): string
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

    private function getInvoicePayload(array $invoice): string
    {
        return SignHelper::base64url_encode(json_encode($invoice));
    }

    private function getInvoiceSignature(string $data): string
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

    private function getHeader(): string
    {
        $data = [
            'alg' => 'RSA-OAEP-256',
            'enc' => 'A256GCM',
            'kid' => $this->key->getId(),
        ];

        return SignHelper::base64url_encode(json_encode($data));
    }

    private function generateUuid(): string
    {
        $uuid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );

        return strtolower($uuid);
    }
}