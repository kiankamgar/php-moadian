<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModel;

class FiscalInformationResponse implements ResponseModel
{
    private string $nameTrade;
    private string $fiscalStatus;
    private string $nationalId;
    private string $economicCode;

    /**
     * Get name trade
     *
     * @return string
     */
    public function getNameTrade(): string
    {
        return $this->nameTrade;
    }

    /**
     * Get fiscal status
     *
     * @return string
     */
    public function getFiscalStatus(): string
    {
        return $this->fiscalStatus;
    }

    /**
     * Get national id
     *
     * @return string
     */
    public function getNationalId(): string
    {
        return $this->nationalId;
    }

    /**
     * Get economical code
     *
     * @return string
     */
    public function getEconomicCode(): string
    {
        return $this->economicCode;
    }

    /**
     * Decode response
     *
     * @param array $response
     * @return ResponseModel
     */
    public function decodeResponse(array $response): ResponseModel
    {
        $this->nameTrade = $response['nameTrade'];
        $this->fiscalStatus = $response['fiscalStatus'];
        $this->nationalId = $response['nationalId'];
        $this->economicCode = $response['economicCode'];

        return $this;
    }
}