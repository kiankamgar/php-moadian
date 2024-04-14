<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModelInterface;

class SendInvoiceResponse implements ResponseModelInterface
{
    private int $timestamp;
    private array $result;

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function getResult(): array
    {
        return $this->result;
    }

    public function decodeResponse(array $response): ResponseModelInterface
    {
        $this->timestamp = $response['timestamp'];
        $this->result = [];

        foreach ($response['result'] as $item) {

            $this->result[] = (new SendInvoiceResultResponse())->decodeResponse($item);
        }

        return $this;
    }
}