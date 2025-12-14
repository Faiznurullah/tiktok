<?php

namespace Faiznurullah\Tiktok\Config;


interface ConfigInterface
{
    public function getAppKey(): string;
    public function getAppSecret(): string;
    public function getBaseUrl(): string;
    public function getApiVersion(): string;
    public function getAccessToken(): ?string;
    public function setAccessToken(string $accessToken): void;
    public function isDebugMode(): bool;
    public function getTimeout(): int;
 }