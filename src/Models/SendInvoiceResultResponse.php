<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModel;

class SendInvoiceResultResponse implements ResponseModel
{
    private string $uid;
    private ?string $packetType;
    private string $referenceNumber;
    private ?string $data;

    /**
     * Get uid
     *
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }

    /**
     * Get packet type
     *
     * @return string|null
     */
    public function getPacketType(): ?string
    {
        return $this->packetType;
    }

    /**
     * Get reference number
     *
     * @return string
     */
    public function getReferenceNumber(): string
    {
        return $this->referenceNumber;
    }

    /**
     * Get data
     *
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * Decode response
     *
     * @param array $response
     * @return ResponseModel
     */
    public function decodeResponse(array $response): ResponseModel
    {
        $this->uid = $response['uid'];
        $this->packetType = $response['packetType'];
        $this->referenceNumber = $response['referenceNumber'];
        $this->data = $response['data'];

        return $this;
    }
}