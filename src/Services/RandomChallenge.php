<?php

namespace KianKamgar\MoadianPhp\Services;

use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\RandomChallengeResponseModel;

class RandomChallenge extends Url
{
    private int $timeToLive = 30;
    private RequestHelper $requestHelper;

    public function __construct()
    {
        $this->requestHelper = new RequestHelper(
            self::RANDOM_CHALLENGE_URL,
            RandomChallengeResponseModel::class
        );
    }

    /**
     * @throws GuzzleException
     */
    public function request(): RandomChallengeResponseModel|array
    {
        return $this->requestHelper->get(['timeToLive' => $this->timeToLive]);
    }

    public function arrayResponse(bool $arrayResponse): RandomChallenge
    {
        $this->requestHelper->arrayResponse($arrayResponse);
        return $this;
    }

    public function setTimeToLive(int $timeToLive): RandomChallenge
    {
        $this->timeToLive = $timeToLive;
        return $this;
    }
}