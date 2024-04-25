<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModel;

class SendInvoiceResponse implements ResponseModel
{
    private int $timestamp;
    private array $result;

    /**
     * Get timestamp
     *
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * Get result
     *
     * @return array
     */
    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * Decode response
     *
     * @param array $response
     * @return ResponseModel
     */
    public function decodeResponse(array $response): ResponseModel
    {
        $this->timestamp = $response['timestamp'];
        $this->result = [];

        foreach ($response['result'] as $item) {

            $this->result[] = (new SendInvoiceResultResponse())->decodeResponse($item);
        }

        return $this;
    }
}