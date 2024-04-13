<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ModelInterface;

class TaxPayerModel implements ModelInterface
{
    private string $nameTrade;
    private string $taxpayerStatus;
    private string $nationalId;

    public function getNameTrade(): string
    {
        return $this->nameTrade;
    }

    public function setNameTrade(string $nameTrade): void
    {
        $this->nameTrade = $nameTrade;
    }

    public function getTaxpayerStatus(): string
    {
        return $this->taxpayerStatus;
    }

    public function setTaxpayerStatus(string $taxpayerStatus): void
    {
        $this->taxpayerStatus = $taxpayerStatus;
    }

    public function getNationalId(): string
    {
        return $this->nationalId;
    }

    public function setNationalId(string $nationalId): void
    {
        $this->nationalId = $nationalId;
    }
}