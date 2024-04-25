<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModel;

class InquiryArrayResponse implements ResponseModel
{
    private array $result;

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
        $this->result = [];

        foreach ($response as $item) {

            $this->result[] = (new InquiryResponse())->decodeResponse($item);
        }

        return $this;
    }
}