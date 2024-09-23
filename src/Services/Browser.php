<?php

namespace CherryPepper\AdsPower\Services;

use CherryPepper\AdsPower\DTO\Browser\BrowserStartParameters;
use CherryPepper\AdsPower\DTO\Browser\BrowserStartResponse;
use CherryPepper\AdsPower\DTO\Browser\BrowserActiveResponse;
use CherryPepper\AdsPower\DTO\StatusResponse;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class Browser extends BaseService
{
    /**
     * Start the browser
     * @param BrowserStartParameters $params
     * @return BrowserStartResponse
     * @throws Exception|GuzzleException
     */
    public function start(BrowserStartParameters $params): BrowserStartResponse
    {
        $response = $this->sendRequest('GET', '/api/v1/browser/start', [
            'query' => $params->toArray(),
        ]);

        return new BrowserStartResponse($response);
    }

    /**
     * Stop the browser
     * @param string      $user_id
     * @param string|null $serial_number
     * @return StatusResponse
     * @throws Exception|GuzzleException
     */
    public function stop(string $user_id, ?string $serial_number = null): StatusResponse
    {
        $query = ['user_id' => $user_id];
        if ($serial_number !== null) {
            $query['serial_number'] = $serial_number;
        }

        $response = $this->sendRequest('GET', '/api/v1/browser/stop', [
            'query' => $query,
        ]);

        return new StatusResponse($response);
    }

    /**
     * Get browser active status
     * @param string      $user_id
     * @param string|null $serial_number
     * @return BrowserActiveResponse
     * @throws Exception|GuzzleException
     */
    public function active(string $user_id, ?string $serial_number = null): BrowserActiveResponse
    {
        $query = ['user_id' => $user_id];
        if ($serial_number !== null) {
            $query['serial_number'] = $serial_number;
        }

        $response = $this->sendRequest('GET', '/api/v1/browser/active', [
            'query' => $query,
        ]);

        return new BrowserActiveResponse($response);
    }
}
