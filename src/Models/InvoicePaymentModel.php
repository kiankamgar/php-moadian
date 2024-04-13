<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ModelInterface;

class InvoicePaymentModel implements ModelInterface
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

    public function setIinn(string $iinn): InvoicePaymentModel
    {
        $this->iinn = $iinn;
        return $this;
    }

    public function getAcn(): string
    {
        return $this->acn;
    }

    public function setAcn(string $acn): InvoicePaymentModel
    {
        $this->acn = $acn;
        return $this;
    }

    public function getTrmn(): string
    {
        return $this->trmn;
    }

    public function setTrmn(string $trmn): InvoicePaymentModel
    {
        $this->trmn = $trmn;
        return $this;
    }

    public function getTrn(): string
    {
        return $this->trn;
    }

    public function setTrn(string $trn): InvoicePaymentModel
    {
        $this->trn = $trn;
        return $this;
    }

    public function getPcn(): string
    {
        return $this->pcn;
    }

    public function setPcn(string $pcn): InvoicePaymentModel
    {
        $this->pcn = $pcn;
        return $this;
    }

    public function getPid(): string
    {
        return $this->pid;
    }

    public function setPid(string $pid): InvoicePaymentModel
    {
        $this->pid = $pid;
        return $this;
    }

    public function getPdt(): ?string
    {
        return $this->pdt;
    }

    public function setPdt(?string $pdt): InvoicePaymentModel
    {
        $this->pdt = $pdt;
        return $this;
    }

    public function getPmt(): ?int
    {
        return $this->pmt;
    }

    public function setPmt(?int $pmt): InvoicePaymentModel
    {
        $this->pmt = $pmt;
        return $this;
    }

    public function getPv(): ?string
    {
        return $this->pv;
    }

    public function setPv(?string $pv): InvoicePaymentModel
    {
        $this->pv = $pv;
        return $this;
    }
}