<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModel;

class FiscalInformationResponse implements ResponseModel
{
    private string $nameTrade;
    private string $fiscalStatus;
    private string $nationalId;
    private string $economicCode;

    public function getNameTrade(): string
    {
        return $this->nameTrade;
    }

    public function getFiscalStatus(): string
    {
        return $this->fiscalStatus;
    }

    public function getNationalId(): string
    {
        return $this->nationalId;
    }

    public function getEconomicCode(): string
    {
        return $this->economicCode;
    }

    public function decodeResponse(array $response): ResponseModel
    {
        $this->nameTrade = $response['nameTrade'];
        $this->fiscalStatus = $response['fiscalStatus'];
        $this->nationalId = $response['nationalId'];
        $this->economicCode = $response['economicCode'];

        return $this;
    }
}