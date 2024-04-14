<?php

namespace KianKamgar\MoadianPhp;

use DateTime;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Helpers\SignHelper;
use KianKamgar\MoadianPhp\Models\FiscalInformationResponseModel;
use KianKamgar\MoadianPhp\Models\InquiryArrayResponseModel;
use KianKamgar\MoadianPhp\Models\InvoiceHeaderResponseModel;
use KianKamgar\MoadianPhp\Models\InvoiceResponseModel;
use KianKamgar\MoadianPhp\Models\RandomChallengeResponseModel;
use KianKamgar\MoadianPhp\Models\SendInvoiceResultResponseModel;
use KianKamgar\MoadianPhp\Models\ServerInformationResponseModel;
use KianKamgar\MoadianPhp\Models\TaxPayerResponseModel;
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
    public function getServerInformation(): ServerInformationResponseModel|array
    {
        return (new ServerInformation())
            ->arrayResponse($this->arrayResponse)
            ->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     */
    public function getFiscalInformation(): FiscalInformationResponseModel|array
    {
        return (new FiscalInformation($this->memoryId))
            ->arrayResponse($this->arrayResponse)
            ->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     */
    public function getTaxPayer(): TaxPayerResponseModel|array
    {
        return (new TaxPayer($this->economicCode))
            ->arrayResponse($this->arrayResponse)
            ->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     */
    public function getInquiryByReferenceIds(array $referenceIds, ?DateTime $start = null, ?DateTime $end = null): InquiryArrayResponseModel|array
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
    public function getInquiryByUid(array $uidList, ?DateTime $start = null, ?DateTime $end = null): InquiryArrayResponseModel|array
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
    public function getInquiryByTime(int $pageNumber = 1, int $pageSize = 10, ?string $status = null, ?DateTime $start = null, ?DateTime $end = null): InquiryArrayResponseModel|array
    {
        return (new InquiryByTime())
            ->setPageNumber($pageNumber)
            ->setPageSize($pageSize)
            ->setStatus($status)
            ->setEnd($end)
            ->arrayResponse($this->arrayResponse)
            ->request($this->getToken());
    }

    public function createInvoice(InvoiceHeaderResponseModel $header, array $body, array $payments = []): array
    {
        return (new InvoiceResponseModel())
            ->setHeader($header->setMemoryId($this->memoryId)->getHeader())
            ->setBody($body)
            ->setPayments($payments)
            ->getInvoice();
    }

    /**
     * @throws GuzzleException
     */
    public function sendInvoices(array ...$invoices): SendInvoiceResultResponseModel|array
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

    public function arrayResponse(bool $arrayResponse = true): Moadian
    {
        $this->arrayResponse = $arrayResponse;
        return $this;
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
    private function getRandomChallenge(int $timeToLive = 30): RandomChallengeResponseModel
    {
        return (new RandomChallenge())
            ->setTimeToLive($timeToLive)
            ->request();
    }
}