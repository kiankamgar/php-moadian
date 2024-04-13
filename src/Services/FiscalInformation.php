<?php

namespace KianKamgar\MoadianPhp\Services;

use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\FiscalInformationModel;

class FiscalInformation extends Url
{
    public function __construct(
        private string $memoryId
    )
    {}

    /**
     * @throws GuzzleException
     */
    public function request(string $token): FiscalInformationModel
    {
        return (new RequestHelper(self::FISCAL_INFORMATION_URL, FiscalInformationModel::class))
            ->setToken($token)
            ->get(['memoryId' => $this->memoryId]);
    }
}