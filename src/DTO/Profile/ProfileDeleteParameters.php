<?php

namespace CherryPepper\AdsPower\DTO\Profile;


class ProfileDeleteParameters
{
    public array $user_ids; // Array of user IDs to delete

    public function toArray(): array
    {
        return [
            'user_ids' => $this->user_ids,
        ];
    }
}
