<?php

namespace KianKamgar\MoadianPhp\Models\Invoice;

class InvoiceModel
{
    private array $header;
    private array $body;
    private array $payments;
    private array $extension;

    /**
     * Get header
     *
     * @return array
     */
    public function getHeader(): array
    {
        return $this->header;
    }

    /**
     * Set header
     *
     * @param array $header
     * @return $this
     */
    public function setHeader(array $header): InvoiceModel
    {
        $this->header = $header;
        return $this;
    }

    /**
     * Get body
     *
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * Set body
     *
     * @param array $body
     * @return $this
     */
    public function setBody(array $body): InvoiceModel
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Get payments
     *
     * @return array
     */
    public function getPayments(): array
    {
        return $this->payments;
    }

    /**
     * Set payments
     *
     * @param array $payments
     * @return $this
     */
    public function setPayments(array $payments): InvoiceModel
    {
        $this->payments = $payments;
        return $this;
    }

    /**
     * Get extension
     *
     * @return array
     */
    public function getExtension(): array
    {
        return $this->extension;
    }

    /**
     * Set extension
     *
     * @param array $extension
     * @return $this
     */
    public function setExtension(array $extension): InvoiceModel
    {
        $this->extension = $extension;
        return $this;
    }

    /**
     * Get invoice
     *
     * @return array
     */
    public function getInvoice(): array
    {
        return get_object_vars($this);
    }
}