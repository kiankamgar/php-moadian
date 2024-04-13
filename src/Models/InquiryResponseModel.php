<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ModelInterface;

class InquiryResponseModel implements ModelInterface
{
    private array $result;

    public function getResult(): array
    {
        return $this->result;
    }

    public function setResult(array $data): void
    {
        $result = [];

        foreach ($data as $item) {

            $inquiry = new InquiryModel();
            $inquiry->setReferenceNumber($item['referenceNumber']);
            $inquiry->setUid($item['uid']);
            $inquiry->setStatus($item['status']);
            $inquiry->setData($item['data']);
            $inquiry->setPacketType($item['packetType']);
            $inquiry->setFiscalId($item['fiscalId']);

            $result[] = $inquiry;
        }

        $this->result = $result;
    }
}