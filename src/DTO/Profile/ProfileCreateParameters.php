<?php

namespace CherryPepper\AdsPower\DTO\Profile;


class ProfileCreateParameters
{
    public ?string $name = null;
    public ?string $domain_name = null;
    public ?array $open_urls = null;
    public ?array $repeat_config = null;
    public ?string $username = null;
    public ?string $password = null;
    public ?string $fakey = null;
    public ?string $cookie = null;
    public ?int $ignore_cookie_error = null;
    public string $group_id;
    public ?string $ip = null;
    public ?string $country = null;
    public ?string $region = null;
    public ?string $city = null;
    public ?string $remark = null;
    public ?string $ipchecker = null;
    public ?int $sys_app_cate_id = null;
    public ?array $user_proxy_config = null;
    public ?string $proxyid = null;
    public array $fingerprint_config;

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'domain_name' => $this->domain_name,
            'open_urls' => $this->open_urls ?? null,
            'repeat_config' => $this->repeat_config ?? null,
            'username' => $this->username,
            'password' => $this->password,
            'fakey' => $this->fakey,
            'cookie' => $this->cookie,
            'ignore_cookie_error' => $this->ignore_cookie_error,
            'group_id' => $this->group_id,
            'ip' => $this->ip,
            'country' => $this->country,
            'region' => $this->region,
            'city' => $this->city,
            'remark' => $this->remark,
            'ipchecker' => $this->ipchecker,
            'sys_app_cate_id' => $this->sys_app_cate_id,
            'user_proxy_config' => $this->user_proxy_config ?? null,
            'proxyid' => $this->proxyid,
            'fingerprint_config' => $this->fingerprint_config ?? null,
        ], static function ($value) {
            return $value !== null;
        });
    }
}
