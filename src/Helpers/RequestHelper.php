<?php

namespace KianKamgar\MoadianPhp\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Interfaces\ModelInterface;
use Psr\Http\Message\ResponseInterface;

class RequestHelper
{
    private string $url;
    private string $model;
    private ?string $token = null;
    private Client $client;
    private ResponseInterface $response;

    public function __construct(string $url, string $model)
    {
        $this->url = $url;
        $this->model = $model;
        $this->init();
    }

    /**
     * @throws GuzzleException
     */
    public function get(array $requestParams = []): ModelInterface
    {
        $this->response = $this->client->request('GET', $this->url, [
            'query'   => $requestParams,
            'headers' => $this->getAuthorizationHeader()
        ]);

        if (!$this->isOk()) {

            return (new $this->model());
        }

        return $this->getDecodedResponseArray();
    }

    public function setToken(?string $token): RequestHelper
    {
        $this->token = $token;
        return $this;
    }

    public function isOk(): bool
    {
        return !($this->response->getStatusCode() < 200 || $this->response->getStatusCode() >= 300);
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function getDecodedResponseArray(): ModelInterface
    {
        $responseArray = json_decode($this->getResponse()->getBody()->getContents(), true);
        $model = new $this->model();

        foreach ($responseArray as $key => $value) {

            $method = 'set' . ucfirst($key);

            if (! method_exists($model, $method)) {

                continue;
            }

            $model->$method($value);
        }

        return $model;
    }

    private function init(): void
    {
        $this->client = new Client();
    }

    private function getAuthorizationHeader(): array
    {
        if (empty($this->token)) {

            return [];
        }

        return ['Authorization' => 'Bearer ' . $this->token];
    }
}