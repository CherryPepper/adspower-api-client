<?php

namespace CherryPepper\AdsPower\Services;

use CherryPepper\AdsPower\DTO\Extension\ExtensionListParameters;
use CherryPepper\AdsPower\DTO\Extension\ExtensionListResponse;

class Extensions extends BaseService
{
    /**
     * Get the list of extensions
     * @param ExtensionListParameters $params
     * @return ExtensionListResponse
     * @throws
     */
    public function list(ExtensionListParameters $params): ExtensionListResponse
    {
        $response = $this->sendRequest('GET', '/api/v1/application/list', [
            'query' => $params->toArray(),
        ]);

        return new ExtensionListResponse($response);
    }
}
