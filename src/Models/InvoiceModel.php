<?php

namespace KianKamgar\MoadianPhp\Models;

use KianKamgar\MoadianPhp\Interfaces\ModelInterface;

class InvoiceModel implements ModelInterface
{
    private InvoiceHeaderModel $header;
    private array $body;
    private array $payments;
    private array $extension;
}