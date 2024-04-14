<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModelInterface;

class SendInvoiceResultResponse implements ResponseModelInterface
{
    private string $uid;
    private ?string $packetType;
    private string $referenceNumber;
    private ?string $data;

    public function getUid(): string
    {
        return $this->uid;
    }

    public function getPacketType(): ?string
    {
        return $this->packetType;
    }

    public function getReferenceNumber(): string
    {
        return $this->referenceNumber;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function decodeResponse(array $response): ResponseModelInterface
    {
        $this->uid = $response['uid'];
        $this->packetType = $response['packetType'];
        $this->referenceNumber = $response['referenceNumber'];
        $this->data = $response['data'];

        return $this;
    }
}