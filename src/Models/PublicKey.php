<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModel;

class PublicKey implements ResponseModel
{
    private string $key;
    private string $id;
    private string $algorithm;
    private int $purpose;

    public function getKey(): string
    {
        return $this->key;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    public function getPurpose(): int
    {
        return $this->purpose;
    }

    public function decodeResponse(array $response): ResponseModel
    {
        $this->key = $response['key'];
        $this->id = $response['id'];
        $this->algorithm = $response['algorithm'];
        $this->purpose = $response['purpose'];

        return $this;
    }
}