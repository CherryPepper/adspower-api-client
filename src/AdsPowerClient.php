<?php

namespace CherryPepper\AdsPower;

use GuzzleHttp\ClientInterface;
use CherryPepper\AdsPower\Services\Browser;
use CherryPepper\AdsPower\Services\Groups;
use CherryPepper\AdsPower\Services\Extensions;
use CherryPepper\AdsPower\Services\Profiles;
use CherryPepper\AdsPower\Config\AdsPowerConfig;
use CherryPepper\AdsPower\Exceptions\AdsPowerException;
use CherryPepper\AdsPower\Exceptions\AdsPowerApiException;
use CherryPepper\AdsPower\Exceptions\AdsPowerNetworkException;
use CherryPepper\AdsPower\Exceptions\TooManyRequestsException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use JsonException;

/**
 * Class AdsPowerClient
 *
 * The main client class for interacting with the AdsPower API.
 *
 * @package CherryPepper\AdsPower
 */
class AdsPowerClient
{
    /** @var ClientInterface  */
    private ClientInterface $httpClient;

    /** @var AdsPowerConfig  */
    private AdsPowerConfig $config;

    /**
     * @var Browser The service for browser-related API calls.
     */
    public Browser $browser;

    /**
     * @var Groups The service for group-related API calls.
     */
    public Groups $groups;

    /**
     * @var Extensions The service for extensions-related API calls.
     */
    public Extensions $extensions;

    /**
     * @var Profiles The service for profile-related API calls.
     */
    public Profiles $profiles;

    /**
     * AdsPowerClient constructor.
     *
     * @param ClientInterface $httpClient The HTTP client to use for API calls.
     * @param AdsPowerConfig  $config     Configuration settings for the client.
     */
    public function __construct(ClientInterface $httpClient, AdsPowerConfig $config)
    {
        $this->httpClient = $httpClient;
        $this->config = $config;


        $this->browser = new Browser($this->httpClient, $this->config);
        $this->groups = new Groups($this->httpClient, $this->config);
        $this->extensions = new Extensions($this->httpClient, $this->config);
        $this->profiles = new Profiles($this->httpClient, $this->config);
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
    public function sendRequest(string $method, string $uri, array $options = []): array
    {
        $attempts = 0;
        $maxAttempts = $this->config->getRetryAttempts();
        $sleepDuration = $this->config->getSleepDuration();

        $options['base_uri'] = $this->config->getBaseUri();

        do {
            try {
                $response = $this->httpClient->request($method, $uri, $options);
                $responseBody = $response->getBody()->getContents();

                $data = json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);

                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new AdsPowerApiException(
                        'Invalid JSON response: ' . json_last_error_msg(),
                        $response->getStatusCode(),
                        []
                    );
                }

                if (isset($data['code']) && $data['code'] !== 0) {
                    $errorCode = $data['code'];
                    $errorMessage = $data['msg'] ?? 'Unknown error';
                    $errorData = $data['data'] ?? [];

                    switch ($errorCode) {
                        case -1:
                            if ($errorMessage === 'Too many request per second, please check') {
                                sleep($sleepDuration);
                                $attempts++;
                                continue 2;
                            }

                            throw new TooManyRequestsException($errorMessage, $errorCode, $errorData);
                        case 404:
                            throw new AdsPowerApiException('Not Found: ' . $errorMessage, 404, $errorData);
                        default:
                            throw new AdsPowerApiException($errorMessage, $errorCode, $errorData);
                    }
                }

                return $data;
            } catch (RequestException $e) {
                throw new AdsPowerNetworkException('HTTP Request failed: ' . $e->getMessage(), $e->getCode());
            }
        } while ($attempts < $maxAttempts);

        throw new AdsPowerException('Exceeded the number of request attempts.');
    }
}
