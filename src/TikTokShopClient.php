<?php

namespace Faiznurullah\Tiktok;

use Faiznurullah\Tiktok\Config\ConfigInterface;
use Faiznurullah\Tiktok\Http\HttpClientInterface;
use Faiznurullah\Tiktok\Http\GuzzleHttpClient;
use Faiznurullah\Tiktok\Resources\Authorization\AuthorizationResource;
use Faiznurullah\Tiktok\Resources\Products\ProductsResource;
use Faiznurullah\Tiktok\Resources\Orders\OrdersResource;


class TikTokShopClient
{
    private ConfigInterface $config;
    private HttpClientInterface $httpClient;

    public function __construct(ConfigInterface $config, ?HttpClientInterface $httpClient = null)
    {
        $this->config = $config;
        $this->httpClient = $httpClient ?? new GuzzleHttpClient($config);
    }

    
    public function authorization(): AuthorizationResource
    {
        return new AuthorizationResource($this->httpClient, $this->config);
    }

    public function products(): ProductsResource
    {
        return new ProductsResource($this->httpClient, $this->config);
    }
    public function orders(): OrdersResource
    {
        return new OrdersResource($this->httpClient, $this->config);
    }

   
    public function getHttpClient(): HttpClientInterface
    {
        return $this->httpClient;
    }

    public function getConfig(): ConfigInterface
    {
        return $this->config;
    }
}