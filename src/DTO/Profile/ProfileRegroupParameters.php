<?php

namespace CherryPepper\AdsPower\DTO\Profile;

class ProfileRegroupParameters
{
    public array $user_ids; // Array of user IDs to regroup
    public string $group_id;

    public function toArray(): array
    {
        return [
            'user_ids' => $this->user_ids,
            'group_id' => $this->group_id,
        ];
    }
}
