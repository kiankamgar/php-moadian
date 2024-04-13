<?php

namespace KianKamgar\MoadianPhp\Services;

use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\TaxPayerModel;

class TaxPayer extends Url
{
    public function __construct(
        private string $economicCode
    )
    {}

    /**
     * @throws GuzzleException
     */
    public function request(string $token): TaxPayerModel
    {
        return (new RequestHelper(self::TAX_PAYER_URL, TaxPayerModel::class))
            ->setToken($token)
            ->get(['economicCode' => $this->economicCode]);
    }
}