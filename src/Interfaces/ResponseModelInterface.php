<?php

namespace KianKamgar\MoadianPhp\Interfaces;

interface ResponseModelInterface
{
    public function decodeResponse(array $response): ResponseModelInterface;
}