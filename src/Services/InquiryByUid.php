<?php

namespace KianKamgar\MoadianPhp\Services;

use DateTime;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Query;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\InquiryHelper;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\InquiryResponseModel;

class InquiryByUid extends Url
{
    public function __construct(
        private array     $uidList,
        private string    $fiscalId,
        private ?DateTime $start = null,
        private ?DateTime $end = null,
    )
    {}

    /**
     * @throws GuzzleException
     */
    public function request(string $token): InquiryResponseModel
    {
        $data = [
            'uidList'  => $this->uidList,
            'fiscalId' => $this->fiscalId
        ];

        if (!empty($this->start)) {

            $data['start'] = InquiryHelper::getFormattedDate($this->start);
        }

        if (!empty($this->end)) {

            $data['end'] = InquiryHelper::getFormattedDate($this->end);
        }

        return (new RequestHelper(self::INQUIRY_BY_UID_URL, InquiryResponseModel::class))
            ->setToken($token)
            ->get(Query::build($data));
    }
}