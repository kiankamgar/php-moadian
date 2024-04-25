<?php

namespace KianKamgar\MoadianPhp\Models\Invoice;

use DateTime;
use KianKamgar\MoadianPhp\Enums\FlightType;
use KianKamgar\MoadianPhp\Enums\InvoicePattern;
use KianKamgar\MoadianPhp\Enums\InvoiceType;
use KianKamgar\MoadianPhp\Enums\PersonType;
use KianKamgar\MoadianPhp\Enums\SettlementType;
use KianKamgar\MoadianPhp\Helpers\VerhoeffAlgorithm;

class InvoiceHeader
{
    private ?int $indati2m;
    private ?int $indatim;
    private ?int $inty;
    private ?int $ft;
    private string $inno;
    private string $irtaxid;
    private string $scln;
    private ?int $setm;
    private string $tins;
    private ?int $cap;
    private string $bid;
    private ?int $insp;
    private ?int $tvop;
    private string $bpc;
    private ?int $tax17;
    private string $taxid;
    private ?int $inp;
    private string $scc;
    private ?int $ins;
    private string $billid;
    private ?int $tprdis;
    private ?int $tdis;
    private ?int $tadis;
    private ?int $tvam;
    private ?int $todam;
    private ?int $tbill;
    private ?int $tob;
    private string $tinb;
    private string $sbc;
    private string $bbc;
    private string $bpn;
    private string $crn;
    private string $cdcn;
    private ?int $cdcd;
    private ?float $tonw;
    private ?int $torv;
    private ?float $tocv;
    private string $tinc;
    private string $memoryId;

    /**
     * Set Tarikhe Ijade Soorat Hesab
     *
     * @param int|null $indati2m
     * @return $this
     */
    public function setIndati2m(?int $indati2m): InvoiceHeader
    {
        $this->indati2m = $indati2m;
        return $this;
    }

    /**
     * Set Noe Soorat Hesab
     *
     * @see InvoiceType
     * @param int|null $inty
     * @return $this
     */
    public function setInty(?int $inty): InvoiceHeader
    {
        $this->inty = $inty;
        return $this;
    }

    /**
     * Set Noe Parvaz
     *
     * @param int|null $ft
     * @return $this
     * @see FlightType
     */
    public function setFt(?int $ft): InvoiceHeader
    {
        $this->ft = $ft;
        return $this;
    }

    /**
     * Set Shomare Maliyati Soorat Hesabe Marja
     *
     * @param string $irtaxid
     * @return $this
     */
    public function setIrtaxid(string $irtaxid): InvoiceHeader
    {
        $this->irtaxid = $irtaxid;
        return $this;
    }

    /**
     * Set Shomare Parvaneh Gomroki
     *
     * @param string $scln
     * @return $this
     */
    public function setScln(string $scln): InvoiceHeader
    {
        $this->scln = $scln;
        return $this;
    }

    /**
     * Set Ravesh Tasvieh
     *
     * @param int|null $setm
     * @return $this
     * @see SettlementType
     */
    public function setSetm(?int $setm): InvoiceHeader
    {
        $this->setm = $setm;
        return $this;
    }

    /**
     * Set Shomare Eghtesadi Forooshande
     *
     * @param string $tins
     * @return $this
     */
    public function setTins(string $tins): InvoiceHeader
    {
        $this->tins = $tins;
        return $this;
    }

    /**
     * Set Mablaghe Pardakhti Naghdi
     *
     * @param int|null $cap
     * @return $this
     */
    public function setCap(?int $cap): InvoiceHeader
    {
        $this->cap = $cap;
        return $this;
    }

    /**
     * Set Shomare Melli Kharidar
     *
     * @param string $bid
     * @return $this
     */
    public function setBid(string $bid): InvoiceHeader
    {
        $this->bid = $bid;
        return $this;
    }

    /**
     * Set Mablagh Nesieh
     *
     * @param int|null $insp
     * @return $this
     */
    public function setInsp(?int $insp): InvoiceHeader
    {
        $this->insp = $insp;
        return $this;
    }

    /**
     * Set Majmooe Sahme Maliyat Bar Arzeshe Afzoodeh Az Pardakht
     *
     * @param int|null $tvop
     * @return $this
     */
    public function setTvop(?int $tvop): InvoiceHeader
    {
        $this->tvop = $tvop;
        return $this;
    }

    /**
     * Set Kode Posti Kharidar
     *
     * @param string $bpc
     * @return $this
     */
    public function setBpc(string $bpc): InvoiceHeader
    {
        $this->bpc = $bpc;
        return $this;
    }

    /**
     * Set Maliyate Mozooe Madeh 17
     *
     * @param int|null $tax17
     * @return $this
     */
    public function setTax17(?int $tax17): InvoiceHeader
    {
        $this->tax17 = $tax17;
        return $this;
    }

    /**
     * Set Olgooye Soorat Hesab
     *
     * @param int|null $inp
     * @return $this
     * @see InvoicePattern
     */
    public function setInp(?int $inp): InvoiceHeader
    {
        $this->inp = $inp;
        return $this;
    }

    /**
     * Set Kode Gomroke Mahale Ezhar
     *
     * @param string $scc
     * @return $this
     */
    public function setScc(string $scc): InvoiceHeader
    {
        $this->scc = $scc;
        return $this;
    }

    /**
     * Set Mablagh Nesieh
     *
     * @param int|null $ins
     * @return $this
     */
    public function setIns(?int $ins): InvoiceHeader
    {
        $this->ins = $ins;
        return $this;
    }

    /**
     * Set Shomare Eshterak Ya Shenaseh Ghabze Bahrebardari
     *
     * @param string $billid
     * @return $this
     */
    public function setBillid(string $billid): InvoiceHeader
    {
        $this->billid = $billid;
        return $this;
    }

    /**
     * Set Majmooe Mablagh Ghabl Az Kasre Takhfif
     *
     * @param int|null $tprdis
     * @return $this
     */
    public function setTprdis(?int $tprdis): InvoiceHeader
    {
        $this->tprdis = $tprdis;
        return $this;
    }

    /**
     * Set Majmooe Takhfifat
     *
     * @param int|null $tdis
     * @return $this
     */
    public function setTdis(?int $tdis): InvoiceHeader
    {
        $this->tdis = $tdis;
        return $this;
    }

    /**
     * Set Majmooe Mablagh Pas Az Kasre Takhfif
     *
     * @param int|null $tadis
     * @return $this
     */
    public function setTadis(?int $tadis): InvoiceHeader
    {
        $this->tadis = $tadis;
        return $this;
    }

    /**
     * Set Majmooe Maliyat Bar Arzesh Afzoode
     *
     * @param int|null $tvam
     * @return $this
     */
    public function setTvam(?int $tvam): InvoiceHeader
    {
        $this->tvam = $tvam;
        return $this;
    }

    /**
     * Set Majmooe Sayere Maliyat Va Avarez Va Vojoohe Ghanooni
     *
     * @param int|null $todam
     * @return $this
     */
    public function setTodam(?int $todam): InvoiceHeader
    {
        $this->todam = $todam;
        return $this;
    }

    /**
     * Set Majmooe Soorat Hesab
     *
     * @param int|null $tbill
     * @return $this
     */
    public function setTbill(?int $tbill): InvoiceHeader
    {
        $this->tbill = $tbill;
        return $this;
    }

    /**
     * Set Noe Shakhse Kharidar
     *
     * @param int|null $tob
     * @return $this
     * @see PersonType
     */
    public function setTob(?int $tob): InvoiceHeader
    {
        $this->tob = $tob;
        return $this;
    }

    /**
     * Set Shomare Eghtesadi Kharidar
     *
     * @param string $tinb
     * @return $this
     */
    public function setTinb(string $tinb): InvoiceHeader
    {
        $this->tinb = $tinb;
        return $this;
    }

    /**
     * Set Kode Shobe Forooshande
     *
     * @param string $sbc
     * @return $this
     */
    public function setSbc(string $sbc): InvoiceHeader
    {
        $this->sbc = $sbc;
        return $this;
    }

    /**
     * Set Kode Shobe Kharidar
     *
     * @param string $bbc
     * @return $this
     */
    public function setBbc(string $bbc): InvoiceHeader
    {
        $this->bbc = $bbc;
        return $this;
    }

    /**
     * Set Shomare Gozarnameh Kharidar
     *
     * @param string $bpn
     * @return $this
     */
    public function setBpn(string $bpn): InvoiceHeader
    {
        $this->bpn = $bpn;
        return $this;
    }

    /**
     * Set Shenase Yektaye Sabte Gharadade Forooshandeh
     *
     * @param string $crn
     * @return $this
     */
    public function setCrn(string $crn): InvoiceHeader
    {
        $this->crn = $crn;
        return $this;
    }

    /**
     * Set Shomare Kootazhe Ezharnameye Gomroki
     *
     * @param string $cdcn
     * @return $this
     */
    public function setCdcn(string $cdcn): InvoiceHeader
    {
        $this->cdcn = $cdcn;
        return $this;
    }

    /**
     * Set Tarikhe Kootazhe Ezharnameye Gomroki
     *
     * @param int|null $cdcd
     * @return $this
     */
    public function setCdcd(?int $cdcd): InvoiceHeader
    {
        $this->cdcd = $cdcd;
        return $this;
    }

    /**
     * Set Majmooe Vazne Khales
     *
     * @param float|null $tonw
     * @return $this
     */
    public function setTonw(?float $tonw): InvoiceHeader
    {
        $this->tonw = $tonw;
        return $this;
    }

    /**
     * Set Majmooe Arzeshe Riali
     *
     * @param int|null $torv
     * @return $this
     */
    public function setTorv(?int $torv): InvoiceHeader
    {
        $this->torv = $torv;
        return $this;
    }

    /**
     * Set Majmooe Arzeshe Arzi
     *
     * @param float|null $tocv
     * @return $this
     */
    public function setTocv(?float $tocv): InvoiceHeader
    {
        $this->tocv = $tocv;
        return $this;
    }

    /**
     * Set Shomare Eghtesadi Azhans
     *
     * @param string $tinc
     * @return $this
     */
    public function setTinc(string $tinc): InvoiceHeader
    {
        $this->tinc = $tinc;
        return $this;
    }

    /**
     * Set memory id
     *
     * @param string $memoryId
     * @return $this
     */
    public function setMemoryId(string $memoryId): InvoiceHeader
    {
        $this->memoryId = $memoryId;
        return $this;
    }

    /**
     * Build the header
     *
     * @return array
     */
    public function build(): array
    {
        $this->init();
        $objects = get_object_vars($this);
        unset($objects['memoryId']);

        return $objects;
    }

    /**
     * Get Tarikh Va Zamane Sodoore Soorathesab (Miladi)
     *
     * @return int|null
     */
    public function getIndatim(): ?int
    {
        return $this->indatim;
    }

    /**
     * Set Tarikh Va Zamane Sodoore Soorathesab (Miladi)
     *
     * @param int|null $indatim
     * @return $this
     */
    public function setIndatim(?int $indatim): InvoiceHeader
    {
        $this->indatim = $indatim;
        return $this;
    }

    /**
     * Get Seriale Soorat Hesabe Dakheliye Hafezeye Maliati
     *
     * @return string
     */
    public function getInno(): string
    {
        return $this->inno;
    }

    /**
     * Set Seriale Soorat Hesabe Dakheliye Hafezeye Maliati
     *
     * @param string $inno
     * @return $this
     */
    public function setInno(string $inno): InvoiceHeader
    {
        $this->inno = $inno;
        return $this;
    }

    /**
     * Get Shomareye Monhaser Be Farde Maliyatiye Soorat Hesabe Marja
     *
     * @return string
     */
    public function getTaxid(): string
    {
        return $this->taxid;
    }

    /**
     * Set Shomareye Monhaser Be Farde Maliyatiye Soorat Hesabe Marja
     *
     * @param string $taxid
     * @return $this
     */
    public function setTaxid(string $taxid): InvoiceHeader
    {
        $this->taxid = $taxid;
        return $this;
    }

    /**
     * Init invoice header
     *
     * @return void
     */
    private function init()
    {
        if (!empty($this->taxid)) {

            return;
        }

        $serial = mt_rand(1, 1000000000);
        $now = new DateTime();
        $this->taxid = $this->generateTaxId($serial, $now);
        $this->inno = str_pad(dechex($serial), 10, '0', STR_PAD_LEFT);
        $this->indatim = $now->getTimestamp() * 1000;
    }

    /**
     * Generate taxid
     *
     * @param string $serial
     * @param DateTime $now
     * @return string
     */
    private function generateTaxId(string $serial, DateTime $now): string
    {
        $verhoeffAlgorithm = new VerhoeffAlgorithm();
        $timeDayRange = (int)($now->getTimestamp() / (3600 * 24));
        $hexTime = dechex($timeDayRange);
        $hexSerial = dechex($serial);
        $initial = $this->memoryId . str_pad($hexTime, 5, '0', STR_PAD_LEFT) . str_pad($hexSerial, 10, '0', STR_PAD_LEFT);
        $controlText = $this->toDecimal() . str_pad($timeDayRange, 6, '0', STR_PAD_LEFT) . str_pad($serial, 12, '0', STR_PAD_LEFT);
        $result = $initial . $verhoeffAlgorithm->generateCheckDigit($controlText);
        return strtoupper($result);
    }

    /**
     * Convert to decimal
     *
     * @return string
     */
    private function toDecimal(): string
    {
        $decimalFormat = '';

        foreach (str_split($this->memoryId) as $ch) {

            if (ctype_digit($ch)) {
                $decimalFormat .= $ch;
                continue;
            }

            $decimalFormat .= ord($ch);
        }

        return $decimalFormat;
    }
}