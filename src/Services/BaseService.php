<?php

namespace CherryPepper\AdsPower\Services;

use CherryPepper\AdsPower\AdsPowerClient;
use CherryPepper\AdsPower\Exceptions\AdsPowerException;
use CherryPepper\AdsPower\Response;
use GuzzleHttp\ClientInterface;
use CherryPepper\AdsPower\Config\AdsPowerConfig;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;

/**
 * Class BaseService
 *
 * The base service class that provides common functionality for all service classes.
 *
 * @package CherryPepper\AdsPower\Services
 */
abstract class BaseService
{
    protected ClientInterface $httpClient;
    protected AdsPowerConfig $config;

    /**
     * BaseService constructor.
     *
     * @param ClientInterface $client
     * @param AdsPowerConfig  $config
     */
    public function __construct(ClientInterface $client, AdsPowerConfig $config)
    {
        $this->httpClient = $client;
        $this->config = $config;
    }

    /**
     * Check service availability.
     *
     * @return Response The response from the status endpoint.
     * @throws AdsPowerException|JsonException|GuzzleException
     */
    public function getStatus(): Response
    {
        return $this->sendRequest('GET', '/status');
    }

    /**
     * Send a request to the AdsPower API with rate limiting and error handling.
     *
     * @param string $method  HTTP method (GET, POST, etc.)
     * @param string $uri     API endpoint URI
     * @param array  $options Guzzle HTTP client options
     *
     * @return Response Decoded JSON response from the API
     * @throws AdsPowerException|JsonException|GuzzleException
     */
    protected function sendRequest(string $method, string $uri, array $options = []): Response
    {
        return new Response(
            (new AdsPowerClient($this->httpClient, $this->config))
                ->sendRequest($method, $uri, $options)
        );
    }
}
