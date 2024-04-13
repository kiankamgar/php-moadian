<?php

namespace KianKamgar\MoadianPhp\Services;

use DateTime;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Query;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\InquiryHelper;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\InquiryResponseModel;

class InquiryByReferenceId extends Url
{
    public function __construct(
        private array     $referenceIds,
        private ?DateTime $start = null,
        private ?DateTime $end = null,
    )
    {}

    /**
     * @throws GuzzleException
     */
    public function request(string $token): InquiryResponseModel
    {
        $data = ['referenceIds' => $this->referenceIds];

        if (!empty($this->start)) {

            $data['start'] = InquiryHelper::getFormattedDate($this->start);
        }

        if (!empty($this->end)) {

            $data['end'] = InquiryHelper::getFormattedDate($this->end);
        }

        return (new RequestHelper(self::INQUIRY_BY_REFERENCE_ID_URL, InquiryResponseModel::class))
            ->setToken($token)
            ->get(Query::build($data));
    }
}