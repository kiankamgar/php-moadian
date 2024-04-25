<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModel;

class RandomChallengeResponse implements ResponseModel
{
    private string $nonce;
    private string $expDate;

    /**
     * Get nonce
     *
     * @return string
     */
    public function getNonce(): string
    {
        return $this->nonce;
    }

    /**
     * Get expire date
     *
     * @return string
     */
    public function getExpDate(): string
    {
        return $this->expDate;
    }

    /**
     * Decode response
     *
     * @param array $response
     * @return ResponseModel
     */
    public function decodeResponse(array $response): ResponseModel
    {
        $this->nonce = $response['nonce'];
        $this->expDate = $response['expDate'];

        return $this;
    }
}