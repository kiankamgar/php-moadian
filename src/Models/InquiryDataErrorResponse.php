<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModel;

class InquiryDataErrorResponse implements ResponseModel
{
    private string $code;
    private string $message;
    private ?string $errorType;

    /**
     * Get code
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Get error type
     *
     * @return string|null
     */
    public function getErrorType(): ?string
    {
        return $this->errorType;
    }

    /**
     * Decode response
     *
     * @param array $response
     * @return ResponseModel
     */
    public function decodeResponse(array $response): ResponseModel
    {
        $this->code = $response['code'];
        $this->message = $response['message'];
        $this->errorType = $response['errorType'] ?? null;

        return $this;
    }
}