<?php

namespace KianKamgar\MoadianPhp\Services;

use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\TaxPayerResponseModel;

class TaxPayer extends Url
{
    private RequestHelper $requestHelper;

    public function __construct(
        private string $economicCode
    )
    {
        $this->requestHelper = new RequestHelper(
            self::TAX_PAYER_URL,
            TaxPayerResponseModel::class
        );
    }

    /**
     * @throws GuzzleException
     */
    public function request(string $token): TaxPayerResponseModel|array
    {
        return $this->requestHelper
            ->setToken($token)
            ->get(['economicCode' => $this->economicCode]);
    }

    public function arrayResponse(bool $arrayResponse): TaxPayer
    {
        $this->requestHelper->arrayResponse($arrayResponse);
        return $this;
    }
}