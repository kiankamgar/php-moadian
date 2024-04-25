<?php

namespace KianKamgar\MoadianPhp\Helpers;

use DateTime;

class InquiryHelper
{
    /**
     * Get formatted date for inquiry requests
     *
     * @param DateTime $date
     * @return string
     */
    public static function getFormattedDate(Datetime $date): string
    {
        return $date->format('Y-m-d\TH:i:s.uP');
    }
}