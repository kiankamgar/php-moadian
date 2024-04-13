<?php

namespace KianKamgar\MoadianPhp;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Helpers\SignHelper;
use KianKamgar\MoadianPhp\Models\FiscalInformationModel;
use KianKamgar\MoadianPhp\Models\RandomChallengeModel;
use KianKamgar\MoadianPhp\Models\ServerInformationModel;
use KianKamgar\MoadianPhp\Services\FiscalInformation;
use KianKamgar\MoadianPhp\Services\RandomChallenge;
use KianKamgar\MoadianPhp\Services\ServerInformation;
use KianKamgar\MoadianPhp\Services\SignNonce;

class Moadian
{
    private string $privateKey;
    private string $certificate;

    /**
     * @throws Exception
     */
    public function __construct(
        private string $privateKeyPath,
        private string $certificatePath,
        private string $clientId,
        private string $economicCode,
    )
    {
        $this->privateKey = SignHelper::getPrivateKey($this->privateKeyPath);
        $this->certificate = SignHelper::getCertificate($this->certificatePath);
    }

    /**
     * @throws GuzzleException
     */
    public function getServerInformation(): ServerInformationModel
    {
        return (new ServerInformation())->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     */
    public function getFiscalInformation(): FiscalInformationModel
    {
        return (new FiscalInformation($this->clientId))->request($this->getToken());
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    private function getToken(): string
    {
        $randomChallenge = $this->getRandomChallenge();
        $signNonce = new SignNonce(
            $this->privateKey,
            $this->certificate,
            $randomChallenge->getNonce(),
            $this->clientId
        );

        return $signNonce->getToken();
    }

    /**
     * @throws GuzzleException
     */
    private function getRandomChallenge(): RandomChallengeModel
    {
        return (new RandomChallenge())->request();
    }
}