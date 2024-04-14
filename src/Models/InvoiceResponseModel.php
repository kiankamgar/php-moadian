<?php

namespace KianKamgar\MoadianPhp\Models;

class InvoiceResponseModel
{
    private array $header;
    private array $body;
    private array $payments;
    private array $extension;

    public function getHeader(): array
    {
        return $this->header;
    }

    public function setHeader(array $header): InvoiceResponseModel
    {
        $this->header = $header;
        return $this;
    }

    public function getBody(): array
    {
        return $this->body;
    }

    public function setBody(array $body): InvoiceResponseModel
    {
        $this->body = $body;
        return $this;
    }

    public function getPayments(): array
    {
        return $this->payments;
    }

    public function setPayments(array $payments): InvoiceResponseModel
    {
        $this->payments = $payments;
        return $this;
    }

    public function getExtension(): array
    {
        return $this->extension;
    }

    public function setExtension(array $extension): InvoiceResponseModel
    {
        $this->extension = $extension;
        return $this;
    }

    public function getInvoice(): array
    {
        return get_object_vars($this);
    }
}