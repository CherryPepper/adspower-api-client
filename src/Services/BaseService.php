<?php

namespace CherryPepper\AdsPower\Services;

use CherryPepper\AdsPower\AdsPowerClient;
use CherryPepper\AdsPower\Exceptions\AdsPowerException;
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
     * Send a request to the AdsPower API with rate limiting and error handling.
     *
     * @param string $method  HTTP method (GET, POST, etc.)
     * @param string $uri     API endpoint URI
     * @param array  $options Guzzle HTTP client options
     *
     * @return array Decoded JSON response from the API
     * @throws AdsPowerException|JsonException|GuzzleException
     */
    protected function sendRequest(string $method, string $uri, array $options = []): array
    {
        return (new AdsPowerClient($this->httpClient, $this->config))->sendRequest(
            $method, $uri, $options
        );
    }
}
