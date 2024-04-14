<?php

namespace KianKamgar\MoadianPhp;

use DateTime;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Helpers\SignHelper;
use KianKamgar\MoadianPhp\Models\FiscalInformationResponse;
use KianKamgar\MoadianPhp\Models\InquiryArrayResponse;
use KianKamgar\MoadianPhp\Models\Invoice\Invoice;
use KianKamgar\MoadianPhp\Models\Invoice\InvoiceHeader;
use KianKamgar\MoadianPhp\Models\RandomChallengeResponse;
use KianKamgar\MoadianPhp\Models\SendInvoiceResponse;
use KianKamgar\MoadianPhp\Models\SendInvoiceResultResponse;
use KianKamgar\MoadianPhp\Models\ServerInformationResponse;
use KianKamgar\MoadianPhp\Models\TaxPayerResponse;
use KianKamgar\MoadianPhp\Services\FiscalInformation;
use KianKamgar\MoadianPhp\Services\InquiryByReferenceId;
use KianKamgar\MoadianPhp\Services\InquiryByTime;
use KianKamgar\MoadianPhp\Services\InquiryByUid;
use KianKamgar\MoadianPhp\Services\RandomChallenge;
use KianKamgar\MoadianPhp\Services\SendInvoice;
use KianKamgar\MoadianPhp\Services\ServerInformation;
use KianKamgar\MoadianPhp\Services\SignNonce;
use KianKamgar\MoadianPhp\Services\TaxPayer;

class Moadian
{
    private string $privateKey;
    private string $certificate;
    private bool $arrayResponse = false;

    /**
     * @throws Exception
     */
    public function __construct(
        private string $privateKeyPath,
        private string $certificatePath,
        private string $memoryId,
        private string $economicCode,
    )
    {
        $this->privateKey = SignHelper::getPrivateKey($this->privateKeyPath);
        $this->certificate = SignHelper::getCertificate($this->certificatePath);
    }

    /**
     * @throws GuzzleException
     */
    public function getFiscalInformation(): FiscalInformationResponse|array
    {
        return (new FiscalInformation($this->memoryId))
            ->arrayResponse($this->arrayResponse)
            ->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     */
    public function getTaxPayer(): TaxPayerResponse|array
    {
        return (new TaxPayer($this->economicCode))
            ->arrayResponse($this->arrayResponse)
            ->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     */
    public function getInquiryByReferenceIds(array|string $referenceIds, ?DateTime $start = null, ?DateTime $end = null): InquiryArrayResponse|array
    {
        return (new InquiryByReferenceId($referenceIds))
            ->setStart($start)
            ->setEnd($end)
            ->arrayResponse($this->arrayResponse)
            ->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     */
    public function getInquiryByUid(array|string $uidList, ?DateTime $start = null, ?DateTime $end = null): InquiryArrayResponse|array
    {
        return (new InquiryByUid($uidList, $this->memoryId))
            ->setStart($start)
            ->setEnd($end)
            ->arrayResponse($this->arrayResponse)
            ->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     */
    public function getInquiryByTime(int $pageNumber = 1, int $pageSize = 10, ?string $status = null, ?DateTime $start = null, ?DateTime $end = null): InquiryArrayResponse|array
    {
        return (new InquiryByTime())
            ->setPageNumber($pageNumber)
            ->setPageSize($pageSize)
            ->setStatus($status)
            ->setEnd($end)
            ->arrayResponse($this->arrayResponse)
            ->request($this->getToken());
    }

    public function createInvoice(InvoiceHeader $header, array $body, array $payments = []): array
    {
        return (new Invoice())
            ->setHeader($header->setMemoryId($this->memoryId)->getHeader())
            ->setBody($body)
            ->setPayments($payments)
            ->getInvoice();
    }

    /**
     * @throws GuzzleException
     */
    public function sendInvoices(array ...$invoices): SendInvoiceResponse|array
    {
        $serverInformation = $this->getServerInformation();
        $sendInvoice = new SendInvoice(
            $this->privateKey,
            $this->certificate,
            $this->memoryId,
            $serverInformation->getPublicKeys()[0],
            $invoices
        );

        return $sendInvoice
            ->arrayResponse($this->arrayResponse)
            ->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     */
    public function sendInvoicesWithResponse(array ...$invoices): InquiryArrayResponse|array
    {
        $serverInformation = $this->getServerInformation();
        $sendInvoice = new SendInvoice(
            $this->privateKey,
            $this->certificate,
            $this->memoryId,
            $serverInformation->getPublicKeys()[0],
            $invoices
        );

        $responses = $sendInvoice
            ->request($this->getToken());

        $referenceIds = array_map(
            fn (SendInvoiceResultResponse $response) => $response->getReferenceNumber(),
            $responses->getResult()
        );

        sleep(10);

        return $this->getInquiryByReferenceIds($referenceIds);
    }

    public function arrayResponse(bool $arrayResponse = true): Moadian
    {
        $this->arrayResponse = $arrayResponse;
        return $this;
    }

    /**
     * @throws GuzzleException
     */
    private function getServerInformation(): ServerInformationResponse|array
    {
        return (new ServerInformation())
            ->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    private function getToken(): string
    {
        $randomChallenge = $this->getRandomChallenge();
        $signNonce = new SignNonce(
            $this->privateKey,
            $this->certificate,
            $randomChallenge->getNonce(),
            $this->memoryId
        );

        return $signNonce->getToken();
    }

    /**
     * @throws GuzzleException
     */
    private function getRandomChallenge(int $timeToLive = 30): RandomChallengeResponse
    {
        return (new RandomChallenge())
            ->setTimeToLive($timeToLive)
            ->request();
    }
}