<?php

namespace KianKamgar\MoadianPhp;

use KianKamgar\MoadianPhp\Models\Invoice\InvoiceBody;
use KianKamgar\MoadianPhp\Models\Invoice\InvoiceHeader;
use KianKamgar\MoadianPhp\Models\Invoice\InvoiceModel;
use KianKamgar\MoadianPhp\Models\Invoice\InvoicePayment;

class Invoice
{
    private array $header;
    private array $body = [];
    private array $payments = [];

    /**
     * Init an invoice header
     *
     * @param string $memoryId
     * @return InvoiceHeader
     */
    public function header(string $memoryId): InvoiceHeader
    {
        $header = (new InvoiceHeader())
            ->setMemoryId($memoryId);
        $this->header[] = $header;

        return $header;
    }

    /**
     * Init an invoice body
     *
     * @return InvoiceBody
     */
    public function body(): InvoiceBody
    {
        $body = new InvoiceBody();
        $this->body[] = $body;

        return $body;
    }

    /**
     * Init an invoice payment
     *
     * @return InvoicePayment
     */
    public function payment(): InvoicePayment
    {
        $payment = new InvoicePayment();
        $this->payments[] = $payment;

        return $payment;
    }

    /**
     * Build the invoice (must be called at the end of creating Invoice model)
     *
     * @return array
     */
    public function build(): array
    {
        return (new InvoiceModel())
            ->setHeader($this->header[0]->build())
            ->setBody($this->body)
            ->setPayments($this->payments)
            ->getInvoice();
    }
}