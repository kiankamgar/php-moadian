<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModel;

class RandomChallengeResponse implements ResponseModel
{
    private string $nonce;
    private string $expDate;

    public function getNonce(): string
    {
        return $this->nonce;
    }

    public function getExpDate(): string
    {
        return $this->expDate;
    }

    public function decodeResponse(array $response): ResponseModel
    {
        $this->nonce = $response['nonce'];
        $this->expDate = $response['expDate'];

        return $this;
    }
}