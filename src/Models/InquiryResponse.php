<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModel;

class InquiryResponse implements ResponseModel
{
    private string $referenceNumber;
    private string $uid;
    private string $status;
    private InquiryDataResponse $data;
    private string $packetType;
    private string $fiscalId;

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
     * Get uid
     *
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Get data
     *
     * @return InquiryDataResponse
     */
    public function getData(): InquiryDataResponse
    {
        return $this->data;
    }

    /**
     * Get packet type
     *
     * @return string
     */
    public function getPacketType(): string
    {
        return $this->packetType;
    }

    /**
     * Get fiscal id
     *
     * @return string
     */
    public function getFiscalId(): string
    {
        return $this->fiscalId;
    }

    /**
     * Decode response
     *
     * @param array $response
     * @return ResponseModel
     */
    public function decodeResponse(array $response): ResponseModel
    {
        $this->referenceNumber = $response['referenceNumber'];
        $this->uid = $response['uid'];
        $this->status = $response['status'];
        $this->packetType = $response['packetType'];
        $this->fiscalId = $response['fiscalId'];
        $this->data = (new InquiryDataResponse())->decodeResponse($response['data']);

        return $this;
    }
}