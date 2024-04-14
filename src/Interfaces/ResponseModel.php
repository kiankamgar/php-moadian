<?php

namespace KianKamgar\MoadianPhp\Interfaces;

interface ResponseModel
{
    public function decodeResponse(array $response): ResponseModel;
}