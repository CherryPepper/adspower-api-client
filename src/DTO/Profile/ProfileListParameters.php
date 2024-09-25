<?php

namespace CherryPepper\AdsPower\DTO\Profile;

use JsonException;

class ProfileListParameters
{
    public ?string $group_id = null;
    public ?string $user_id = null;
    public ?string $serial_number = null;
    public ?array $user_sort = null; // e.g., ['serial_number' => 'desc']
    public int $page = 1;
    public int $page_size = 50;

    /**
     * @throws JsonException
     */
    public function toArray(): array
    {
        return array_filter([
            'group_id' => $this->group_id,
            'user_id' => $this->user_id,
            'serial_number' => $this->serial_number,
            'user_sort' => $this->user_sort ?? null,
            'page' => $this->page,
            'page_size' => $this->page_size,
        ], static function ($value) {
            return $value !== null;
        });
    }
}
