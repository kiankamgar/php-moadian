<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ModelInterface;

class ServerInformationModel implements ModelInterface
{
    private string $serverTime;
    private array $publicKeys;

    public function getServerTime(): string
    {
        return $this->serverTime;
    }

    public function setServerTime(string $serverTime): void
    {
        $this->serverTime = $serverTime;
    }

    public function getPublicKeys(): array
    {
        return $this->publicKeys;
    }

    public function setPublicKeys(array $publicKeys): void
    {
        $result = [];

        foreach ($publicKeys as $key) {

            $publicKey = new PublicKeyModel();
            $publicKey->setKey($key['key']);
            $publicKey->setId($key['id']);
            $publicKey->setAlgorithm($key['algorithm']);
            $publicKey->setPurpose($key['purpose']);

            $result[] = $publicKey;
        }

        $this->publicKeys = $result;
    }
}