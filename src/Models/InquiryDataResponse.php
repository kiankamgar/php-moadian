<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModel;

class InquiryDataResponse implements ResponseModel
{
    private array $error;
    private array $warning;
    private bool $success;

    /**
     * Get error
     *
     * @return array
     */
    public function getError(): array
    {
        return $this->error;
    }

    /**
     * Get warning
     *
     * @return array
     */
    public function getWarning(): array
    {
        return $this->warning;
    }

    /**
     * Whether the invoice data status is successful
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * Decode response
     *
     * @param array $response
     * @return ResponseModel
     */
    public function decodeResponse(array $response): ResponseModel
    {
        $this->warning = $response['warning'];
        $this->success = $response['success'];
        $this->error = [];

        foreach ($response['error'] as $error) {

            $this->error[] = (new InquiryDataErrorResponse())->decodeResponse($error);
        }

        return $this;
    }
}