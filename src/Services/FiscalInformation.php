<?php

namespace KianKamgar\MoadianPhp\Services;

use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\FiscalInformationResponse;

class FiscalInformation extends Url
{
    private RequestHelper $requestHelper;

    /**
     * Init class
     *
     * @param string $memoryId
     */
    public function __construct(
        private string $memoryId
    )
    {
        $this->requestHelper = new RequestHelper(
            self::FISCAL_INFORMATION_URL,
            FiscalInformationResponse::class
        );
    }

    /**
     * Make request
     *
     * @param string $token
     * @return FiscalInformationResponse|array
     * @throws GuzzleException
     */
    public function request(string $token): FiscalInformationResponse|array
    {
        return $this->requestHelper
            ->setToken($token)
            ->get(['memoryId' => $this->memoryId]);
    }

    /**
     * Determine whether you want to get the result in array form
     * (otherwise the request will return a model)
     *
     * @param bool $arrayResponse
     * @return $this
     */
    public function arrayResponse(bool $arrayResponse): FiscalInformation
    {
        $this->requestHelper->arrayResponse($arrayResponse);
        return $this;
    }
}