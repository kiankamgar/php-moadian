<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModel;

class InquiryDataResponse implements ResponseModel
{
    private array $error;
    private array $warning;
    private bool $success;

    public function getError(): array
    {
        return $this->error;
    }

    public function getWarning(): array
    {
        return $this->warning;
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

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