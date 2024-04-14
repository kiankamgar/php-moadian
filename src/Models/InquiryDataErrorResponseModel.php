<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModelInterface;

class InquiryDataErrorResponseModel implements ResponseModelInterface
{
    private string $code;
    private string $message;
    private ?string $errorType;

    public function getCode(): string
    {
        return $this->code;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getErrorType(): ?string
    {
        return $this->errorType;
    }

    public function decodeResponse(array $response): ResponseModelInterface
    {
        $this->code = $response['code'];
        $this->message = $response['message'];
        $this->errorType = $response['errorType'] ?? null;

        return $this;
    }
}