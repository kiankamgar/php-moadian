<?php

namespace KianKamgar\MoadianPhp;

use DateTime;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Helpers\SignHelper;
use KianKamgar\MoadianPhp\Models\FiscalInformationModel;
use KianKamgar\MoadianPhp\Models\InquiryResponseModel;
use KianKamgar\MoadianPhp\Models\InvoiceHeaderModel;
use KianKamgar\MoadianPhp\Models\InvoiceModel;
use KianKamgar\MoadianPhp\Models\RandomChallengeModel;
use KianKamgar\MoadianPhp\Models\SendInvoiceResultModel;
use KianKamgar\MoadianPhp\Models\ServerInformationModel;
use KianKamgar\MoadianPhp\Models\TaxPayerModel;
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
    private bool $jsonResponse = false;

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
    public function getServerInformation(): ServerInformationModel|string
    {
        return (new ServerInformation())->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     */
    public function getFiscalInformation(): FiscalInformationModel
    {
        return (new FiscalInformation($this->memoryId))->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     */
    public function getTaxPayer(): TaxPayerModel
    {
        return (new TaxPayer($this->economicCode))->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     */
    public function getInquiryByReferenceIds(array $referenceIds, ?DateTime $start = null, ?DateTime $end = null): InquiryResponseModel
    {
        return (new InquiryByReferenceId($referenceIds, $start, $end))
            ->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     */
    public function getInquiryByUid(array $uidList, ?DateTime $start = null, ?DateTime $end = null): InquiryResponseModel
    {
        return (new InquiryByUid($uidList, $this->memoryId, $start, $end))
            ->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     */
    public function getInquiryByTime(int $pageNumber = 1, int $pageSize = 10, ?string $status = null, ?DateTime $start = null, ?DateTime $end = null): InquiryResponseModel
    {
        return (new InquiryByTime($pageNumber, $pageSize, $status, $start, $end))
            ->request($this->getToken());
    }

    public function createInvoice(InvoiceHeaderModel $header, array $body, array $payments = []): array
    {
        return (new InvoiceModel())
            ->setHeader($header->setMemoryId($this->memoryId)->getHeader())
            ->setBody($body)
            ->setPayments($payments)
            ->getInvoice();
    }

    /**
     * @throws GuzzleException
     */
    public function sendInvoices(array ...$invoices): SendInvoiceResultModel|string
    {
        $serverInformation = $this->getServerInformation();
        $sendInvoice = new SendInvoice(
            $this->privateKey,
            $this->certificate,
            $this->memoryId,
        );

        return $sendInvoice
            ->jsonResponse($this->jsonResponse)
            ->request(
                $invoices,
                $serverInformation->getPublicKeys()[0],
                $this->getToken()
            );
    }

    public function jsonResponse(bool $jsonResponse): Moadian
    {
        $this->jsonResponse = $jsonResponse;
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
    private function getRandomChallenge(): RandomChallengeModel
    {
        return (new RandomChallenge())->request();
    }
}