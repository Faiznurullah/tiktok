<?php

namespace Faiznurullah\Tiktok;

use Faiznurullah\Tiktok\Config\TikTokShopConfig;


class TikTokShopFactory
{
    /**
     * Create a new TikTok Shop client with default configuration
     * 
     * @param string $appKey Your app key from TikTok Shop Partner Center
     * @param string $appSecret Your app secret from TikTok Shop Partner Center
     * @param string|null $accessToken Access token (optional, can be set later)
     * @param string $apiVersion API version (default: '202405')
     * @param bool $debugMode Enable debug mode (default: false)
     * @return TikTokShopClient
     */
    public static function create(
        string $appKey,
        string $appSecret,
        ?string $accessToken = null,
        string $apiVersion = '202405',
        bool $debugMode = false
    ): TikTokShopClient {
        $config = new TikTokShopConfig(
            $appKey,
            $appSecret,
            $apiVersion,
            'https://open-api.tiktokglobalshop.com',
            $debugMode
        );

        if ($accessToken) {
            $config->setAccessToken($accessToken);
        }

        return new TikTokShopClient($config);
    }

    /**
     * Create client for sandbox environment
     * 
     * @param string $appKey Your app key
     * @param string $appSecret Your app secret
     * @param string|null $accessToken Access token
     * @return TikTokShopClient
     */
    public static function createSandbox(
        string $appKey,
        string $appSecret,
        ?string $accessToken = null
    ): TikTokShopClient {
        $config = new TikTokShopConfig(
            $appKey,
            $appSecret,
            '202405',
            'https://open-api-sandbox.tiktokglobalshop.com', 
            true 
        );

        if ($accessToken) {
            $config->setAccessToken($accessToken);
        }

        return new TikTokShopClient($config);
    }
}