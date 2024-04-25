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

    /**
     * Set Shomare Switch
     *
     * @param string $iinn
     * @return $this
     */
    public function setIinn(string $iinn): InvoicePayment
    {
        $this->iinn = $iinn;
        return $this;
    }

    /**
     * Set Shomare Pazirandeh Forooshgahi
     *
     * @param string $acn
     * @return $this
     */
    public function setAcn(string $acn): InvoicePayment
    {
        $this->acn = $acn;
        return $this;
    }

    /**
     * Set Shomare Payaneh
     *
     * @param string $trmn
     * @return $this
     */
    public function setTrmn(string $trmn): InvoicePayment
    {
        $this->trmn = $trmn;
        return $this;
    }

    /**
     * Set Shomare Peygiri Ya Marja
     *
     * @param string $trn
     * @return $this
     */
    public function setTrn(string $trn): InvoicePayment
    {
        $this->trn = $trn;
        return $this;
    }

    /**
     * Set Shomare Karte Pardakht Konandehye Soorat Hesab
     *
     * @param string $pcn
     * @return $this
     */
    public function setPcn(string $pcn): InvoicePayment
    {
        $this->pcn = $pcn;
        return $this;
    }

    /**
     * Set Shomare Melli Pardakht Konandeye Soorat Hesab
     *
     * @param string $pid
     * @return $this
     */
    public function setPid(string $pid): InvoicePayment
    {
        $this->pid = $pid;
        return $this;
    }

    /**
     * Set Tarikh Va Zamane Pardakhte Soorat Hesab
     *
     * @param int|null $pdt
     * @return $this
     */
    public function setPdt(?int $pdt): InvoicePayment
    {
        $this->pdt = $pdt;
        return $this;
    }

    /**
     * Set Raveshe Pardakht
     *
     * @param int|null $pmt
     * @return $this
     */
    public function setPmt(?int $pmt): InvoicePayment
    {
        $this->pmt = $pmt;
        return $this;
    }

    /**
     * Set Mablaghe Pardakhti
     *
     * @param int|null $pv
     * @return $this
     */
    public function setPv(?int $pv): InvoicePayment
    {
        $this->pv = $pv;
        return $this;
    }

    /**
     * Build Invoice Payment
     *
     * @return array
     */
    public function build(): array
    {
        return get_object_vars($this);
    }
}