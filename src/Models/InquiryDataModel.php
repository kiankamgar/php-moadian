<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ModelInterface;

class InquiryDataModel implements ModelInterface
{
    private array $error;
    private array $warning;
    private bool $success;

    public function getError(): array
    {
        return $this->error;
    }

    public function setError(array $data): void
    {
        $result = [];

        foreach ($data as $item) {

            $inquiryDataError = new InquiryDataErrorModel();
            $inquiryDataError->setCode($item['code']);
            $inquiryDataError->setMessage($item['message']);
            $inquiryDataError->setErrorType($item['errorType']);

            $result[] = $inquiryDataError;
        }

        $this->error = $result;
    }

    public function getWarning(): array
    {
        return $this->warning;
    }

    public function setWarning(array $warning): void
    {
        $this->warning = $warning;
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function setSuccess(bool $success): void
    {
        $this->success = $success;
    }
}