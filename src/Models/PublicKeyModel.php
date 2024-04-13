<?php

namespace KianKamgar\MoadianPhp\Models;

class PublicKeyModel
{
    private string $key;
    private string $id;
    private string $algorithm;
    private int $purpose;

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    public function setAlgorithm(string $algorithm): void
    {
        $this->algorithm = $algorithm;
    }

    public function getPurpose(): int
    {
        return $this->purpose;
    }

    public function setPurpose(int $purpose): void
    {
        $this->purpose = $purpose;
    }
}