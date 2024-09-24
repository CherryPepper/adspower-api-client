<?php

namespace CherryPepper\AdsPower\Services;

use CherryPepper\AdsPower\DTO\Browser\BrowserStartParameters;
use CherryPepper\AdsPower\Response;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class Browser extends BaseService
{
    /**
     * Start the browser
     * @param BrowserStartParameters $params
     * @return Response
     * @throws Exception|GuzzleException
     */
    public function start(BrowserStartParameters $params): Response
    {
        return $this->sendRequest('GET', '/api/v1/browser/start', [
            'query' => $params->toArray(),
        ]);
    }

    /**
     * Stop the browser
     * @param string      $user_id
     * @param string|null $serial_number
     * @return Response
     * @throws Exception|GuzzleException
     */
    public function stop(string $user_id, ?string $serial_number = null): Response
    {
        $query = ['user_id' => $user_id];
        if ($serial_number !== null) {
            $query['serial_number'] = $serial_number;
        }

        return $this->sendRequest('GET', '/api/v1/browser/stop', [
            'query' => $query,
        ]);
    }

    /**
     * Get browser active status
     * @param string      $user_id
     * @param string|null $serial_number
     * @return Response
     * @throws Exception|GuzzleException
     */
    public function active(string $user_id, ?string $serial_number = null): Response
    {
        $query = ['user_id' => $user_id];
        if ($serial_number !== null) {
            $query['serial_number'] = $serial_number;
        }

        return $this->sendRequest('GET', '/api/v1/browser/active', [
            'query' => $query,
        ]);
    }
}
