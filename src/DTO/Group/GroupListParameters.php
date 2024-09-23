<?php

namespace CherryPepper\AdsPower\DTO\Group;

class GroupListParameters
{
    public ?string $group_name = null;
    public int $page = 1;
    public int $page_size = 10;

    public function toArray(): array
    {
        return array_filter([
            'group_name' => $this->group_name,
            'page' => $this->page,
            'page_size' => $this->page_size,
        ], static function ($value) {
            return $value !== null;
        });
    }
}
