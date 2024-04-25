<?php

namespace KianKamgar\MoadianPhp\Services;

use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Consts\Url;
use KianKamgar\MoadianPhp\Helpers\RequestHelper;
use KianKamgar\MoadianPhp\Models\RandomChallengeResponse;

class RandomChallenge extends Url
{
    private int $timeToLive = 30;
    private RequestHelper $requestHelper;

    /**
     * Init class
     */
    public function __construct()
    {
        $this->requestHelper = new RequestHelper(
            self::RANDOM_CHALLENGE_URL,
            RandomChallengeResponse::class
        );
    }

    /**
     * Make request
     *
     * @return RandomChallengeResponse|array
     * @throws GuzzleException
     */
    public function request(): RandomChallengeResponse|array
    {
        return $this->requestHelper->get(['timeToLive' => $this->timeToLive]);
    }

    /**
     * Determine whether you want to get the result in array form
     * (otherwise the request will return a model)
     *
     * @param bool $arrayResponse
     * @return $this
     */
    public function arrayResponse(bool $arrayResponse): RandomChallenge
    {
        $this->requestHelper->arrayResponse($arrayResponse);
        return $this;
    }

    /**
     * Set time to live
     *
     * @param int $timeToLive
     * @return $this
     */
    public function setTimeToLive(int $timeToLive): RandomChallenge
    {
        $this->timeToLive = $timeToLive;
        return $this;
    }
}