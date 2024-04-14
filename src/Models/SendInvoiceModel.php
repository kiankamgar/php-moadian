<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ModelInterface;

class SendInvoiceModel implements ModelInterface
{
    private string $timestamp;
    private array $result;

    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    public function setTimestamp(string $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    public function getResult(): array
    {
        return $this->result;
    }

    public function setResult(array $data): void
    {
        $result = [];

        foreach ($data as $item) {

            $sendInvoiceResult = new SendInvoiceResultModel();
            $sendInvoiceResult->setUid($item['uid']);
            $sendInvoiceResult->setPacketType($item['packetType']);
            $sendInvoiceResult->setReferenceNumber($item['referenceNumber']);
            $sendInvoiceResult->setData($item['data']);

            $result[] = $sendInvoiceResult;
        }

        $this->result = $result;
    }
}