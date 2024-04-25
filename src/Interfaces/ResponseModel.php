<?php

namespace KianKamgar\MoadianPhp\Interfaces;

interface ResponseModel
{
    /**
     * Decode response
     *
     * @param array $response
     * @return ResponseModel
     */
    public function decodeResponse(array $response): ResponseModel;
}