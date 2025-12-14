<?php

namespace Faiznurullah\Tiktok\Resources\Analitycs;

use Faiznurullah\Tiktok\Resources\BaseResource;

/**
 * Analytics resource for TikTok Shop API
 * 
 * Handles analytics-related endpoints
 */
class AnalitycsResource extends BaseResource
{
    
    /**
     * Get Shop Performance
     * 
     * Retrieves shop performance analytics data.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $startDateGe Start date (greater than or equal)
     * @param string $endDateLt End date (less than)
     * @param array $additionalParams Additional query parameters (with_comparison, granularity, currency)
     * @param string $apiVersion API version (default: 202405)
     * @return array API response containing shop performance data
     */
    public function getShopPerformance(
        string $shopCipher,
        string $startDateGe,
        string $endDateLt,
        array $additionalParams = [],
        string $apiVersion = '202405'
    ): array {
        $endpoint = "analytics/{$apiVersion}/shop/performance";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'start_date_ge' => $startDateGe,
            'end_date_lt' => $endDateLt
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Shop Product Performance List
     * 
     * Retrieves list of shop product performance data.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $startDateGe Start date (greater than or equal)
     * @param string $endDateLt End date (less than)
     * @param array $additionalParams Additional query parameters (page_size, sort_field, sort_order, currency, page_token)
     * @param string $apiVersion API version (default: 202405)
     * @return array API response containing shop product performance list
     */
    public function getShopProductPerformanceList(
        string $shopCipher,
        string $startDateGe,
        string $endDateLt,
        array $additionalParams = [],
        string $apiVersion = '202405'
    ): array {
        $endpoint = "analytics/{$apiVersion}/shop_products/performance";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'start_date_ge' => $startDateGe,
            'end_date_lt' => $endDateLt
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Shop Product Performance
     * 
     * Retrieves performance data for a specific shop product.
     * 
     * @param string $productId Product ID
     * @param string $shopCipher Shop cipher identifier
     * @param string $startDateGe Start date (greater than or equal)
     * @param string $endDateLt End date (less than)
     * @param array $additionalParams Additional query parameters (with_comparison, granularity, currency)
     * @param string $apiVersion API version (default: 202405)
     * @return array API response containing product performance data
     */
    public function getShopProductPerformance(
        string $productId,
        string $shopCipher,
        string $startDateGe,
        string $endDateLt,
        array $additionalParams = [],
        string $apiVersion = '202405'
    ): array {
        $endpoint = "analytics/{$apiVersion}/shop_products/{$productId}/performance";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'start_date_ge' => $startDateGe,
            'end_date_lt' => $endDateLt
        ]);
        
        return $this->get($endpoint, $params);
    }

   
    /**
     * Get Shop SKU Performance List
     * 
     * Retrieves list of shop SKU performance data.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $startDateGe Start date (greater than or equal)
     * @param string $endDateLt End date (less than)
     * @param array $additionalParams Additional query parameters (page_size, sort_field, sort_order, product_id, currency, page_token)
     * @param string $apiVersion API version (default: 202406)
     * @return array API response containing shop SKU performance list
     */
    public function getShopSkuPerformanceList(
        string $shopCipher,
        string $startDateGe,
        string $endDateLt,
        array $additionalParams = [],
        string $apiVersion = '202406'
    ): array {
        $endpoint = "analytics/{$apiVersion}/shop_skus/performance";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'start_date_ge' => $startDateGe,
            'end_date_lt' => $endDateLt
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Shop SKU Performance
     * 
     * Retrieves performance data for a specific shop SKU.
     * 
     * @param string $skuId SKU ID
     * @param string $shopCipher Shop cipher identifier
     * @param string $startDateGe Start date (greater than or equal)
     * @param string $endDateLt End date (less than)
     * @param array $additionalParams Additional query parameters (with_comparison, granularity, currency)
     * @param string $apiVersion API version (default: 202406)
     * @return array API response containing SKU performance data
     */
    public function getShopSkuPerformance(
        string $skuId,
        string $shopCipher,
        string $startDateGe,
        string $endDateLt,
        array $additionalParams = [],
        string $apiVersion = '202406'
    ): array {
        $endpoint = "analytics/{$apiVersion}/shop_skus/{$skuId}/performance";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'start_date_ge' => $startDateGe,
            'end_date_lt' => $endDateLt
        ]);
        
        return $this->get($endpoint, $params);
    }

 
    /**
     * Get Shop Video Performance Overview
     * 
     * Retrieves overview of shop video performance.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $startDateGe Start date (greater than or equal)
     * @param string $endDateLt End date (less than)
     * @param array $additionalParams Additional query parameters (with_comparison, granularity, currency, account_type)
     * @param string $apiVersion API version (default: 202409)
     * @return array API response containing video performance overview
     */
    public function getShopVideoPerformanceOverview(
        string $shopCipher,
        string $startDateGe,
        string $endDateLt,
        array $additionalParams = [],
        string $apiVersion = '202409'
    ): array {
        $endpoint = "analytics/{$apiVersion}/shop_videos/overview_performance";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'start_date_ge' => $startDateGe,
            'end_date_lt' => $endDateLt
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Shop Video Performance List
     * 
     * Retrieves list of shop video performance data.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $startDateGe Start date (greater than or equal)
     * @param string $endDateLt End date (less than)
     * @param array $additionalParams Additional query parameters (page_size, sort_field, sort_order, currency, page_token, account_type)
     * @param string $apiVersion API version (default: 202409)
     * @return array API response containing video performance list
     */
    public function getShopVideoPerformanceList(
        string $shopCipher,
        string $startDateGe,
        string $endDateLt,
        array $additionalParams = [],
        string $apiVersion = '202409'
    ): array {
        $endpoint = "analytics/{$apiVersion}/shop_videos/performance";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'start_date_ge' => $startDateGe,
            'end_date_lt' => $endDateLt
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Shop Video Performance Details
     * 
     * Retrieves performance details for a specific shop video.
     * 
     * @param string $videoId Video ID
     * @param string $shopCipher Shop cipher identifier
     * @param string $startDateGe Start date (greater than or equal)
     * @param string $endDateLt End date (less than)
     * @param array $additionalParams Additional query parameters (with_comparison, granularity, currency)
     * @param string $apiVersion API version (default: 202409)
     * @return array API response containing video performance details
     */
    public function getShopVideoPerformanceDetails(
        string $videoId,
        string $shopCipher,
        string $startDateGe,
        string $endDateLt,
        array $additionalParams = [],
        string $apiVersion = '202409'
    ): array {
        $endpoint = "analytics/{$apiVersion}/shop_videos/{$videoId}/performance";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'start_date_ge' => $startDateGe,
            'end_date_lt' => $endDateLt
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Shop Video Product Performance List
     * 
     * Retrieves product performance list for a specific shop video.
     * 
     * @param string $videoId Video ID
     * @param string $shopCipher Shop cipher identifier
     * @param string $startDateGe Start date (greater than or equal)
     * @param string $endDateLt End date (less than)
     * @param array $additionalParams Additional query parameters (page_size, sort_field, sort_order, currency, page_token, account_type)
     * @param string $apiVersion API version (default: 202409)
     * @return array API response containing video product performance list
     */
    public function getShopVideoProductPerformanceList(
        string $videoId,
        string $shopCipher,
        string $startDateGe,
        string $endDateLt,
        array $additionalParams = [],
        string $apiVersion = '202409'
    ): array {
        $endpoint = "analytics/{$apiVersion}/shop_videos/{$videoId}/products/performance";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'start_date_ge' => $startDateGe,
            'end_date_lt' => $endDateLt
        ]);
        
        return $this->get($endpoint, $params);
    }

  
    /**
     * Get Shop LIVE Performance Overview
     * 
     * Retrieves overview of shop live performance.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $startDateGe Start date (greater than or equal)
     * @param string $endDateLt End date (less than)
     * @param array $additionalParams Additional query parameters (page_size, sort_field, sort_order, currency, account_type)
     * @param string $apiVersion API version (default: 202508)
     * @return array API response containing live performance overview
     */
    public function getShopLivePerformanceOverview(
        string $shopCipher,
        string $startDateGe,
        string $endDateLt,
        array $additionalParams = [],
        string $apiVersion = '202508'
    ): array {
        $endpoint = "analytics/{$apiVersion}/shop_lives/overview_performance";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'start_date_ge' => $startDateGe,
            'end_date_lt' => $endDateLt
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Shop LIVE Performance List
     * 
     * Retrieves list of shop live performance data.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $startDateGe Start date (greater than or equal)
     * @param string $endDateLt End date (less than)
     * @param array $additionalParams Additional query parameters (page_size, sort_field, sort_order, currency, page_token, account_type)
     * @param string $apiVersion API version (default: 202508)
     * @return array API response containing live performance list
     */
    public function getShopLivePerformanceList(
        string $shopCipher,
        string $startDateGe,
        string $endDateLt,
        array $additionalParams = [],
        string $apiVersion = '202508'
    ): array {
        $endpoint = "analytics/{$apiVersion}/shop_lives/performance";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'start_date_ge' => $startDateGe,
            'end_date_lt' => $endDateLt
        ]);
        
        return $this->get($endpoint, $params);
    }
}