<?php

namespace CherryPepper\AdsPower\DTO\Extension;

class ExtensionListParameters
{
    public int $page = 1;
    public int $page_size = 10;

    public function toArray(): array
    {
        return [
            'page' => $this->page,
            'page_size' => $this->page_size,
        ];
    }
}
