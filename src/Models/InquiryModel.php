<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ModelInterface;

class InquiryModel implements ModelInterface
{
    private string $referenceNumber;
    private string $uid;
    private string $status;
    private array $data;
    private string $packetType;
    private string $fiscalId;

    public function getReferenceNumber(): string
    {
        return $this->referenceNumber;
    }

    public function setReferenceNumber(string $referenceNumber): void
    {
        $this->referenceNumber = $referenceNumber;
    }

    public function getUid(): string
    {
        return $this->uid;
    }

    public function setUid(string $uid): void
    {
        $this->uid = $uid;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): void
    {
        $result = [];

        foreach ($data as $item) {

            $inquiryData = new InquiryDataModel();
            $inquiryData->setError($item['error']);
            $inquiryData->setWarning($item['warning']);
            $inquiryData->setSuccess($item['success']);

            $result[] = $inquiryData;
        }

        $this->data = $result;
    }

    public function getPacketType(): string
    {
        return $this->packetType;
    }

    public function setPacketType(string $packetType): void
    {
        $this->packetType = $packetType;
    }

    public function getFiscalId(): string
    {
        return $this->fiscalId;
    }

    public function setFiscalId(string $fiscalId): void
    {
        $this->fiscalId = $fiscalId;
    }
}