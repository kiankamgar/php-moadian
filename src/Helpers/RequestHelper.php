<?php

namespace KianKamgar\MoadianPhp\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Interfaces\ResponseModelInterface;
use Psr\Http\Message\ResponseInterface;

class RequestHelper
{
    private string $url;
    private string $model;
    private ?string $token = null;
    private Client $client;
    private bool $arrayResponse = false;

    public function __construct(string $url, string $model)
    {
        $this->url = $url;
        $this->model = $model;
        $this->init();
    }

    /**
     * @throws GuzzleException
     */
    public function get(array|string $requestParams = []): ResponseModelInterface|array
    {
        $response = $this->client->request('GET', $this->url, [
            'query'   => $requestParams,
            'headers' => $this->getAuthorizationHeader()
        ]);

        return $this->getResponse($response);
    }

    /**
     * @throws GuzzleException
     */
    public function post(array $body = []): ResponseModelInterface|array
    {
        $response = $this->client->request('POST', $this->url, [
            'headers' => $this->getAuthorizationHeader(),
            'body'    => json_encode($body),
        ]);

        return $this->getResponse($response);
    }

    public function setToken(?string $token): RequestHelper
    {
        $this->token = $token;
        return $this;
    }

    public function arrayResponse(bool $arrayResponse): RequestHelper
    {
        $this->arrayResponse = $arrayResponse;
        return $this;
    }

    private function getResponse(ResponseInterface $response): ResponseModelInterface|array
    {
        $arrayResponse = json_decode($response->getBody()->getContents(), true);

        if (!$this->isOk($response)) {

            return $this->arrayResponse ? $arrayResponse : (new $this->model());
        }

        return $this->arrayResponse
            ? $arrayResponse
            : $this->getModelResponse($arrayResponse);
    }

    private function isOk(ResponseInterface $response): bool
    {
        return !($response->getStatusCode() < 200 || $response->getStatusCode() >= 300);
    }

    private function getModelResponse(array $responseArray): ResponseModelInterface
    {
        return (new $this->model())->decodeResponse($responseArray);
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

        return [
            'Accept'        => '*/*',
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . $this->token
        ];
    }
}