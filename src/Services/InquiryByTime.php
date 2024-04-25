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

class InquiryByTime extends Url
{
    private RequestHelper $requestHelper;
    private int $pageNumber = 10;
    private int $pageSize = 10;
    private ?string $status = null;
    private ?DateTime $start = null;
    private ?DateTime $end = null;

    /**
     * Init class
     */
    public function __construct()
    {
        $this->requestHelper = new RequestHelper(
            self::INQUIRY_BY_TIME_URL,
            InquiryArrayResponse::class
        );
    }

    /**
     * Make request
     *
     * @param string $token
     * @return InquiryArrayResponse|array
     * @throws GuzzleException
     */
    public function request(string $token): InquiryArrayResponse|array
    {
        return $this->requestHelper
            ->setToken($token)
            ->get(Query::build($this->getData()));
    }

    /**
     * Determine whether you want to get the result in array form
     * (otherwise the request will return a model)
     *
     * @param bool $arrayResponse
     * @return $this
     */
    public function arrayResponse(bool $arrayResponse): InquiryByTime
    {
        $this->requestHelper->arrayResponse($arrayResponse);
        return $this;
    }

    /**
     * Set page number
     *
     * @param int $pageNumber
     * @return $this
     */
    public function setPageNumber(int $pageNumber): InquiryByTime
    {
        $this->pageNumber = $pageNumber;
        return $this;
    }

    /**
     * Set page size
     *
     * @param int $pageSize
     * @return $this
     */
    public function setPageSize(int $pageSize): InquiryByTime
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    /**
     * Set status
     *
     * @param string|null $status
     * @return $this
     */
    public function setStatus(?string $status): InquiryByTime
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Set start datetime
     *
     * @param DateTime|null $start
     * @return $this
     */
    public function setStart(?DateTime $start): InquiryByTime
    {
        $this->start = $start;
        return $this;
    }

    /**
     * Set end datetime
     *
     * @param DateTime|null $end
     * @return $this
     */
    public function setEnd(?DateTime $end): InquiryByTime
    {
        $this->end = $end;
        return $this;
    }

    /**
     * Get data for request
     *
     * @return array
     */
    #[ArrayShape(['pageNumber' => "int", 'pageSize' => "int", 'end' => "string", 'start' => "string", 'status' => "null|string"])]
    private function getData(): array
    {
        $this->validatePageSize();

        $data = [
            'pageNumber' => $this->pageNumber,
            'pageSize'   => $this->pageSize,
        ];

        if (!empty($this->status)) {

            $data['status'] = $this->status;
        }

        if (!empty($this->start)) {

            $data['start'] = InquiryHelper::getFormattedDate($this->start);
        }

        if (!empty($this->end)) {

            $data['end'] = InquiryHelper::getFormattedDate($this->end);
        }

        return $data;
    }

    /**
     * Validate page size
     *
     * @return void
     */
    private function validatePageSize()
    {
        if ($this->pageSize > 100) {

            $this->pageSize = 100;
        }

        if ($this->pageSize < 1) {

            $this->pageSize = 1;
        }
    }
}