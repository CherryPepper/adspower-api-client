<?php

namespace CherryPepper\AdsPower\DTO\Profile;

use JsonException;

class ProfileRegroupParameters
{
    public array $user_ids; // Array of user IDs to regroup
    public string $group_id;

    /**
     * @throws JsonException
     */
    public function toArray(): array
    {
        return [
            'user_ids' => json_encode($this->user_ids, JSON_THROW_ON_ERROR),
            'group_id' => $this->group_id,
        ];
    }
}
