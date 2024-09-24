<?php

namespace CherryPepper\AdsPower\Exceptions;

use Exception;

class AdsPowerException extends Exception
{
    protected array $data;

    public function __construct(string $message, int $code = 0, array $data = [])
    {
        $this->data = $data;
        parent::__construct($message, $code);
    }

    public function getData(): array
    {
        return $this->data;
    }
}
