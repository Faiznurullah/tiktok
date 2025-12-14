<?php

namespace Faiznurullah\Tiktok\Config;

class TikTokShopConfig implements ConfigInterface
{
    private string $appKey;
    private string $appSecret;
    private string $baseUrl;
    private string $apiVersion;
    private ?string $accessToken = null;
    private bool $debugMode;
    private int $timeout;

    public function __construct(
        string $appKey,
        string $appSecret,
        string $apiVersion = '202405',
        string $baseUrl = 'https://open-api.tiktokglobalshop.com',
        bool $debugMode = false,
        int $timeout = 30
    ) {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
        $this->apiVersion = $apiVersion;
        $this->baseUrl = $baseUrl;
        $this->debugMode = $debugMode;
        $this->timeout = $timeout;
    }

    public function getAppKey(): string
    {
        return $this->appKey;
    }

    public function getAppSecret(): string
    {
        return $this->appSecret;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    public function isDebugMode(): bool
    {
        return $this->debugMode;
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }
}