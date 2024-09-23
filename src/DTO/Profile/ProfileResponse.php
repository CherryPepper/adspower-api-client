<?php

namespace CherryPepper\AdsPower\DTO\Profile;

class ProfileResponse
{
    public int $code;
    public string $msg;
    public array $data;
    public ?string $id;

    public function __construct(array $data)
    {
        $this->code = $data['code'];
        $this->msg = $data['msg'];
        $this->data = $data['data'];
        $this->id = $data['data']['id'] ?? null;
    }
}
