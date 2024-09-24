<?php

namespace CherryPepper\AdsPower\Services;

use CherryPepper\AdsPower\DTO\Profile\ProfileCreateParameters;
use CherryPepper\AdsPower\DTO\Profile\ProfileUpdateParameters;
use CherryPepper\AdsPower\DTO\Profile\ProfileListParameters;
use CherryPepper\AdsPower\DTO\Profile\ProfileDeleteParameters;
use CherryPepper\AdsPower\DTO\Profile\ProfileRegroupParameters;
use CherryPepper\AdsPower\Response;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class Profiles extends BaseService
{
    /**
     * Create a new profile
     * @param ProfileCreateParameters $params
     * @return Response
     * @throws Exception|GuzzleException
     */
    public function create(ProfileCreateParameters $params): Response
    {
        return $this->sendRequest('POST', '/api/v1/user/create', [
            'form_params' => $params->toArray(),
        ]);
    }

    /**
     * Update an existing profile
     * @param ProfileUpdateParameters $params
     * @return Response
     * @throws Exception|GuzzleException
     */
    public function update(ProfileUpdateParameters $params): Response
    {
        return $this->sendRequest('POST', '/api/v1/user/update', [
            'form_params' => $params->toArray(),
        ]);
    }

    /**
     * List profiles
     * @param ProfileListParameters $params
     * @return Response
     * @throws Exception|GuzzleException
     */
    public function list(ProfileListParameters $params): Response
    {
        return $this->sendRequest('GET', '/api/v1/user/list', [
            'query' => $params->toArray(),
        ]);
    }

    /**
     * Delete profiles
     * @param ProfileDeleteParameters $params
     * @return Response
     * @throws Exception|GuzzleException
     */
    public function delete(ProfileDeleteParameters $params): Response
    {
        return $this->sendRequest('POST', '/api/v1/user/delete', [
            'form_params' => $params->toArray(),
        ]);
    }

    /**
     * Regroup profiles
     * @param ProfileRegroupParameters $params
     * @return Response
     * @throws Exception|GuzzleException
     */
    public function regroup(ProfileRegroupParameters $params): Response
    {
        return $this->sendRequest('POST', '/api/v1/user/regroup', [
            'form_params' => $params->toArray(),
        ]);
    }

    /**
     * Delete cache of a profile
     * @param string $user_id
     * @return Response
     * @throws Exception|GuzzleException
     */
    public function deleteCache(string $user_id): Response
    {
        return $this->sendRequest('POST', '/api/v1/user/delete-cache', [
            'form_params' => ['user_id' => $user_id],
        ]);
    }
}
