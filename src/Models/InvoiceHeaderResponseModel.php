<?php

namespace KianKamgar\MoadianPhp\Models;

use DateTime;
use KianKamgar\MoadianPhp\Helpers\VerhoeffAlgorithm;

class InvoiceHeaderResponseModel
{
    public ?string $indati2m;
    public ?string $indatim;
    public ?int $inty;
    public ?int $ft;
    public string $inno;
    public string $irtaxid;
    public string $scln;
    public ?int $setm;
    public string $tins;
    public ?string $cap;
    public string $bid;
    public ?string $insp;
    public ?string $tvop;
    public string $bpc;
    public ?string $tax17;
    public string $taxid;
    public ?int $inp;
    public string $scc;
    public ?int $ins;
    public string $billid;
    public ?string $tprdis;
    public ?string $tdis;
    public ?string $tadis;
    public ?string $tvam;
    public ?string $todam;
    public ?string $tbill;
    public ?int $tob;
    public string $tinb;
    public string $sbc;
    public string $bbc;
    public string $bpn;
    public string $crn;
    public string $cdcn;
    public ?int $cdcd;
    public ?float $tonw;
    public ?string $torv;
    public ?float $tocv;
    public string $tinc;
    private string $memoryId;

    public function getIndati2m(): ?string
    {
        return $this->indati2m;
    }

    public function setIndati2m(DateTime $indati2m): InvoiceHeaderResponseModel
    {
        $this->indati2m = $this->getFormattedDate($indati2m);
        return $this;
    }

    public function getIndatim(): ?string
    {
        return $this->indatim;
    }

    public function getInty(): ?int
    {
        return $this->inty;
    }

    public function setInty(?int $invoiceType): InvoiceHeaderResponseModel
    {
        $this->inty = $invoiceType;
        return $this;
    }

    public function getFt(): ?int
    {
        return $this->ft;
    }

    public function setFt(?int $ft): InvoiceHeaderResponseModel
    {
        $this->ft = $ft;
        return $this;
    }

    public function getInno(): string
    {
        return $this->inno;
    }

    public function setInno(string $inno): InvoiceHeaderResponseModel
    {
        $this->inno = $inno;
        return $this;
    }

    public function getIrtaxid(): string
    {
        return $this->irtaxid;
    }

    public function setIrtaxid(string $irtaxid): InvoiceHeaderResponseModel
    {
        $this->irtaxid = $irtaxid;
        return $this;
    }

    public function getScln(): string
    {
        return $this->scln;
    }

    public function setScln(string $scln): InvoiceHeaderResponseModel
    {
        $this->scln = $scln;
        return $this;
    }

    public function getSetm(): ?int
    {
        return $this->setm;
    }

    public function setSetm(?int $setm): InvoiceHeaderResponseModel
    {
        $this->setm = $setm;
        return $this;
    }

    public function getTins(): string
    {
        return $this->tins;
    }

    public function setTins(string $tins): InvoiceHeaderResponseModel
    {
        $this->tins = $tins;
        return $this;
    }

    public function getCap(): ?string
    {
        return $this->cap;
    }

    public function setCap(?string $cap): InvoiceHeaderResponseModel
    {
        $this->cap = $cap;
        return $this;
    }

    public function getBid(): string
    {
        return $this->bid;
    }

    public function setBid(string $bid): InvoiceHeaderResponseModel
    {
        $this->bid = $bid;
        return $this;
    }

    public function getInsp(): ?string
    {
        return $this->insp;
    }

    public function setInsp(?string $insp): InvoiceHeaderResponseModel
    {
        $this->insp = $insp;
        return $this;
    }

    public function getTvop(): ?string
    {
        return $this->tvop;
    }

    public function setTvop(?string $tvop): InvoiceHeaderResponseModel
    {
        $this->tvop = $tvop;
        return $this;
    }

    public function getBpc(): string
    {
        return $this->bpc;
    }

    public function setBpc(string $bpc): InvoiceHeaderResponseModel
    {
        $this->bpc = $bpc;
        return $this;
    }

    public function getTax17(): ?string
    {
        return $this->tax17;
    }

    public function setTax17(?string $tax17): InvoiceHeaderResponseModel
    {
        $this->tax17 = $tax17;
        return $this;
    }

    public function getTaxid(): string
    {
        return $this->taxid;
    }

    public function setTaxid(string $taxid): InvoiceHeaderResponseModel
    {
        $this->taxid = $taxid;
        return $this;
    }

    public function getInp(): ?int
    {
        return $this->inp;
    }

    public function setInp(?int $inp): InvoiceHeaderResponseModel
    {
        $this->inp = $inp;
        return $this;
    }

    public function getScc(): string
    {
        return $this->scc;
    }

    public function setScc(string $scc): InvoiceHeaderResponseModel
    {
        $this->scc = $scc;
        return $this;
    }

    public function getIns(): ?int
    {
        return $this->ins;
    }

    public function setIns(?int $ins): InvoiceHeaderResponseModel
    {
        $this->ins = $ins;
        return $this;
    }

    public function getBillid(): string
    {
        return $this->billid;
    }

    public function setBillid(string $billid): InvoiceHeaderResponseModel
    {
        $this->billid = $billid;
        return $this;
    }

    public function getTprdis(): ?string
    {
        return $this->tprdis;
    }

    public function setTprdis(?string $tprdis): InvoiceHeaderResponseModel
    {
        $this->tprdis = $tprdis;
        return $this;
    }

    public function getTdis(): ?string
    {
        return $this->tdis;
    }

    public function setTdis(?string $tdis): InvoiceHeaderResponseModel
    {
        $this->tdis = $tdis;
        return $this;
    }

    public function getTadis(): ?string
    {
        return $this->tadis;
    }

    public function setTadis(?string $tadis): InvoiceHeaderResponseModel
    {
        $this->tadis = $tadis;
        return $this;
    }

    public function getTvam(): ?string
    {
        return $this->tvam;
    }

    public function setTvam(?string $tvam): InvoiceHeaderResponseModel
    {
        $this->tvam = $tvam;
        return $this;
    }

    public function getTodam(): ?string
    {
        return $this->todam;
    }

    public function setTodam(?string $todam): InvoiceHeaderResponseModel
    {
        $this->todam = $todam;
        return $this;
    }

    public function getTbill(): ?string
    {
        return $this->tbill;
    }

    public function setTbill(?string $tbill): InvoiceHeaderResponseModel
    {
        $this->tbill = $tbill;
        return $this;
    }

    public function getTob(): ?int
    {
        return $this->tob;
    }

    public function setTob(?int $tob): InvoiceHeaderResponseModel
    {
        $this->tob = $tob;
        return $this;
    }

    public function getTinb(): string
    {
        return $this->tinb;
    }

    public function setTinb(string $tinb): InvoiceHeaderResponseModel
    {
        $this->tinb = $tinb;
        return $this;
    }

    public function getSbc(): string
    {
        return $this->sbc;
    }

    public function setSbc(string $sbc): InvoiceHeaderResponseModel
    {
        $this->sbc = $sbc;
        return $this;
    }

    public function getBbc(): string
    {
        return $this->bbc;
    }

    public function setBbc(string $bbc): InvoiceHeaderResponseModel
    {
        $this->bbc = $bbc;
        return $this;
    }

    public function getBpn(): string
    {
        return $this->bpn;
    }

    public function setBpn(string $bpn): InvoiceHeaderResponseModel
    {
        $this->bpn = $bpn;
        return $this;
    }

    public function getCrn(): string
    {
        return $this->crn;
    }

    public function setCrn(string $crn): InvoiceHeaderResponseModel
    {
        $this->crn = $crn;
        return $this;
    }

    public function getCdcn(): string
    {
        return $this->cdcn;
    }

    public function setCdcn(string $cdcn): InvoiceHeaderResponseModel
    {
        $this->cdcn = $cdcn;
        return $this;
    }

    public function getCdcd(): ?int
    {
        return $this->cdcd;
    }

    public function setCdcd(?int $cdcd): InvoiceHeaderResponseModel
    {
        $this->cdcd = $cdcd;
        return $this;
    }

    public function getTonw(): ?float
    {
        return $this->tonw;
    }

    public function setTonw(?float $tonw): InvoiceHeaderResponseModel
    {
        $this->tonw = $tonw;
        return $this;
    }

    public function getTorv(): ?string
    {
        return $this->torv;
    }

    public function setTorv(?string $torv): InvoiceHeaderResponseModel
    {
        $this->torv = $torv;
        return $this;
    }

    public function getTocv(): ?float
    {
        return $this->tocv;
    }

    public function setTocv(?float $tocv): InvoiceHeaderResponseModel
    {
        $this->tocv = $tocv;
        return $this;
    }

    public function getTinc(): string
    {
        return $this->tinc;
    }

    public function setTinc(string $tinc): InvoiceHeaderResponseModel
    {
        $this->tinc = $tinc;
        return $this;
    }

    public function getMemoryId(): string
    {
        return $this->memoryId;
    }

    public function setMemoryId(string $memoryId): InvoiceHeaderResponseModel
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