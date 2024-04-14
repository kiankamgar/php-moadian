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

    public function getReferenceNumber(): string
    {
        return $this->referenceNumber;
    }

    public function getUid(): string
    {
        return $this->uid;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getData(): InquiryDataResponse
    {
        return $this->data;
    }

    public function getPacketType(): string
    {
        return $this->packetType;
    }

    public function getFiscalId(): string
    {
        return $this->fiscalId;
    }

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