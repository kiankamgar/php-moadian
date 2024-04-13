<?php

namespace KianKamgar\MoadianPhp\Services;

use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\RandomChallengeResponse;

class RandomChallenge extends Url
{
    private int $timeToLive = 30;

    public function setTimeToLive(int $timeToLive): RandomChallenge
    {
        $this->timeToLive = $timeToLive;
        return $this;
    }

    /**
     * @throws GuzzleException
     */
    public function request(): RandomChallengeResponse
    {
        return (new RequestHelper(self::RANDOM_CHALLENGE_URL, RandomChallengeResponse::class))
            ->get(['timeToLive' => $this->timeToLive]);
    }
}