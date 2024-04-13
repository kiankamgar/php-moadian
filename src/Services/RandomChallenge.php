<?php

namespace KianKamgar\MoadianPhp\Services;

use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\RandomChallengeModel;

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
    public function request(): RandomChallengeModel
    {
        return (new RequestHelper(self::RANDOM_CHALLENGE_URL, RandomChallengeModel::class))
            ->get(['timeToLive' => $this->timeToLive]);
    }
}