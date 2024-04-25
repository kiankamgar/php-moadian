<?php

namespace KianKamgar\MoadianPhp\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use KianKamgar\MoadianPhp\Interfaces\ResponseModel;
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
     * Make a get request
     *
     * @param array|string $requestParams
     * @return ResponseModel|array
     * @throws GuzzleException
     */
    public function get(array|string $requestParams = []): ResponseModel|array
    {
        $response = $this->client->request('GET', $this->url, [
            'query'   => $requestParams,
            'headers' => $this->getAuthorizationHeader()
        ]);

        return $this->getResponse($response);
    }

    /**
     * Make a post request
     *
     * @param array $body
     * @return ResponseModel|array
     * @throws GuzzleException
     */
    public function post(array $body = []): ResponseModel|array
    {
        $response = $this->client->request('POST', $this->url, [
            'headers' => $this->getAuthorizationHeader(),
            'body'    => json_encode($body),
        ]);

        return $this->getResponse($response);
    }

    /**
     * Set token
     *
     * @param string|null $token
     * @return $this
     */
    public function setToken(?string $token): RequestHelper
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Determine whether you want to get the result in array form
     * (otherwise the request will return a model)
     *
     * @param bool $arrayResponse
     * @return $this
     */
    public function arrayResponse(bool $arrayResponse): RequestHelper
    {
        $this->arrayResponse = $arrayResponse;
        return $this;
    }

    /**
     * Get response
     *
     * @param ResponseInterface $response
     * @return ResponseModel|array
     */
    private function getResponse(ResponseInterface $response): ResponseModel|array
    {
        $arrayResponse = json_decode($response->getBody()->getContents(), true);

        if (!$this->isOk($response)) {

            return $this->arrayResponse ? $arrayResponse : (new $this->model());
        }

        return $this->arrayResponse
            ? $arrayResponse
            : $this->getModelResponse($arrayResponse);
    }

    /**
     * Whether the response status is ok or not
     *
     * @param ResponseInterface $response
     * @return bool
     */
    private function isOk(ResponseInterface $response): bool
    {
        return !($response->getStatusCode() < 200 || $response->getStatusCode() >= 300);
    }

    /**
     * Get model response
     *
     * @param array $responseArray
     * @return ResponseModel
     */
    private function getModelResponse(array $responseArray): ResponseModel
    {
        return (new $this->model())->decodeResponse($responseArray);
    }

    /**
     * Init the request client
     *
     * @return void
     */
    private function init(): void
    {
        $this->client = new Client();
    }

    /**
     * Get authorization header
     *
     * @return array
     */
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