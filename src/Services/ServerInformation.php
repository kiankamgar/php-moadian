<?php

namespace KianKamgar\MoadianPhp\Services;

use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\ServerInformationModel;

class ServerInformation extends Url
{
    /**
     * @throws GuzzleException
     */
    public function request(string $token): ServerInformationModel
    {
        return (new RequestHelper(self::SERVER_INFORMATION_URL, ServerInformationModel::class))
            ->setToken($token)
            ->get();
    }
}