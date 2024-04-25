<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModel;

class TaxPayerResponse implements ResponseModel
{
    private string $nameTrade;
    private string $taxpayerStatus;
    private string $nationalId;

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
     * Get taxpayer status
     *
     * @return string
     */
    public function getTaxpayerStatus(): string
    {
        return $this->taxpayerStatus;
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
     * Decode response
     *
     * @param array $response
     * @return ResponseModel
     */
    public function decodeResponse(array $response): ResponseModel
    {
        $this->nameTrade = $response['nameTrade'];
        $this->taxpayerStatus = $response['taxpayerStatus'];
        $this->nationalId = $response['nationalId'];

        return $this;
    }
}