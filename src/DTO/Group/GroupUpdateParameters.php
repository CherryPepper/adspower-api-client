<?php

namespace CherryPepper\AdsPower\DTO\Group;

class GroupUpdateParameters
{
    public string $group_id;
    public string $group_name;
    public ?string $remark = null;

    public function toArray(): array
    {
        return array_filter([
            'group_id' => $this->group_id,
            'group_name' => $this->group_name,
            'remark' => $this->remark,
        ], static function ($value) {
            return $value !== null;
        });
    }
}
