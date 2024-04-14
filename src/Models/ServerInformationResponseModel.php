<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModelInterface;

class ServerInformationResponseModel implements ResponseModelInterface
{
    private string $serverTime;
    private array $publicKeys;

    public function getServerTime(): string
    {
        return $this->serverTime;
    }

    public function getPublicKeys(): array
    {
        return $this->publicKeys;
    }

    public function decodeResponse(array $response): ResponseModelInterface
    {
        $this->serverTime = $response['serverTime'];
        $this->publicKeys = [];

        foreach ($response['publicKeys'] as $publicKey) {

            $this->publicKeys[] = (new PublicKeyModel())->decodeResponse($publicKey);
        }

        return $this;
    }
}