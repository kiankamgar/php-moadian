<?php

namespace KianKamgar\MoadianPhp\Models\Invoice;

class InvoicePayment
{
    private string $iinn;
    private string $acn;
    private string $trmn;
    private string $trn;
    private string $pcn;
    private string $pid;
    private ?int $pdt;
    private ?int $pmt;
    private ?int $pv;

    public function setIinn(string $iinn): InvoicePayment
    {
        $this->iinn = $iinn;
        return $this;
    }

    public function setAcn(string $acn): InvoicePayment
    {
        $this->acn = $acn;
        return $this;
    }

    public function setTrmn(string $trmn): InvoicePayment
    {
        $this->trmn = $trmn;
        return $this;
    }

    public function setTrn(string $trn): InvoicePayment
    {
        $this->trn = $trn;
        return $this;
    }

    public function setPcn(string $pcn): InvoicePayment
    {
        $this->pcn = $pcn;
        return $this;
    }

    public function setPid(string $pid): InvoicePayment
    {
        $this->pid = $pid;
        return $this;
    }

    public function setPdt(?int $pdt): InvoicePayment
    {
        $this->pdt = $pdt;
        return $this;
    }

    public function setPmt(?int $pmt): InvoicePayment
    {
        $this->pmt = $pmt;
        return $this;
    }

    public function setPv(?int $pv): InvoicePayment
    {
        $this->pv = $pv;
        return $this;
    }

    public function build(): array
    {
        return get_object_vars($this);
    }
}