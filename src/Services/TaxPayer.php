<?php

namespace KianKamgar\MoadianPhp\Services;

use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\TaxPayerResponse;

class TaxPayer extends Url
{
    private RequestHelper $requestHelper;

    /**
     * Init class
     *
     * @param string $economicCode
     */
    public function __construct(
        private string $economicCode
    )
    {
        $this->requestHelper = new RequestHelper(
            self::TAX_PAYER_URL,
            TaxPayerResponse::class
        );
    }

    /**
     * Make request
     *
     * @param string $token
     * @return TaxPayerResponse|array
     * @throws GuzzleException
     */
    public function request(string $token): TaxPayerResponse|array
    {
        return $this->requestHelper
            ->setToken($token)
            ->get(['economicCode' => $this->economicCode]);
    }

    /**
     * Determine whether you want to get the result in array form
     * (otherwise the request will return a model)
     *
     * @param bool $arrayResponse
     * @return $this
     */
    public function arrayResponse(bool $arrayResponse): TaxPayer
    {
        $this->requestHelper->arrayResponse($arrayResponse);
        return $this;
    }
}