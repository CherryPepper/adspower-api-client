<?php

namespace CherryPepper\AdsPower\DTO\Group;

class GroupCreateParameters
{
    public string $group_name;
    public ?string $remark = null;

    public function toArray(): array
    {
        return array_filter([
            'group_name' => $this->group_name,
            'remark' => $this->remark,
        ], static function ($value) {
            return $value !== null;
        });
    }
}
