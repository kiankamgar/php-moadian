<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModelInterface;

class ServerInformationResponse implements ResponseModelInterface
{
    private int $serverTime;
    private array $publicKeys;

    public function getServerTime(): int
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

            $this->publicKeys[] = (new PublicKey())->decodeResponse($publicKey);
        }

        return $this;
    }
}