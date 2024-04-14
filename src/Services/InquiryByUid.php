<?php

namespace KianKamgar\MoadianPhp\Services;

use DateTime;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Query;
use JetBrains\PhpStorm\ArrayShape;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\InquiryHelper;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\InquiryArrayResponse;

class InquiryByUid extends Url
{
    private RequestHelper $requestHelper;
    private ?DateTime $start = null;
    private ?DateTime $end = null;

    public function __construct(
        private array|string $uidList,
        private string       $fiscalId
    )
    {
        $this->requestHelper = new RequestHelper(
            self::INQUIRY_BY_UID_URL,
            InquiryArrayResponse::class
        );
    }

    /**
     * @throws GuzzleException
     */
    public function request(string $token): InquiryArrayResponse|array
    {
        return $this->requestHelper
            ->setToken($token)
            ->get(Query::build($this->getData()));
    }

    public function arrayResponse(bool $arrayResponse): InquiryByUid
    {
        $this->requestHelper->arrayResponse($arrayResponse);
        return $this;
    }

    public function setStart(?DateTime $start): InquiryByUid
    {
        $this->start = $start;
        return $this;
    }

    public function setEnd(?DateTime $end): InquiryByUid
    {
        $this->end = $end;
        return $this;
    }

    #[ArrayShape(['uidList' => "array", 'fiscalId' => "string", 'end' => "string", 'start' => "string"])]
    private function getData(): array
    {
        $data = [
            'uidList'  => is_array($this->uidList) ? $this->uidList : [$this->uidList],
            'fiscalId' => $this->fiscalId
        ];

        if (!empty($this->start)) {

            $data['start'] = InquiryHelper::getFormattedDate($this->start);
        }

        if (!empty($this->end)) {

            $data['end'] = InquiryHelper::getFormattedDate($this->end);
        }

        return $data;
    }
}