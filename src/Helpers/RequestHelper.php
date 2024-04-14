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
    private bool $jsonResponse = false;

    public function __construct(string $url, string $model)
    {
        $this->url = $url;
        $this->model = $model;
        $this->init();
    }

    /**
     * @throws GuzzleException
     */
    public function get(array|string $requestParams = []): ModelInterface|string
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
    public function post(array $body = []): ModelInterface|string
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

    public function jsonResponse(bool $jsonResponse): RequestHelper
    {
        $this->jsonResponse = $jsonResponse;
        return $this;
    }

    private function getResponse(ResponseInterface $response): ModelInterface|string
    {
        $content = $response->getBody()->getContents();

        if (!$this->isOk($response)) {

            return $this->jsonResponse ? $content : (new $this->model());
        }

        return $this->jsonResponse
            ? $content
            : $this->getDecodedResponseArray($content);
    }

    private function isOk(ResponseInterface $response): bool
    {
        return !($response->getStatusCode() < 200 || $response->getStatusCode() >= 300);
    }

    private function getDecodedResponseArray(string $responseJson): ModelInterface
    {
        $responseArray = json_decode($responseJson, true);
        $model = new $this->model();

        foreach ($responseArray as $key => $value) {

            $method = 'set' . ucfirst($key);

            if (!method_exists($model, $method)) {

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

        return [
            'Accept'        => '*/*',
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . $this->token
        ];
    }
}