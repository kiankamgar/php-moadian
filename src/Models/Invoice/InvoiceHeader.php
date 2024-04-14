<?php

namespace KianKamgar\MoadianPhp\Models\Invoice;

use DateTime;
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

    public function setIndati2m(?int $indati2m): InvoiceHeader
    {
        $this->indati2m = $indati2m;
        return $this;
    }

    public function setInty(?int $inty): InvoiceHeader
    {
        $this->inty = $inty;
        return $this;
    }

    public function setFt(?int $ft): InvoiceHeader
    {
        $this->ft = $ft;
        return $this;
    }

    public function setIrtaxid(string $irtaxid): InvoiceHeader
    {
        $this->irtaxid = $irtaxid;
        return $this;
    }

    public function setScln(string $scln): InvoiceHeader
    {
        $this->scln = $scln;
        return $this;
    }

    public function setSetm(?int $setm): InvoiceHeader
    {
        $this->setm = $setm;
        return $this;
    }

    public function setTins(string $tins): InvoiceHeader
    {
        $this->tins = $tins;
        return $this;
    }

    public function setCap(?int $cap): InvoiceHeader
    {
        $this->cap = $cap;
        return $this;
    }

    public function setBid(string $bid): InvoiceHeader
    {
        $this->bid = $bid;
        return $this;
    }

    public function setInsp(?int $insp): InvoiceHeader
    {
        $this->insp = $insp;
        return $this;
    }

    public function setTvop(?int $tvop): InvoiceHeader
    {
        $this->tvop = $tvop;
        return $this;
    }

    public function setBpc(string $bpc): InvoiceHeader
    {
        $this->bpc = $bpc;
        return $this;
    }

    public function setTax17(?int $tax17): InvoiceHeader
    {
        $this->tax17 = $tax17;
        return $this;
    }

    public function setInp(?int $inp): InvoiceHeader
    {
        $this->inp = $inp;
        return $this;
    }

    public function setScc(string $scc): InvoiceHeader
    {
        $this->scc = $scc;
        return $this;
    }

    public function setIns(?int $ins): InvoiceHeader
    {
        $this->ins = $ins;
        return $this;
    }

    public function setBillid(string $billid): InvoiceHeader
    {
        $this->billid = $billid;
        return $this;
    }

    public function setTprdis(?int $tprdis): InvoiceHeader
    {
        $this->tprdis = $tprdis;
        return $this;
    }

    public function setTdis(?int $tdis): InvoiceHeader
    {
        $this->tdis = $tdis;
        return $this;
    }

    public function setTadis(?int $tadis): InvoiceHeader
    {
        $this->tadis = $tadis;
        return $this;
    }

    public function setTvam(?int $tvam): InvoiceHeader
    {
        $this->tvam = $tvam;
        return $this;
    }

    public function setTodam(?int $todam): InvoiceHeader
    {
        $this->todam = $todam;
        return $this;
    }

    public function setTbill(?int $tbill): InvoiceHeader
    {
        $this->tbill = $tbill;
        return $this;
    }

    public function setTob(?int $tob): InvoiceHeader
    {
        $this->tob = $tob;
        return $this;
    }

    public function setTinb(string $tinb): InvoiceHeader
    {
        $this->tinb = $tinb;
        return $this;
    }

    public function setSbc(string $sbc): InvoiceHeader
    {
        $this->sbc = $sbc;
        return $this;
    }

    public function setBbc(string $bbc): InvoiceHeader
    {
        $this->bbc = $bbc;
        return $this;
    }

    public function setBpn(string $bpn): InvoiceHeader
    {
        $this->bpn = $bpn;
        return $this;
    }

    public function setCrn(string $crn): InvoiceHeader
    {
        $this->crn = $crn;
        return $this;
    }

    public function setCdcn(string $cdcn): InvoiceHeader
    {
        $this->cdcn = $cdcn;
        return $this;
    }

    public function setCdcd(?int $cdcd): InvoiceHeader
    {
        $this->cdcd = $cdcd;
        return $this;
    }

    public function setTonw(?float $tonw): InvoiceHeader
    {
        $this->tonw = $tonw;
        return $this;
    }

    public function setTorv(?int $torv): InvoiceHeader
    {
        $this->torv = $torv;
        return $this;
    }

    public function setTocv(?float $tocv): InvoiceHeader
    {
        $this->tocv = $tocv;
        return $this;
    }

    public function setTinc(string $tinc): InvoiceHeader
    {
        $this->tinc = $tinc;
        return $this;
    }

    public function setMemoryId(string $memoryId): InvoiceHeader
    {
        $this->memoryId = $memoryId;
        return $this;
    }

    public function build(): array
    {
        $this->init();
        $objects = get_object_vars($this);
        unset($objects['memoryId']);

        return $objects;
    }

    private function init()
    {
        $serial = mt_rand(1, 1000000000);
        $now = new DateTime();
        $this->taxid = $this->generateTaxId($serial, $now);
        $this->inno = str_pad(dechex($serial), 10, '0', STR_PAD_LEFT);
        $this->indatim = $now->getTimestamp() * 1000;
    }

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