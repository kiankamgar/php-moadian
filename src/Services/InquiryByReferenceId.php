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

class InquiryByReferenceId extends Url
{
    private ?DateTime $start = null;
    private ?DateTime $end = null;
    private RequestHelper $requestHelper;

    public function __construct(
        private array|string $referenceIds
    )
    {
        $this->requestHelper = new RequestHelper(
            self::INQUIRY_BY_REFERENCE_ID_URL,
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

    public function arrayResponse(bool $arrayResponse): InquiryByReferenceId
    {
        $this->requestHelper->arrayResponse($arrayResponse);
        return $this;
    }

    public function setStart(?DateTime $start): InquiryByReferenceId
    {
        $this->start = $start;
        return $this;
    }

    public function setEnd(?DateTime $end): InquiryByReferenceId
    {
        $this->end = $end;
        return $this;
    }

    #[ArrayShape(['referenceIds' => "array|array[]|string|string[]", 'end' => "string", 'start' => "string"])]
    private function getData(): array
    {
        $data = ['referenceIds' => $this->referenceIds];

        if (!is_array($this->referenceIds)) {

            $data['referenceIds'] = [$this->referenceIds];
        }

        if (!empty($this->start)) {

            $data['start'] = InquiryHelper::getFormattedDate($this->start);
        }

        if (!empty($this->end)) {

            $data['end'] = InquiryHelper::getFormattedDate($this->end);
        }

        return $data;
    }
}