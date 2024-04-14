<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModelInterface;

class InquiryDataResponse implements ResponseModelInterface
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

    public function decodeResponse(array $response): ResponseModelInterface
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