<?php

namespace CherryPepper\AdsPower\Services;

use CherryPepper\AdsPower\DTO\Profile\ProfileCreateParameters;
use CherryPepper\AdsPower\DTO\Profile\ProfileUpdateParameters;
use CherryPepper\AdsPower\DTO\Profile\ProfileListParameters;
use CherryPepper\AdsPower\DTO\Profile\ProfileDeleteParameters;
use CherryPepper\AdsPower\DTO\Profile\ProfileRegroupParameters;
use CherryPepper\AdsPower\DTO\Profile\ProfileResponse;
use CherryPepper\AdsPower\DTO\Profile\ProfileListResponse;
use CherryPepper\AdsPower\DTO\StatusResponse;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class Profiles extends BaseService
{
    /**
     * Create a new profile
     * @param ProfileCreateParameters $params
     * @return ProfileResponse
     * @throws Exception|GuzzleException
     */
    public function create(ProfileCreateParameters $params): ProfileResponse
    {
        $response = $this->sendRequest('POST', '/api/v1/user/create', [
            'form_params' => $params->toArray(),
        ]);

        return new ProfileResponse($response);
    }

    /**
     * Update an existing profile
     * @param ProfileUpdateParameters $params
     * @return StatusResponse
     * @throws Exception|GuzzleException
     */
    public function update(ProfileUpdateParameters $params): StatusResponse
    {
        $response = $this->sendRequest('POST', '/api/v1/user/update', [
            'form_params' => $params->toArray(),
        ]);

        return new StatusResponse($response);
    }

    /**
     * List profiles
     * @param ProfileListParameters $params
     * @return ProfileListResponse
     * @throws Exception|GuzzleException
     */
    public function list(ProfileListParameters $params): ProfileListResponse
    {
        $response = $this->sendRequest('GET', '/api/v1/user/list', [
            'query' => $params->toArray(),
        ]);

        return new ProfileListResponse($response);
    }

    /**
     * Delete profiles
     * @param ProfileDeleteParameters $params
     * @return StatusResponse
     * @throws Exception|GuzzleException
     */
    public function delete(ProfileDeleteParameters $params): StatusResponse
    {
        $response = $this->sendRequest('POST', '/api/v1/user/delete', [
            'form_params' => $params->toArray(),
        ]);

        return new StatusResponse($response);
    }

    /**
     * Regroup profiles
     * @param ProfileRegroupParameters $params
     * @return StatusResponse
     * @throws Exception|GuzzleException
     */
    public function regroup(ProfileRegroupParameters $params): StatusResponse
    {
        $response = $this->sendRequest('POST', '/api/v1/user/regroup', [
            'form_params' => $params->toArray(),
        ]);

        return new StatusResponse($response);
    }

    /**
     * Delete cache of a profile
     * @param string $user_id
     * @return StatusResponse
     * @throws Exception|GuzzleException
     */
    public function deleteCache(string $user_id): StatusResponse
    {
        $response = $this->sendRequest('POST', '/api/v1/user/delete-cache', [
            'form_params' => ['user_id' => $user_id],
        ]);

        return new StatusResponse($response);
    }
}
