<?php

namespace Faiznurullah\Tiktok\Resources\Orders;

use Faiznurullah\Tiktok\Resources\BaseResource;


class OrdersResource extends BaseResource
{
   
    /**
     * Get Order List
     * 
     * Searches for orders with specified criteria.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param int $pageSize Page size
     * @param array $bodyParams Body parameters (order_status, etc.)
     * @param array $additionalParams Additional query parameters (sort_order, page_token, sort_field)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing orders
     */
    public function getOrderList(
        string $shopCipher,
        int $pageSize,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "order/{$apiVersion}/orders/search";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'page_size' => $pageSize
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Get Order Detail
     * 
     * Retrieves details of specific orders by IDs.
     * 
     * @param array $orderIds Array of order IDs
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202507)
     * @return array API response containing order details
     */
    public function getOrderDetail(
        array $orderIds,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202507'
    ): array {
        $endpoint = "order/{$apiVersion}/orders";
        
        $params = array_merge($additionalParams, [
            'ids' => $orderIds,
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Price Detail
     * 
     * Retrieves price details for a specific order.
     * 
     * @param string $orderId Order ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202407)
     * @return array API response containing price details
     */
    public function getPriceDetail(
        string $orderId,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202407'
    ): array {
        $endpoint = "order/{$apiVersion}/orders/{$orderId}/price_detail";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Add External Order References
     * 
     * Adds external order references to TikTok Shop orders.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $orders Orders data
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202406)
     * @return array API response
     */
    public function addExternalOrderReferences(
        string $shopCipher,
        array $orders,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202406'
    ): array {
        $endpoint = "order/{$apiVersion}/orders/external_orders";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = array_merge($bodyParams, [
            'orders' => $orders
        ]);
        
        return $this->post($endpoint, $body, $queryParams);
    }

    /**
     * Get External Order References
     * 
     * Retrieves external order references for a specific order.
     * 
     * @param string $orderId Order ID
     * @param string $platform Platform identifier
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202406)
     * @return array API response containing external order references
     */
    public function getExternalOrderReferences(
        string $orderId,
        string $platform,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202406'
    ): array {
        $endpoint = "order/{$apiVersion}/orders/{$orderId}/external_orders";
        
        $params = array_merge($additionalParams, [
            'platform' => $platform,
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Search Order By External Order Reference
     * 
     * Searches for TikTok Shop orders using external order reference.
     * 
     * @param string $platform Platform identifier
     * @param string $externalOrderId External order ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202406)
     * @return array API response containing orders
     */
    public function searchOrderByExternalReference(
        string $platform,
        string $externalOrderId,
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202406'
    ): array {
        $endpoint = "order/{$apiVersion}/orders/external_order_search";
        
        $queryParams = array_merge($additionalParams, [
            'platform' => $platform,
            'external_order_id' => $externalOrderId,
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

 
    /**
     * Update The Blind Box Opening Results
     * 
     * Updates the blind box opening results for callback.
     * 
     * @param string $platform Platform identifier
     * @param string $shopCipher Shop cipher identifier
     * @param string $mainOrderId Main order ID
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202511)
     * @return array API response
     */
    public function updateBlindBoxOpeningResults(
        string $platform,
        string $shopCipher,
        string $mainOrderId,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202511'
    ): array {
        $endpoint = "order/{$apiVersion}/orders/blind_box_result/callback";
        
        $queryParams = array_merge($additionalParams, [
            'platform' => $platform,
            'shop_cipher' => $shopCipher
        ]);
        
        $body = array_merge($bodyParams, [
            'main_order_id' => $mainOrderId
        ]);
        
        return $this->post($endpoint, $body, $queryParams);
    }

  
    /**
     * Get orders (legacy method)
     * 
     * @deprecated Use getOrderList() instead
     * @param array $bodyParams Body parameters (order_status, create_time_ge, etc.)
     * @param array $additionalParams Additional query parameters (shop_cipher, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing orders
     */
    public function getOrders(array $bodyParams = [], array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "order/{$apiVersion}/orders/search";
        
        return $this->post($endpoint, $bodyParams, $additionalParams);
    }

    /**
     * Get order (legacy method)
     * 
     * @deprecated Use getOrderDetail() instead
     * @param array $orderIds Array of order IDs
     * @param array $additionalParams Additional query parameters (shop_cipher, etc.)
     * @param string $apiVersion API version (default: 202507)
     * @return array API response containing order details
     */
    public function getOrder(array $orderIds, array $additionalParams = [], string $apiVersion = '202507'): array
    {
        $endpoint = "order/{$apiVersion}/orders";
      
        $params = array_merge($additionalParams, [
            'ids' => implode(',', $orderIds)
        ]);
        
        return $this->get($endpoint, $params);
    }
}