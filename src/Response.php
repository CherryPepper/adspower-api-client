<?php

namespace CherryPepper\AdsPower;

/**
 * API Response
 *
 * @package CherryPepper\AdsPower
 */
class Response
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