<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ModelInterface;

class FiscalInformationModel implements ModelInterface
{
    private string $nameTrade;
    private string $fiscalStatus;
    private string $saleThreshold;
    private string $economicCode;

    public function getNameTrade(): string
    {
        return $this->nameTrade;
    }

    public function setNameTrade(string $nameTrade): void
    {
        $this->nameTrade = $nameTrade;
    }

    public function getFiscalStatus(): string
    {
        return $this->fiscalStatus;
    }

    public function setFiscalStatus(string $fiscalStatus): void
    {
        $this->fiscalStatus = $fiscalStatus;
    }

    public function getSaleThreshold(): string
    {
        return $this->saleThreshold;
    }

    public function setSaleThreshold(string $saleThreshold): void
    {
        $this->saleThreshold = $saleThreshold;
    }

    public function getEconomicCode(): string
    {
        return $this->economicCode;
    }

    public function setEconomicCode(string $economicCode): void
    {
        $this->economicCode = $economicCode;
    }
}