<?php

namespace CherryPepper\AdsPower\Services;

use CherryPepper\AdsPower\DTO\Group\GroupCreateParameters;
use CherryPepper\AdsPower\DTO\Group\GroupCreateResponse;
use CherryPepper\AdsPower\DTO\Group\GroupUpdateParameters;
use CherryPepper\AdsPower\DTO\Group\GroupListParameters;
use CherryPepper\AdsPower\DTO\Group\GroupListResponse;
use CherryPepper\AdsPower\DTO\StatusResponse;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class Groups extends BaseService
{
    /**
     * Create a new group
     * @param GroupCreateParameters $params
     * @return GroupCreateResponse
     * @throws Exception|GuzzleException
     */
    public function create(GroupCreateParameters $params): GroupCreateResponse
    {
        $response = $this->sendRequest('POST', '/api/v1/group/create', [
            'form_params' => $params->toArray(),
        ]);

        return new GroupCreateResponse($response);
    }

    /**
     * Update a group
     * @param GroupUpdateParameters $params
     * @return StatusResponse
     * @throws Exception|GuzzleException
     */
    public function update(GroupUpdateParameters $params): StatusResponse
    {
        $response = $this->sendRequest('POST', '/api/v1/group/update', [
            'form_params' => $params->toArray(),
        ]);

        return new StatusResponse($response);
    }

    /**
     * List groups
     * @param GroupListParameters $params
     * @return GroupListResponse
     * @throws Exception|GuzzleException
     */
    public function list(GroupListParameters $params): GroupListResponse
    {
        $response = $this->sendRequest('GET', '/api/v1/group/list', [
            'query' => $params->toArray(),
        ]);

        return new GroupListResponse($response);
    }
}
