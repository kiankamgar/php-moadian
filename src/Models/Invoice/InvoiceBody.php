<?php

namespace KianKamgar\MoadianPhp\Models\Invoice;

use KianKamgar\MoadianPhp\Enums\VahedeAndazegiri;

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

    /**
     * Set Shenase Kala Ya Khedmat
     *
     * @param string $sstid
     * @return $this
     */
    public function setSstid(string $sstid): InvoiceBody
    {
        $this->sstid = $sstid;
        return $this;
    }

    /**
     * Set Sharh Kala Ya Khedmat
     *
     * @param string $sstt
     * @return $this
     */
    public function setSstt(string $sstt): InvoiceBody
    {
        $this->sstt = $sstt;
        return $this;
    }

    /**
     * Set Vahede Andazegiri
     *
     * @param string $mu
     * @return $this
     * @see VahedeAndazegiri
     */
    public function setMu(string $mu): InvoiceBody
    {
        $this->mu = $mu;
        return $this;
    }

    /**
     * Set Tedad Ya Meghdar
     *
     * @param float|null $am
     * @return $this
     */
    public function setAm(?float $am): InvoiceBody
    {
        $this->am = $am;
        return $this;
    }

    /**
     * Set Mablaghe Vahed
     *
     * @param float|null $fee
     * @return $this
     */
    public function setFee(?float $fee): InvoiceBody
    {
        $this->fee = $fee;
        return $this;
    }

    /**
     * Set Mizane Arz
     *
     * @param float|null $cfee
     * @return $this
     */
    public function setCfee(?float $cfee): InvoiceBody
    {
        $this->cfee = $cfee;
        return $this;
    }

    /**
     * Set Noe Arz
     *
     * @param string $cut
     * @return $this
     */
    public function setCut(string $cut): InvoiceBody
    {
        $this->cut = $cut;
        return $this;
    }

    /**
     * Set Noe Barabari Arz Ba Rial
     *
     * @param int|null $exr
     * @return $this
     */
    public function setExr(?int $exr): InvoiceBody
    {
        $this->exr = $exr;
        return $this;
    }

    /**
     * Set Mablagh Ghabl Az Takhfif
     *
     * @param int|null $prdis
     * @return $this
     */
    public function setPrdis(?int $prdis): InvoiceBody
    {
        $this->prdis = $prdis;
        return $this;
    }

    /**
     * Set Mablaghe Takhfif
     *
     * @param int|null $dis
     * @return $this
     */
    public function setDis(?int $dis): InvoiceBody
    {
        $this->dis = $dis;
        return $this;
    }

    /**
     * Set Mablagh Baad Az Takhfif
     *
     * @param int|null $adis
     * @return $this
     */
    public function setAdis(?int $adis): InvoiceBody
    {
        $this->adis = $adis;
        return $this;
    }

    /**
     * Set Nerkhe Maliyate Bar Arzeshe Afzoodeh
     *
     * @param float|null $vra
     * @return $this
     */
    public function setVra(?float $vra): InvoiceBody
    {
        $this->vra = $vra;
        return $this;
    }

    /**
     * Set Mablaghe Maliyate Bar Arzeshe Afzoodeh
     *
     * @param int|null $vam
     * @return $this
     */
    public function setVam(?int $vam): InvoiceBody
    {
        $this->vam = $vam;
        return $this;
    }

    /**
     * Set Mozooe Sayere Maliyat Va Avarez
     *
     * @param string $odt
     * @return $this
     */
    public function setOdt(string $odt): InvoiceBody
    {
        $this->odt = $odt;
        return $this;
    }

    /**
     * Set Nerkhe Sayere Maliyat Va Avarez
     *
     * @param float|null $odr
     * @return $this
     */
    public function setOdr(?float $odr): InvoiceBody
    {
        $this->odr = $odr;
        return $this;
    }

    /**
     * Set Mablaghe Sayere Maliyat Va Avarez
     *
     * @param int|null $odam
     * @return $this
     */
    public function setOdam(?int $odam): InvoiceBody
    {
        $this->odam = $odam;
        return $this;
    }

    /**
     * Set Mozooe Sayere Vojoohe Ghanooni
     *
     * @param string $olt
     * @return $this
     */
    public function setOlt(string $olt): InvoiceBody
    {
        $this->olt = $olt;
        return $this;
    }

    /**
     * Set Nerkhe Sayere Vojoohe Ghanooni
     *
     * @param float|null $olr
     * @return $this
     */
    public function setOlr(?float $olr): InvoiceBody
    {
        $this->olr = $olr;
        return $this;
    }

    /**
     * Set Mablaghe Sayere Vojoohe Ghanooni
     *
     * @param int|null $olam
     * @return $this
     */
    public function setOlam(?int $olam): InvoiceBody
    {
        $this->olam = $olam;
        return $this;
    }

    /**
     * Set Ojrate Sakht
     *
     * @param int|null $consfee
     * @return $this
     */
    public function setConsfee(?int $consfee): InvoiceBody
    {
        $this->consfee = $consfee;
        return $this;
    }

    /**
     * Set Soode Forooshandeh
     *
     * @param int|null $spro
     * @return $this
     */
    public function setSpro(?int $spro): InvoiceBody
    {
        $this->spro = $spro;
        return $this;
    }

    /**
     * Set Hagholamal
     *
     * @param int|null $bros
     * @return $this
     */
    public function setBros(?int $bros): InvoiceBody
    {
        $this->bros = $bros;
        return $this;
    }

    /**
     * Set Jame Kole Ojrat Va Hagholamal Va Sood
     *
     * @param int|null $tcpbs
     * @return $this
     */
    public function setTcpbs(?int $tcpbs): InvoiceBody
    {
        $this->tcpbs = $tcpbs;
        return $this;
    }

    /**
     * Set Sahme Naghdi Az Pardakht
     *
     * @param int|null $cop
     * @return $this
     */
    public function setCop(?int $cop): InvoiceBody
    {
        $this->cop = $cop;
        return $this;
    }

    /**
     * Set Shenaseh Yektaye Sabte Gharadade Hagholamalkari
     *
     * @param string $bsrn
     * @return $this
     */
    public function setBsrn(string $bsrn): InvoiceBody
    {
        $this->bsrn = $bsrn;
        return $this;
    }

    /**
     * Set Sahme Maliyat Bar Arzeshe Afzoodeh Az Pardakht
     *
     * @param int|null $vop
     * @return $this
     */
    public function setVop(?int $vop): InvoiceBody
    {
        $this->vop = $vop;
        return $this;
    }

    /**
     * Set Mablaghe Kole Kala Ya Khadamat
     *
     * @param int|null $tsstam
     * @return $this
     */
    public function setTsstam(?int $tsstam): InvoiceBody
    {
        $this->tsstam = $tsstam;
        return $this;
    }

    /**
     * Set Vazne Khales
     *
     * @param float|null $nw
     * @return $this
     */
    public function setNw(?float $nw): InvoiceBody
    {
        $this->nw = $nw;
        return $this;
    }

    /**
     * Set Arzeshe Riali Kala
     *
     * @param int|null $ssrv
     * @return $this
     */
    public function setSsrv(?int $ssrv): InvoiceBody
    {
        $this->ssrv = $ssrv;
        return $this;
    }

    /**
     * Set Arzeshe Arzi Kala
     *
     * @param float|null $sscv
     * @return $this
     */
    public function setSscv(?float $sscv): InvoiceBody
    {
        $this->sscv = $sscv;
        return $this;
    }

    /**
     * Set Tafavote Nerkhe Kharid Va Foroosh Ya Karmozde Forooshe Arz
     *
     * @param float|null $pspd
     * @return $this
     */
    public function setPspd(?float $pspd): InvoiceBody
    {
        $this->pspd = $pspd;
        return $this;
    }

    /**
     * Set Ayar
     *
     * @param float|null $cui
     * @return $this
     */
    public function setCui(?float $cui): InvoiceBody
    {
        $this->cui = $cui;
        return $this;
    }

    /**
     * Set Kode Hs Ghalame Kala
     *
     * @param string $hs
     * @return $this
     */
    public function setHs(string $hs): InvoiceBody
    {
        $this->hs = $hs;
        return $this;
    }

    /**
     * Build Invoice Body
     *
     * @return array
     */
    public function build(): array
    {
        return get_object_vars($this);
    }
}