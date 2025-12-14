<?php

namespace Faiznurullah\Tiktok;

use Faiznurullah\Tiktok\Config\ConfigInterface;
use Faiznurullah\Tiktok\Http\HttpClientInterface;
use Faiznurullah\Tiktok\Http\GuzzleHttpClient;
use Faiznurullah\Tiktok\Resources\Authorization\AuthorizationResource;
use Faiznurullah\Tiktok\Resources\Products\ProductsResource;
use Faiznurullah\Tiktok\Resources\Orders\OrdersResource;
use Faiznurullah\Tiktok\Resources\Analitycs\AnalitycsResource;
use Faiznurullah\Tiktok\Resources\CustomerEngagement\CustomerEngagementResource;
use Faiznurullah\Tiktok\Resources\CustomerService\CustomerServiceResource;
use Faiznurullah\Tiktok\Resources\Event\EventResource;
use Faiznurullah\Tiktok\Resources\Finance\FinanceResource;
use Faiznurullah\Tiktok\Resources\Fulfillment\FulfillmentResource;
use Faiznurullah\Tiktok\Resources\Logistics\LogisticsResource;
use Faiznurullah\Tiktok\Resources\Promotion\PromotionResource;
use Faiznurullah\Tiktok\Resources\Return\ReturnResource;
use Faiznurullah\Tiktok\Resources\Seller\SellerResource;
use Faiznurullah\Tiktok\Resources\SupplyChain\SupplyChainResource;


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

    public function analytics(): AnalitycsResource
    {
        return new AnalitycsResource($this->httpClient, $this->config);
    }

    public function customerEngagement(): CustomerEngagementResource
    {
        return new CustomerEngagementResource($this->httpClient, $this->config);
    }

    public function customer(): CustomerServiceResource
    {
        return new CustomerServiceResource($this->httpClient, $this->config);
    }

    public function event(): EventResource
    {
        return new EventResource($this->httpClient, $this->config);
    }

    public function finance(): FinanceResource
    {
        return new FinanceResource($this->httpClient, $this->config);
    }

    public function fulfillment(): FulfillmentResource
    {
        return new FulfillmentResource($this->httpClient, $this->config);
    }

    public function logistics(): LogisticsResource
    {
        return new LogisticsResource($this->httpClient, $this->config);
    }

    public function promotion(): PromotionResource
    {
        return new PromotionResource($this->httpClient, $this->config);
    }

    public function return(): ReturnResource
    {
        return new ReturnResource($this->httpClient, $this->config);
    }

    public function seller(): SellerResource
    {
        return new SellerResource($this->httpClient, $this->config);
    }

    public function supplyChain(): SupplyChainResource
    {
        return new SupplyChainResource($this->httpClient, $this->config);
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