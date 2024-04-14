<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ResponseModelInterface;

class InvoiceBodyResponseModel
{
    public string $sstid;
    public string $sstt;
    public string $mu;
    public ?float $am;
    public ?float $fee;
    public ?float $cfee;
    public string $cut;
    public ?string $exr;
    public ?string $prdis;
    public ?string $dis;
    public ?string $adis;
    public ?float $vra;
    public ?string $vam;
    public string $odt;
    public ?float $odr;
    public ?string $odam;
    public string $olt;
    public ?float $olr;
    public ?string $olam;
    public ?string $consfee;
    public ?string $spro;
    public ?string $bros;
    public ?string $tcpbs;
    public ?string $cop;
    public string $bsrn;
    public ?string $vop;
    public ?string $tsstam;
    public ?float $nw;
    public ?string $ssrv;
    public ?float $sscv;
    public ?float $pspd;
    public ?float $cui;
    public string $hs;

    public function getSstid(): string
    {
        return $this->sstid;
    }

    public function setSstid(string $sstid): InvoiceBodyResponseModel
    {
        $this->sstid = $sstid;
        return $this;
    }

    public function getSstt(): string
    {
        return $this->sstt;
    }

    public function setSstt(string $sstt): InvoiceBodyResponseModel
    {
        $this->sstt = $sstt;
        return $this;
    }

    public function getMu(): string
    {
        return $this->mu;
    }

    public function setMu(string $mu): InvoiceBodyResponseModel
    {
        $this->mu = $mu;
        return $this;
    }

    public function getAm(): ?float
    {
        return $this->am;
    }

    public function setAm(?float $am): InvoiceBodyResponseModel
    {
        $this->am = $am;
        return $this;
    }

    public function getFee(): ?float
    {
        return $this->fee;
    }

    public function setFee(?float $fee): InvoiceBodyResponseModel
    {
        $this->fee = $fee;
        return $this;
    }

    public function getCfee(): ?float
    {
        return $this->cfee;
    }

    public function setCfee(?float $cfee): InvoiceBodyResponseModel
    {
        $this->cfee = $cfee;
        return $this;
    }

    public function getCut(): string
    {
        return $this->cut;
    }

    public function setCut(string $cut): InvoiceBodyResponseModel
    {
        $this->cut = $cut;
        return $this;
    }

    public function getExr(): ?string
    {
        return $this->exr;
    }

    public function setExr(?string $exr): InvoiceBodyResponseModel
    {
        $this->exr = $exr;
        return $this;
    }

    public function getPrdis(): ?string
    {
        return $this->prdis;
    }

    public function setPrdis(?string $prdis): InvoiceBodyResponseModel
    {
        $this->prdis = $prdis;
        return $this;
    }

    public function getDis(): ?string
    {
        return $this->dis;
    }

    public function setDis(?string $dis): InvoiceBodyResponseModel
    {
        $this->dis = $dis;
        return $this;
    }

    public function getAdis(): ?string
    {
        return $this->adis;
    }

    public function setAdis(?string $adis): InvoiceBodyResponseModel
    {
        $this->adis = $adis;
        return $this;
    }

    public function getVra(): ?float
    {
        return $this->vra;
    }

    public function setVra(?float $vra): InvoiceBodyResponseModel
    {
        $this->vra = $vra;
        return $this;
    }

    public function getVam(): ?string
    {
        return $this->vam;
    }

    public function setVam(?string $vam): InvoiceBodyResponseModel
    {
        $this->vam = $vam;
        return $this;
    }

    public function getOdt(): string
    {
        return $this->odt;
    }

    public function setOdt(string $odt): InvoiceBodyResponseModel
    {
        $this->odt = $odt;
        return $this;
    }

    public function getOdr(): ?float
    {
        return $this->odr;
    }

    public function setOdr(?float $odr): InvoiceBodyResponseModel
    {
        $this->odr = $odr;
        return $this;
    }

    public function getOdam(): ?string
    {
        return $this->odam;
    }

    public function setOdam(?string $odam): InvoiceBodyResponseModel
    {
        $this->odam = $odam;
        return $this;
    }

    public function getOlt(): string
    {
        return $this->olt;
    }

    public function setOlt(string $olt): InvoiceBodyResponseModel
    {
        $this->olt = $olt;
        return $this;
    }

    public function getOlr(): ?float
    {
        return $this->olr;
    }

    public function setOlr(?float $olr): InvoiceBodyResponseModel
    {
        $this->olr = $olr;
        return $this;
    }

    public function getOlam(): ?string
    {
        return $this->olam;
    }

    public function setOlam(?string $olam): InvoiceBodyResponseModel
    {
        $this->olam = $olam;
        return $this;
    }

    public function getConsfee(): ?string
    {
        return $this->consfee;
    }

    public function setConsfee(?string $consfee): InvoiceBodyResponseModel
    {
        $this->consfee = $consfee;
        return $this;
    }

    public function getSpro(): ?string
    {
        return $this->spro;
    }

    public function setSpro(?string $spro): InvoiceBodyResponseModel
    {
        $this->spro = $spro;
        return $this;
    }

    public function getBros(): ?string
    {
        return $this->bros;
    }

    public function setBros(?string $bros): InvoiceBodyResponseModel
    {
        $this->bros = $bros;
        return $this;
    }

    public function getTcpbs(): ?string
    {
        return $this->tcpbs;
    }

    public function setTcpbs(?string $tcpbs): InvoiceBodyResponseModel
    {
        $this->tcpbs = $tcpbs;
        return $this;
    }

    public function getCop(): ?string
    {
        return $this->cop;
    }

    public function setCop(?string $cop): InvoiceBodyResponseModel
    {
        $this->cop = $cop;
        return $this;
    }

    public function getBsrn(): string
    {
        return $this->bsrn;
    }

    public function setBsrn(string $bsrn): InvoiceBodyResponseModel
    {
        $this->bsrn = $bsrn;
        return $this;
    }

    public function getVop(): ?string
    {
        return $this->vop;
    }

    public function setVop(?string $vop): InvoiceBodyResponseModel
    {
        $this->vop = $vop;
        return $this;
    }

    public function getTsstam(): ?string
    {
        return $this->tsstam;
    }

    public function setTsstam(?string $tsstam): InvoiceBodyResponseModel
    {
        $this->tsstam = $tsstam;
        return $this;
    }

    public function getNw(): ?float
    {
        return $this->nw;
    }

    public function setNw(?float $nw): InvoiceBodyResponseModel
    {
        $this->nw = $nw;
        return $this;
    }

    public function getSsrv(): ?string
    {
        return $this->ssrv;
    }

    public function setSsrv(?string $ssrv): InvoiceBodyResponseModel
    {
        $this->ssrv = $ssrv;
        return $this;
    }

    public function getSscv(): ?float
    {
        return $this->sscv;
    }

    public function setSscv(?float $sscv): InvoiceBodyResponseModel
    {
        $this->sscv = $sscv;
        return $this;
    }

    public function getPspd(): ?float
    {
        return $this->pspd;
    }

    public function setPspd(?float $pspd): InvoiceBodyResponseModel
    {
        $this->pspd = $pspd;
        return $this;
    }

    public function getCui(): ?float
    {
        return $this->cui;
    }

    public function setCui(?float $cui): InvoiceBodyResponseModel
    {
        $this->cui = $cui;
        return $this;
    }

    public function getHs(): string
    {
        return $this->hs;
    }

    public function setHs(string $hs): InvoiceBodyResponseModel
    {
        $this->hs = $hs;
        return $this;
    }

    public function getBody(): array
    {
        return get_object_vars($this);
    }
}