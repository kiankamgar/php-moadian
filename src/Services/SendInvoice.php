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
use KianKamgar\MoadianPhp\Models\PublicKey;
use KianKamgar\MoadianPhp\Models\SendInvoiceResponse;
use phpseclib3\Crypt\AES;
use phpseclib3\Crypt\RSA;

class SendInvoice extends Url
{
    private RequestHelper $requestHelper;

    public function __construct(
        private string    $privateKey,
        private string    $x5c,
        private string    $fiscalId,
        private PublicKey $key,
        private array     $invoices,
    )
    {
        $this->requestHelper = new RequestHelper(
            self::SEND_INVOICE_URL,
            SendInvoiceResponse::class
        );
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function request(string $token): SendInvoiceResponse|array
    {
        return $this->requestHelper
            ->setToken($token)
            ->post($this->getInvoicePackets());
    }

    public function arrayResponse(bool $arrayResponse): SendInvoice
    {
        $this->requestHelper->arrayResponse($arrayResponse);
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
        $header = $this->getHeader();
        $symmetricKey = $this->getRandomBytes(32);
        $iv = $this->getRandomBytes(12);
        $encryptedKey = $this->getEncryptedKey($symmetricKey);
        $encryptedContent = $this->getEncryptedContent($symmetricKey, $iv, $header, $invoiceJws);

        return $header . '.'
            . $encryptedKey . '.'
            . SignHelper::base64url_encode($iv) . '.'
            . $encryptedContent;
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

        return $data . '.'
            . $signature;
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

    private function getEncryptedKey(string $symmetricKey): string
    {
        $rsa = RSA::loadPublicKey($this->key->getKey());
        $rsa->getFingerprint(RSA::ENCRYPTION_OAEP);

        return SignHelper::base64url_encode($rsa->encrypt($symmetricKey));
    }

    private function getEncryptedContent(string $symmetricKey, string $iv, string $header, string $invoiceJws): string
    {
        $aes = (new AES('gcm'));
        $aes->setKey($symmetricKey);
        $aes->setNonce($iv);
        $aes->setAAD($header);

        return SignHelper::base64url_encode($aes->encrypt($invoiceJws)) . '.'
            . SignHelper::base64url_encode($aes->getTag());
    }

    private function getRandomBytes(int $length): string
    {
        return openssl_random_pseudo_bytes($length);
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