<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModel;

class PublicKey implements ResponseModel
{
    private string $key;
    private string $id;
    private string $algorithm;
    private int $purpose;

    /**
     * Get key
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get algorithm
     *
     * @return string
     */
    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    /**
     * Get purpose
     *
     * @return int
     */
    public function getPurpose(): int
    {
        return $this->purpose;
    }

    /**
     * Decode response
     *
     * @param array $response
     * @return ResponseModel
     */
    public function decodeResponse(array $response): ResponseModel
    {
        $this->key = $response['key'];
        $this->id = $response['id'];
        $this->algorithm = $response['algorithm'];
        $this->purpose = $response['purpose'];

        return $this;
    }
}