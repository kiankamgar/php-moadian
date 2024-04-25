<?php

namespace KianKamgar\MoadianPhp\Services;

use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\ServerInformationResponse;

class ServerInformation extends Url
{
    private RequestHelper $requestHelper;

    /**
     * Init class
     */
    public function __construct()
    {
        $this->requestHelper = new RequestHelper(
            self::SERVER_INFORMATION_URL,
            ServerInformationResponse::class
        );
    }

    /**
     * Make request
     *
     * @param string $token
     * @return ServerInformationResponse|array
     * @throws GuzzleException
     */
    public function request(string $token): ServerInformationResponse|array
    {
        return $this->requestHelper
            ->setToken($token)
            ->get();
    }

    /**
     * Determine whether you want to get the result in array form
     * (otherwise the request will return a model)
     *
     * @param bool $arrayResponse
     * @return $this
     */
    public function arrayResponse(bool $arrayResponse): ServerInformation
    {
        $this->requestHelper->arrayResponse($arrayResponse);
        return $this;
    }
}