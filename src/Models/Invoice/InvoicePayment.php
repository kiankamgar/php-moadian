<?php

namespace KianKamgar\MoadianPhp\Models\Invoice;

class InvoicePayment
{
    public string $iinn;
    public string $acn;
    public string $trmn;
    public string $trn;
    public string $pcn;
    public string $pid;
    public ?int $pdt;
    public ?int $pmt;
    public ?int $pv;

    public function getIinn(): string
    {
        return $this->iinn;
    }

    public function setIinn(string $iinn): InvoicePayment
    {
        $this->iinn = $iinn;
        return $this;
    }

    public function getAcn(): string
    {
        return $this->acn;
    }

    public function setAcn(string $acn): InvoicePayment
    {
        $this->acn = $acn;
        return $this;
    }

    public function getTrmn(): string
    {
        return $this->trmn;
    }

    public function setTrmn(string $trmn): InvoicePayment
    {
        $this->trmn = $trmn;
        return $this;
    }

    public function getTrn(): string
    {
        return $this->trn;
    }

    public function setTrn(string $trn): InvoicePayment
    {
        $this->trn = $trn;
        return $this;
    }

    public function getPcn(): string
    {
        return $this->pcn;
    }

    public function setPcn(string $pcn): InvoicePayment
    {
        $this->pcn = $pcn;
        return $this;
    }

    public function getPid(): string
    {
        return $this->pid;
    }

    public function setPid(string $pid): InvoicePayment
    {
        $this->pid = $pid;
        return $this;
    }

    public function getPdt(): ?int
    {
        return $this->pdt;
    }

    public function setPdt(?int $pdt): InvoicePayment
    {
        $this->pdt = $pdt;
        return $this;
    }

    public function getPmt(): ?int
    {
        return $this->pmt;
    }

    public function setPmt(?int $pmt): InvoicePayment
    {
        $this->pmt = $pmt;
        return $this;
    }

    public function getPv(): ?int
    {
        return $this->pv;
    }

    public function setPv(?int $pv): InvoicePayment
    {
        $this->pv = $pv;
        return $this;
    }

    public function getPayment(): array
    {
        return get_object_vars($this);
    }
}