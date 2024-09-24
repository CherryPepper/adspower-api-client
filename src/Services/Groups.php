<?php

namespace CherryPepper\AdsPower\Services;

use CherryPepper\AdsPower\DTO\Group\GroupCreateParameters;
use CherryPepper\AdsPower\DTO\Group\GroupUpdateParameters;
use CherryPepper\AdsPower\DTO\Group\GroupListParameters;
use CherryPepper\AdsPower\Response;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class Groups extends BaseService
{
    /**
     * Create a new group
     * @param GroupCreateParameters $params
     * @return Response
     * @throws Exception|GuzzleException
     */
    public function create(GroupCreateParameters $params): Response
    {
        return $this->sendRequest('POST', '/api/v1/group/create', [
            'form_params' => $params->toArray(),
        ]);
    }

    /**
     * Update a group
     * @param GroupUpdateParameters $params
     * @return Response
     * @throws Exception|GuzzleException
     */
    public function update(GroupUpdateParameters $params): Response
    {
        return $this->sendRequest('POST', '/api/v1/group/update', [
            'form_params' => $params->toArray(),
        ]);
    }

    /**
     * List groups
     * @param GroupListParameters $params
     * @return Response
     * @throws Exception|GuzzleException
     */
    public function list(GroupListParameters $params): Response
    {
       return $this->sendRequest('GET', '/api/v1/group/list', [
            'query' => $params->toArray(),
        ]);
    }
}
