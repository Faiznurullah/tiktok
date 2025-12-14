<?php

namespace Faiznurullah\Tiktok\Resources\Logistics;

use Faiznurullah\Tiktok\Resources\BaseResource;


class LogisticsResource extends BaseResource
{
   
    /**
     * Get Warehouse List
     * 
     * Retrieves the list of warehouses for a specific shop.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing warehouse list
     */
    public function getWarehouseList(
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "logistics/{$apiVersion}/warehouses";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Global Seller Warehouse
     * 
     * Retrieves the global seller warehouse information.
     * 
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing global warehouse information
     */
    public function getGlobalSellerWarehouse(
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "logistics/{$apiVersion}/global_warehouses";
        
        return $this->get($endpoint, $additionalParams);
    }

    /**
     * Get Warehouse Delivery Options
     * 
     * Retrieves delivery options available for a specific warehouse.
     * 
     * @param string $warehouseId Warehouse ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters (scope, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing delivery options
     */
    public function getWarehouseDeliveryOptions(
        string $warehouseId,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "logistics/{$apiVersion}/warehouses/{$warehouseId}/delivery_options";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Shipping Providers
     * 
     * Retrieves shipping providers for a specific delivery option.
     * 
     * @param string $deliveryOptionId Delivery option ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing shipping providers
     */
    public function getShippingProviders(
        string $deliveryOptionId,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "logistics/{$apiVersion}/delivery_options/{$deliveryOptionId}/shipping_providers";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Available Shipping Template
     * 
     * Retrieves available shipping templates for the seller.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters (product_attribute, etc.)
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202510)
     * @return array API response containing shipping templates
     */
    public function getAvailableShippingTemplate(
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202510'
    ): array {
        $endpoint = "logistics/{$apiVersion}/seller_templates";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $queryParams);
    }
}