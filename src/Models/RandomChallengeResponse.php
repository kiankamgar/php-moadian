<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ModelInterface;

class RandomChallengeResponse implements ModelInterface
{
    private string $nonce;
    private string $expDate;

    public function getNonce(): string
    {
        return $this->nonce;
    }

    public function setNonce(string $nonce): void
    {
        $this->nonce = $nonce;
    }

    public function getExpDate(): string
    {
        return $this->expDate;
    }

    public function setExpDate(string $expDate): void
    {
        $this->expDate = $expDate;
    }
}