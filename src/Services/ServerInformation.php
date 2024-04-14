<?php

namespace KianKamgar\MoadianPhp\Services;

use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\ServerInformationResponseModel;

class ServerInformation extends Url
{
    private RequestHelper $requestHelper;

    public function __construct()
    {
        $this->requestHelper = new RequestHelper(
            self::SERVER_INFORMATION_URL,
            ServerInformationResponseModel::class
        );
    }

    /**
     * @throws GuzzleException
     */
    public function request(string $token): ServerInformationResponseModel|array
    {
        return $this->requestHelper
            ->setToken($token)
            ->get();
    }

    public function arrayResponse(bool $arrayResponse): ServerInformation
    {
        $this->requestHelper->arrayResponse($arrayResponse);
        return $this;
    }
}