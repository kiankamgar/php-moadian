<?php

namespace KianKamgar\MoadianPhp\Models\Invoice;

class InvoiceBody
{
    public string $sstid;
    public string $sstt;
    public string $mu;
    public ?float $am;
    public ?float $fee;
    public ?float $cfee;
    public string $cut;
    public ?int $exr;
    public ?int $prdis;
    public ?int $dis;
    public ?int $adis;
    public ?float $vra;
    public ?int $vam;
    public string $odt;
    public ?float $odr;
    public ?int $odam;
    public string $olt;
    public ?float $olr;
    public ?int $olam;
    public ?int $consfee;
    public ?int $spro;
    public ?int $bros;
    public ?int $tcpbs;
    public ?int $cop;
    public string $bsrn;
    public ?int $vop;
    public ?int $tsstam;
    public ?float $nw;
    public ?int $ssrv;
    public ?float $sscv;
    public ?float $pspd;
    public ?float $cui;
    public string $hs;

    public function getSstid(): string
    {
        return $this->sstid;
    }

    public function setSstid(string $sstid): InvoiceBody
    {
        $this->sstid = $sstid;
        return $this;
    }

    public function getSstt(): string
    {
        return $this->sstt;
    }

    public function setSstt(string $sstt): InvoiceBody
    {
        $this->sstt = $sstt;
        return $this;
    }

    public function getMu(): string
    {
        return $this->mu;
    }

    public function setMu(string $mu): InvoiceBody
    {
        $this->mu = $mu;
        return $this;
    }

    public function getAm(): ?float
    {
        return $this->am;
    }

    public function setAm(?float $am): InvoiceBody
    {
        $this->am = $am;
        return $this;
    }

    public function getFee(): ?float
    {
        return $this->fee;
    }

    public function setFee(?float $fee): InvoiceBody
    {
        $this->fee = $fee;
        return $this;
    }

    public function getCfee(): ?float
    {
        return $this->cfee;
    }

    public function setCfee(?float $cfee): InvoiceBody
    {
        $this->cfee = $cfee;
        return $this;
    }

    public function getCut(): string
    {
        return $this->cut;
    }

    public function setCut(string $cut): InvoiceBody
    {
        $this->cut = $cut;
        return $this;
    }

    public function getExr(): ?int
    {
        return $this->exr;
    }

    public function setExr(?int $exr): InvoiceBody
    {
        $this->exr = $exr;
        return $this;
    }

    public function getPrdis(): ?int
    {
        return $this->prdis;
    }

    public function setPrdis(?int $prdis): InvoiceBody
    {
        $this->prdis = $prdis;
        return $this;
    }

    public function getDis(): ?int
    {
        return $this->dis;
    }

    public function setDis(?int $dis): InvoiceBody
    {
        $this->dis = $dis;
        return $this;
    }

    public function getAdis(): ?int
    {
        return $this->adis;
    }

    public function setAdis(?int $adis): InvoiceBody
    {
        $this->adis = $adis;
        return $this;
    }

    public function getVra(): ?float
    {
        return $this->vra;
    }

    public function setVra(?float $vra): InvoiceBody
    {
        $this->vra = $vra;
        return $this;
    }

    public function getVam(): ?int
    {
        return $this->vam;
    }

    public function setVam(?int $vam): InvoiceBody
    {
        $this->vam = $vam;
        return $this;
    }

    public function getOdt(): string
    {
        return $this->odt;
    }

    public function setOdt(string $odt): InvoiceBody
    {
        $this->odt = $odt;
        return $this;
    }

    public function getOdr(): ?float
    {
        return $this->odr;
    }

    public function setOdr(?float $odr): InvoiceBody
    {
        $this->odr = $odr;
        return $this;
    }

    public function getOdam(): ?int
    {
        return $this->odam;
    }

    public function setOdam(?int $odam): InvoiceBody
    {
        $this->odam = $odam;
        return $this;
    }

    public function getOlt(): string
    {
        return $this->olt;
    }

    public function setOlt(string $olt): InvoiceBody
    {
        $this->olt = $olt;
        return $this;
    }

    public function getOlr(): ?float
    {
        return $this->olr;
    }

    public function setOlr(?float $olr): InvoiceBody
    {
        $this->olr = $olr;
        return $this;
    }

    public function getOlam(): ?int
    {
        return $this->olam;
    }

    public function setOlam(?int $olam): InvoiceBody
    {
        $this->olam = $olam;
        return $this;
    }

    public function getConsfee(): ?int
    {
        return $this->consfee;
    }

    public function setConsfee(?int $consfee): InvoiceBody
    {
        $this->consfee = $consfee;
        return $this;
    }

    public function getSpro(): ?int
    {
        return $this->spro;
    }

    public function setSpro(?int $spro): InvoiceBody
    {
        $this->spro = $spro;
        return $this;
    }

    public function getBros(): ?int
    {
        return $this->bros;
    }

    public function setBros(?int $bros): InvoiceBody
    {
        $this->bros = $bros;
        return $this;
    }

    public function getTcpbs(): ?int
    {
        return $this->tcpbs;
    }

    public function setTcpbs(?int $tcpbs): InvoiceBody
    {
        $this->tcpbs = $tcpbs;
        return $this;
    }

    public function getCop(): ?int
    {
        return $this->cop;
    }

    public function setCop(?int $cop): InvoiceBody
    {
        $this->cop = $cop;
        return $this;
    }

    public function getBsrn(): string
    {
        return $this->bsrn;
    }

    public function setBsrn(string $bsrn): InvoiceBody
    {
        $this->bsrn = $bsrn;
        return $this;
    }

    public function getVop(): ?int
    {
        return $this->vop;
    }

    public function setVop(?int $vop): InvoiceBody
    {
        $this->vop = $vop;
        return $this;
    }

    public function getTsstam(): ?int
    {
        return $this->tsstam;
    }

    public function setTsstam(?int $tsstam): InvoiceBody
    {
        $this->tsstam = $tsstam;
        return $this;
    }

    public function getNw(): ?float
    {
        return $this->nw;
    }

    public function setNw(?float $nw): InvoiceBody
    {
        $this->nw = $nw;
        return $this;
    }

    public function getSsrv(): ?int
    {
        return $this->ssrv;
    }

    public function setSsrv(?int $ssrv): InvoiceBody
    {
        $this->ssrv = $ssrv;
        return $this;
    }

    public function getSscv(): ?float
    {
        return $this->sscv;
    }

    public function setSscv(?float $sscv): InvoiceBody
    {
        $this->sscv = $sscv;
        return $this;
    }

    public function getPspd(): ?float
    {
        return $this->pspd;
    }

    public function setPspd(?float $pspd): InvoiceBody
    {
        $this->pspd = $pspd;
        return $this;
    }

    public function getCui(): ?float
    {
        return $this->cui;
    }

    public function setCui(?float $cui): InvoiceBody
    {
        $this->cui = $cui;
        return $this;
    }

    public function getHs(): string
    {
        return $this->hs;
    }

    public function setHs(string $hs): InvoiceBody
    {
        $this->hs = $hs;
        return $this;
    }

    public function getBody(): array
    {
        return get_object_vars($this);
    }
}