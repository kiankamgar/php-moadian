<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ModelInterface;

class SendInvoiceResultModel implements ModelInterface
{
    private string $uid;
    private ?string $packetType;
    private string $referenceNumber;
    private ?string $data;

    public function getUid(): string
    {
        return $this->uid;
    }

    public function setUid(string $uid): SendInvoiceResultModel
    {
        $this->uid = $uid;
        return $this;
    }

    public function getPacketType(): ?string
    {
        return $this->packetType;
    }

    public function setPacketType(?string $packetType): SendInvoiceResultModel
    {
        $this->packetType = $packetType;
        return $this;
    }

    public function getReferenceNumber(): string
    {
        return $this->referenceNumber;
    }

    public function setReferenceNumber(string $referenceNumber): SendInvoiceResultModel
    {
        $this->referenceNumber = $referenceNumber;
        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): SendInvoiceResultModel
    {
        $this->data = $data;
        return $this;
    }
}