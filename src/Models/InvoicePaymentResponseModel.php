<?php

namespace KianKamgar\MoadianPhp\Models;

class InvoicePaymentResponseModel
{
    public string $iinn;
    public string $acn;
    public string $trmn;
    public string $trn;
    public string $pcn;
    public string $pid;
    public ?string $pdt;
    public ?int $pmt;
    public ?string $pv;

    public function getIinn(): string
    {
        return $this->iinn;
    }

    public function setIinn(string $iinn): InvoicePaymentResponseModel
    {
        $this->iinn = $iinn;
        return $this;
    }

    public function getAcn(): string
    {
        return $this->acn;
    }

    public function setAcn(string $acn): InvoicePaymentResponseModel
    {
        $this->acn = $acn;
        return $this;
    }

    public function getTrmn(): string
    {
        return $this->trmn;
    }

    public function setTrmn(string $trmn): InvoicePaymentResponseModel
    {
        $this->trmn = $trmn;
        return $this;
    }

    public function getTrn(): string
    {
        return $this->trn;
    }

    public function setTrn(string $trn): InvoicePaymentResponseModel
    {
        $this->trn = $trn;
        return $this;
    }

    public function getPcn(): string
    {
        return $this->pcn;
    }

    public function setPcn(string $pcn): InvoicePaymentResponseModel
    {
        $this->pcn = $pcn;
        return $this;
    }

    public function getPid(): string
    {
        return $this->pid;
    }

    public function setPid(string $pid): InvoicePaymentResponseModel
    {
        $this->pid = $pid;
        return $this;
    }

    public function getPdt(): ?string
    {
        return $this->pdt;
    }

    public function setPdt(?string $pdt): InvoicePaymentResponseModel
    {
        $this->pdt = $pdt;
        return $this;
    }

    public function getPmt(): ?int
    {
        return $this->pmt;
    }

    public function setPmt(?int $pmt): InvoicePaymentResponseModel
    {
        $this->pmt = $pmt;
        return $this;
    }

    public function getPv(): ?string
    {
        return $this->pv;
    }

    public function setPv(?string $pv): InvoicePaymentResponseModel
    {
        $this->pv = $pv;
        return $this;
    }

    public function getPayment(): array
    {
        return get_object_vars($this);
    }
}