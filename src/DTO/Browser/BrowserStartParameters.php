<?php

namespace CherryPepper\AdsPower\DTO\Browser;


class BrowserStartParameters
{
    public string $user_id;
    public ?string $serial_number = null;
    public int $open_tabs = 0;
    public int $ip_tab = 1;
    public int $new_first_tab = 0;
    public ?array $launch_args = null;
    public int $headless = 0;
    public int $disable_password_filling = 0;
    public int $clear_cache_after_closing = 0;
    public int $enable_password_saving = 0;
    public int $cdp_mask = 1;

    public function toArray(): array
    {
        return array_filter([
            'user_id' => $this->user_id,
            'serial_number' => $this->serial_number,
            'open_tabs' => $this->open_tabs,
            'ip_tab' => $this->ip_tab,
            'new_first_tab' => $this->new_first_tab,
            'launch_args' => $this->launch_args ?? null,
            'headless' => $this->headless,
            'disable_password_filling' => $this->disable_password_filling,
            'clear_cache_after_closing' => $this->clear_cache_after_closing,
            'enable_password_saving' => $this->enable_password_saving,
            'cdp_mask' => $this->cdp_mask,
        ], static function ($value) {
            return $value !== null;
        });
    }
}
