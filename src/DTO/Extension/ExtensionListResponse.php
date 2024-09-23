<?php

namespace CherryPepper\AdsPower\DTO\Extension;

class ExtensionListResponse
{
    public int $code;
    public string $msg;
    public array $data;
    public array $list;
    public int $page;
    public int $page_size;

    public function __construct(array $data)
    {
        $this->code = $data['code'];
        $this->msg = $data['msg'];
        $this->data = $data['data'];
        $this->list = $data['data']['list'] ?? [];
        $this->page = $data['data']['page'] ?? 1;
        $this->page_size = $data['data']['page_size'] ?? 10;
    }
}
