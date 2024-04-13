<?php

namespace KianKamgar\MoadianPhp\Services;

use DateTime;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Query;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\InquiryHelper;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\InquiryResponseModel;

class InquiryByTime extends Url
{
    public function __construct(
        private int       $pageNumber = 10,
        private int       $pageSize = 10,
        private ?string   $status = null,
        private ?DateTime $start = null,
        private ?DateTime $end = null,
    )
    {}

    /**
     * @throws GuzzleException
     */
    public function request(string $token): InquiryResponseModel
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

        return (new RequestHelper(self::INQUIRY_BY_TIME_URL, InquiryResponseModel::class))
            ->setToken($token)
            ->get(Query::build($data));
    }

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