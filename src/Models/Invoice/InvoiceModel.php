<?php

namespace KianKamgar\MoadianPhp\Models\Invoice;

class InvoiceModel
{
    private array $header;
    private array $body;
    private array $payments;
    private array $extension;

    public function getHeader(): array
    {
        return $this->header;
    }

    public function setHeader(array $header): InvoiceModel
    {
        $this->header = $header;
        return $this;
    }

    public function getBody(): array
    {
        return $this->body;
    }

    public function setBody(array $body): InvoiceModel
    {
        $this->body = $body;
        return $this;
    }

    public function getPayments(): array
    {
        return $this->payments;
    }

    public function setPayments(array $payments): InvoiceModel
    {
        $this->payments = $payments;
        return $this;
    }

    public function getExtension(): array
    {
        return $this->extension;
    }

    public function setExtension(array $extension): InvoiceModel
    {
        $this->extension = $extension;
        return $this;
    }

    public function getInvoice(): array
    {
        return get_object_vars($this);
    }
}