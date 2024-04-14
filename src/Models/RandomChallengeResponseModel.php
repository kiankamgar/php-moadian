<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModelInterface;

class RandomChallengeResponseModel implements ResponseModelInterface
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

    public function decodeResponse(array $response): ResponseModelInterface
    {
        $this->nonce = $response['nonce'];
        $this->expDate = $response['expDate'];

        return $this;
    }
}