<?php

namespace CherryPepper\AdsPower\Config;

class AdsPowerConfig
{
    private string $baseUri;
    private int $retryAttempts;
    private int $sleepDuration;

    public function __construct(
        string $baseUri,
        int $retryAttempts = 5,
        int $sleepDuration = 1
    ) {
        $this->baseUri = $baseUri;
        $this->retryAttempts = $retryAttempts;
        $this->sleepDuration = $sleepDuration;
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    public function getRetryAttempts(): int
    {
        return $this->retryAttempts;
    }

    public function getSleepDuration(): int
    {
        return $this->sleepDuration;
    }
}
