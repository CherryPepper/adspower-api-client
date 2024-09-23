<?php

namespace CherryPepper\AdsPower\DTO\Profile;

use JsonException;

class ProfileDeleteParameters
{
    public array $user_ids; // Array of user IDs to delete

    /**
     * @throws JsonException
     */
    public function toArray(): array
    {
        return [
            'user_ids' => json_encode($this->user_ids, JSON_THROW_ON_ERROR),
        ];
    }
}
