<?php

namespace KianKamgar\MoadianPhp\Consts;

class Url
{
    private const BASE_URL = 'https://tp.tax.gov.ir/requestsmanager/api/v2/';
    protected const RANDOM_CHALLENGE_URL = self::BASE_URL . 'nonce';
    protected const SERVER_INFORMATION_URL = self::BASE_URL . 'server-information';
    protected const FISCAL_INFORMATION_URL = self::BASE_URL . 'fiscal-information';
}