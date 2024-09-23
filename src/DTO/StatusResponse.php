<?php

namespace CherryPepper\AdsPower\DTO;

class StatusResponse
{
    public int $code;
    public string $msg;
    public array $data;

    public function __construct(array $data)
    {
        $this->code = $data['code'] ?? -1;
        $this->msg = $data['msg'] ?? '';
        $this->data = $data['data'] ?? [];
    }
}
