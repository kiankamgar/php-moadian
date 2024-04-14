<?php

namespace KianKamgar\MoadianPhp\Models\Invoice;

class InvoiceBody
{
    private string $sstid;
    private string $sstt;
    private string $mu;
    private ?float $am;
    private ?float $fee;
    private ?float $cfee;
    private string $cut;
    private ?int $exr;
    private ?int $prdis;
    private ?int $dis;
    private ?int $adis;
    private ?float $vra;
    private ?int $vam;
    private string $odt;
    private ?float $odr;
    private ?int $odam;
    private string $olt;
    private ?float $olr;
    private ?int $olam;
    private ?int $consfee;
    private ?int $spro;
    private ?int $bros;
    private ?int $tcpbs;
    private ?int $cop;
    private string $bsrn;
    private ?int $vop;
    private ?int $tsstam;
    private ?float $nw;
    private ?int $ssrv;
    private ?float $sscv;
    private ?float $pspd;
    private ?float $cui;
    private string $hs;

    public function setSstid(string $sstid): InvoiceBody
    {
        $this->sstid = $sstid;
        return $this;
    }

    public function setSstt(string $sstt): InvoiceBody
    {
        $this->sstt = $sstt;
        return $this;
    }

    public function setMu(string $mu): InvoiceBody
    {
        $this->mu = $mu;
        return $this;
    }

    public function setAm(?float $am): InvoiceBody
    {
        $this->am = $am;
        return $this;
    }

    public function setFee(?float $fee): InvoiceBody
    {
        $this->fee = $fee;
        return $this;
    }

    public function setCfee(?float $cfee): InvoiceBody
    {
        $this->cfee = $cfee;
        return $this;
    }

    public function setCut(string $cut): InvoiceBody
    {
        $this->cut = $cut;
        return $this;
    }

    public function setExr(?int $exr): InvoiceBody
    {
        $this->exr = $exr;
        return $this;
    }

    public function setPrdis(?int $prdis): InvoiceBody
    {
        $this->prdis = $prdis;
        return $this;
    }

    public function setDis(?int $dis): InvoiceBody
    {
        $this->dis = $dis;
        return $this;
    }

    public function setAdis(?int $adis): InvoiceBody
    {
        $this->adis = $adis;
        return $this;
    }

    public function setVra(?float $vra): InvoiceBody
    {
        $this->vra = $vra;
        return $this;
    }

    public function setVam(?int $vam): InvoiceBody
    {
        $this->vam = $vam;
        return $this;
    }

    public function setOdt(string $odt): InvoiceBody
    {
        $this->odt = $odt;
        return $this;
    }

    public function setOdr(?float $odr): InvoiceBody
    {
        $this->odr = $odr;
        return $this;
    }

    public function setOdam(?int $odam): InvoiceBody
    {
        $this->odam = $odam;
        return $this;
    }

    public function setOlt(string $olt): InvoiceBody
    {
        $this->olt = $olt;
        return $this;
    }

    public function setOlr(?float $olr): InvoiceBody
    {
        $this->olr = $olr;
        return $this;
    }

    public function setOlam(?int $olam): InvoiceBody
    {
        $this->olam = $olam;
        return $this;
    }

    public function setConsfee(?int $consfee): InvoiceBody
    {
        $this->consfee = $consfee;
        return $this;
    }

    public function setSpro(?int $spro): InvoiceBody
    {
        $this->spro = $spro;
        return $this;
    }

    public function setBros(?int $bros): InvoiceBody
    {
        $this->bros = $bros;
        return $this;
    }

    public function setTcpbs(?int $tcpbs): InvoiceBody
    {
        $this->tcpbs = $tcpbs;
        return $this;
    }

    public function setCop(?int $cop): InvoiceBody
    {
        $this->cop = $cop;
        return $this;
    }

    public function setBsrn(string $bsrn): InvoiceBody
    {
        $this->bsrn = $bsrn;
        return $this;
    }

    public function setVop(?int $vop): InvoiceBody
    {
        $this->vop = $vop;
        return $this;
    }

    public function setTsstam(?int $tsstam): InvoiceBody
    {
        $this->tsstam = $tsstam;
        return $this;
    }

    public function setNw(?float $nw): InvoiceBody
    {
        $this->nw = $nw;
        return $this;
    }

    public function setSsrv(?int $ssrv): InvoiceBody
    {
        $this->ssrv = $ssrv;
        return $this;
    }

    public function setSscv(?float $sscv): InvoiceBody
    {
        $this->sscv = $sscv;
        return $this;
    }

    public function setPspd(?float $pspd): InvoiceBody
    {
        $this->pspd = $pspd;
        return $this;
    }

    public function setCui(?float $cui): InvoiceBody
    {
        $this->cui = $cui;
        return $this;
    }

    public function setHs(string $hs): InvoiceBody
    {
        $this->hs = $hs;
        return $this;
    }

    public function build(): array
    {
        return get_object_vars($this);
    }
}