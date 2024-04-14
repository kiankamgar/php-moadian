<?php

namespace KianKamgar\MoadianPhp\Services;

use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\FiscalInformationResponseModel;

class FiscalInformation extends Url
{
    private RequestHelper $requestHelper;

    public function __construct(
        private string $memoryId
    )
    {
        $this->requestHelper = new RequestHelper(
            self::FISCAL_INFORMATION_URL,
            FiscalInformationResponseModel::class
        );
    }

    /**
     * @throws GuzzleException
     */
    public function request(string $token): FiscalInformationResponseModel|array
    {
        return $this->requestHelper
            ->setToken($token)
            ->get(['memoryId' => $this->memoryId]);
    }

    public function arrayResponse(bool $arrayResponse): FiscalInformation
    {
        $this->requestHelper->arrayResponse($arrayResponse);
        return $this;
    }
}