<?php

namespace CherryPepper\AdsPower\DTO\Group;

class GroupCreateResponse
{
    public int $code;
    public string $msg;
    public array $data;
    public ?string $group_id;
    public ?string $group_name;
    public ?string $remark;

    public function __construct(array $data)
    {
        $this->code = $data['code'] ?? -1;
        $this->msg = $data['msg'] ?? '';
        $this->data = $data['data'] ?? [];
        $this->group_id = $data['data']['group_id'] ?? null;
        $this->group_name = $data['data']['group_name'] ?? null;
        $this->remark = $data['data']['remark'] ?? null;
    }
}
