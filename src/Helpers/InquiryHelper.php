<?php

namespace KianKamgar\MoadianPhp\Helpers;

use DateTime;

class InquiryHelper
{
    public static function getFormattedDate(Datetime $date): string
    {
        return $date->format('Y-m-d\TH:i:s.uP');
    }
}