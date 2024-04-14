<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModelInterface;

class InquiryArrayResponseModel implements ResponseModelInterface
{
    private array $result;

    public function getResult(): array
    {
        return $this->result;
    }

    public function decodeResponse(array $response): ResponseModelInterface
    {
        $this->result = [];

        foreach ($response as $item) {

            $this->result[] = (new InquiryResponseModel())->decodeResponse($item);
        }

        return $this;
    }
}