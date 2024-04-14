<?php

namespace KianKamgar\MoadianPhp\Models\Invoice;

use DateTime;
use KianKamgar\MoadianPhp\Helpers\VerhoeffAlgorithm;

class InvoiceHeader
{
    public ?int $indati2m;
    public ?int $indatim;
    public ?int $inty;
    public ?int $ft;
    public string $inno;
    public string $irtaxid;
    public string $scln;
    public ?int $setm;
    public string $tins;
    public ?int $cap;
    public string $bid;
    public ?int $insp;
    public ?int $tvop;
    public string $bpc;
    public ?int $tax17;
    public string $taxid;
    public ?int $inp;
    public string $scc;
    public ?int $ins;
    public string $billid;
    public ?int $tprdis;
    public ?int $tdis;
    public ?int $tadis;
    public ?int $tvam;
    public ?int $todam;
    public ?int $tbill;
    public ?int $tob;
    public string $tinb;
    public string $sbc;
    public string $bbc;
    public string $bpn;
    public string $crn;
    public string $cdcn;
    public ?int $cdcd;
    public ?float $tonw;
    public ?int $torv;
    public ?float $tocv;
    public string $tinc;
    private string $memoryId;

    public function getIndati2m(): ?int
    {
        return $this->indati2m;
    }

    public function setIndati2m(?int $indati2m): InvoiceHeader
    {
        $this->indati2m = $indati2m;
        return $this;
    }

    public function getIndatim(): ?int
    {
        return $this->indatim;
    }

    public function getInty(): ?int
    {
        return $this->inty;
    }

    public function setInty(?int $inty): InvoiceHeader
    {
        $this->inty = $inty;
        return $this;
    }

    public function getFt(): ?int
    {
        return $this->ft;
    }

    public function setFt(?int $ft): InvoiceHeader
    {
        $this->ft = $ft;
        return $this;
    }

    public function getInno(): string
    {
        return $this->inno;
    }

    public function getIrtaxid(): string
    {
        return $this->irtaxid;
    }

    public function setIrtaxid(string $irtaxid): InvoiceHeader
    {
        $this->irtaxid = $irtaxid;
        return $this;
    }

    public function getScln(): string
    {
        return $this->scln;
    }

    public function setScln(string $scln): InvoiceHeader
    {
        $this->scln = $scln;
        return $this;
    }

    public function getSetm(): ?int
    {
        return $this->setm;
    }

    public function setSetm(?int $setm): InvoiceHeader
    {
        $this->setm = $setm;
        return $this;
    }

    public function getTins(): string
    {
        return $this->tins;
    }

    public function setTins(string $tins): InvoiceHeader
    {
        $this->tins = $tins;
        return $this;
    }

    public function getCap(): ?int
    {
        return $this->cap;
    }

    public function setCap(?int $cap): InvoiceHeader
    {
        $this->cap = $cap;
        return $this;
    }

    public function getBid(): string
    {
        return $this->bid;
    }

    public function setBid(string $bid): InvoiceHeader
    {
        $this->bid = $bid;
        return $this;
    }

    public function getInsp(): ?int
    {
        return $this->insp;
    }

    public function setInsp(?int $insp): InvoiceHeader
    {
        $this->insp = $insp;
        return $this;
    }

    public function getTvop(): ?int
    {
        return $this->tvop;
    }

    public function setTvop(?int $tvop): InvoiceHeader
    {
        $this->tvop = $tvop;
        return $this;
    }

    public function getBpc(): string
    {
        return $this->bpc;
    }

    public function setBpc(string $bpc): InvoiceHeader
    {
        $this->bpc = $bpc;
        return $this;
    }

    public function getTax17(): ?int
    {
        return $this->tax17;
    }

    public function setTax17(?int $tax17): InvoiceHeader
    {
        $this->tax17 = $tax17;
        return $this;
    }

    public function getTaxid(): string
    {
        return $this->taxid;
    }

    public function getInp(): ?int
    {
        return $this->inp;
    }

    public function setInp(?int $inp): InvoiceHeader
    {
        $this->inp = $inp;
        return $this;
    }

    public function getScc(): string
    {
        return $this->scc;
    }

    public function setScc(string $scc): InvoiceHeader
    {
        $this->scc = $scc;
        return $this;
    }

    public function getIns(): ?int
    {
        return $this->ins;
    }

    public function setIns(?int $ins): InvoiceHeader
    {
        $this->ins = $ins;
        return $this;
    }

    public function getBillid(): string
    {
        return $this->billid;
    }

    public function setBillid(string $billid): InvoiceHeader
    {
        $this->billid = $billid;
        return $this;
    }

    public function getTprdis(): ?int
    {
        return $this->tprdis;
    }

    public function setTprdis(?int $tprdis): InvoiceHeader
    {
        $this->tprdis = $tprdis;
        return $this;
    }

    public function getTdis(): ?int
    {
        return $this->tdis;
    }

    public function setTdis(?int $tdis): InvoiceHeader
    {
        $this->tdis = $tdis;
        return $this;
    }

    public function getTadis(): ?int
    {
        return $this->tadis;
    }

    public function setTadis(?int $tadis): InvoiceHeader
    {
        $this->tadis = $tadis;
        return $this;
    }

    public function getTvam(): ?int
    {
        return $this->tvam;
    }

    public function setTvam(?int $tvam): InvoiceHeader
    {
        $this->tvam = $tvam;
        return $this;
    }

    public function getTodam(): ?int
    {
        return $this->todam;
    }

    public function setTodam(?int $todam): InvoiceHeader
    {
        $this->todam = $todam;
        return $this;
    }

    public function getTbill(): ?int
    {
        return $this->tbill;
    }

    public function setTbill(?int $tbill): InvoiceHeader
    {
        $this->tbill = $tbill;
        return $this;
    }

    public function getTob(): ?int
    {
        return $this->tob;
    }

    public function setTob(?int $tob): InvoiceHeader
    {
        $this->tob = $tob;
        return $this;
    }

    public function getTinb(): string
    {
        return $this->tinb;
    }

    public function setTinb(string $tinb): InvoiceHeader
    {
        $this->tinb = $tinb;
        return $this;
    }

    public function getSbc(): string
    {
        return $this->sbc;
    }

    public function setSbc(string $sbc): InvoiceHeader
    {
        $this->sbc = $sbc;
        return $this;
    }

    public function getBbc(): string
    {
        return $this->bbc;
    }

    public function setBbc(string $bbc): InvoiceHeader
    {
        $this->bbc = $bbc;
        return $this;
    }

    public function getBpn(): string
    {
        return $this->bpn;
    }

    public function setBpn(string $bpn): InvoiceHeader
    {
        $this->bpn = $bpn;
        return $this;
    }

    public function getCrn(): string
    {
        return $this->crn;
    }

    public function setCrn(string $crn): InvoiceHeader
    {
        $this->crn = $crn;
        return $this;
    }

    public function getCdcn(): string
    {
        return $this->cdcn;
    }

    public function setCdcn(string $cdcn): InvoiceHeader
    {
        $this->cdcn = $cdcn;
        return $this;
    }

    public function getCdcd(): ?int
    {
        return $this->cdcd;
    }

    public function setCdcd(?int $cdcd): InvoiceHeader
    {
        $this->cdcd = $cdcd;
        return $this;
    }

    public function getTonw(): ?float
    {
        return $this->tonw;
    }

    public function setTonw(?float $tonw): InvoiceHeader
    {
        $this->tonw = $tonw;
        return $this;
    }

    public function getTorv(): ?int
    {
        return $this->torv;
    }

    public function setTorv(?int $torv): InvoiceHeader
    {
        $this->torv = $torv;
        return $this;
    }

    public function getTocv(): ?float
    {
        return $this->tocv;
    }

    public function setTocv(?float $tocv): InvoiceHeader
    {
        $this->tocv = $tocv;
        return $this;
    }

    public function getTinc(): string
    {
        return $this->tinc;
    }

    public function setTinc(string $tinc): InvoiceHeader
    {
        $this->tinc = $tinc;
        return $this;
    }

    public function getMemoryId(): string
    {
        return $this->memoryId;
    }

    public function setMemoryId(string $memoryId): InvoiceHeader
    {
        $this->memoryId = $memoryId;
        return $this;
    }

    public function getHeader(): array
    {
        $this->init();

        return get_object_vars($this);
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

    private function getFormattedDate(DateTime $dateTime): string
    {
        return $dateTime->getTimestamp() * 1000;
    }
}