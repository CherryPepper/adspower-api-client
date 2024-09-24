<?php

namespace CherryPepper\AdsPower\Services;

use CherryPepper\AdsPower\DTO\Extension\ExtensionListParameters;
use CherryPepper\AdsPower\Response;

class Extensions extends BaseService
{
    /**
     * Get the list of extensions
     * @param ExtensionListParameters $params
     * @return Response
     * @throws
     */
    public function list(ExtensionListParameters $params): Response
    {
        return $this->sendRequest('GET', '/api/v1/application/list', [
            'query' => $params->toArray(),
        ]);
    }
}
