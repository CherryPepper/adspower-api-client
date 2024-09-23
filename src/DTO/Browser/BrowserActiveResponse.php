<?php

namespace CherryPepper\AdsPower\DTO\Browser;

class BrowserActiveResponse
{
    public int $code;
    public string $msg;
    public array $data;
    public ?string $status;
    public ?array $ws;

    public function __construct(array $data)
    {
        $this->code = $data['code'] ?? -1;
        $this->msg = $data['msg'] ?? '';
        $this->data = $data['data'] ?? [];
        $this->status = $data['data']['status'] ?? null;
        $this->ws = $data['data']['ws'] ?? null;
    }
}
