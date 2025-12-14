<?php

namespace Faiznurullah\Tiktok\Resources\Promotion;

use Faiznurullah\Tiktok\Resources\BaseResource;



class PromotionResource extends BaseResource
{
   
    /**
     * Create Activity
     * 
     * Creates a new promotional activity.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $title Activity title
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function createActivity(
        string $shopCipher,
        string $title,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "promotion/{$apiVersion}/activities";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = array_merge($bodyParams, [
            'title' => $title
        ]);
        
        return $this->post($endpoint, $body, $queryParams);
    }

    /**
     * Update Activity
     * 
     * Updates an existing promotional activity.
     * 
     * @param string $activityId Activity ID
     * @param string $shopCipher Shop cipher identifier
     * @param string $title Activity title
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function updateActivity(
        string $activityId,
        string $shopCipher,
        string $title,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "promotion/{$apiVersion}/activities/{$activityId}";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = array_merge($bodyParams, [
            'title' => $title
        ]);
        
        return $this->put($endpoint, $body, $queryParams);
    }

    /**
     * Deactivate Activity
     * 
     * Deactivates a promotional activity.
     * 
     * @param string $activityId Activity ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function deactivateActivity(
        string $activityId,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "promotion/{$apiVersion}/activities/{$activityId}/deactivate";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, [], $queryParams);
    }

    /**
     * Get Activity
     * 
     * Retrieves details of a specific promotional activity.
     * 
     * @param string $activityId Activity ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing activity details
     */
    public function getActivity(
        string $activityId,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "promotion/{$apiVersion}/activities/{$activityId}";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Update Activity Product
     * 
     * Updates products associated with a promotional activity.
     * 
     * @param string $activityId Activity ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters (activity_id, etc.)
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function updateActivityProduct(
        string $activityId,
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "promotion/{$apiVersion}/activities/{$activityId}/products";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = array_merge($bodyParams, [
            'activity_id' => $activityId
        ]);
        
        return $this->put($endpoint, $body, $queryParams);
    }

    /**
     * Remove Activity Product
     * 
     * Removes products from a promotional activity.
     * 
     * @param string $activityId Activity ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $productIds Product IDs to remove
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function removeActivityProduct(
        string $activityId,
        string $shopCipher,
        array $productIds,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "promotion/{$apiVersion}/activities/{$activityId}/products";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = array_merge($bodyParams, [
            'product_ids' => $productIds
        ]);
        
        return $this->deleteWithBody($endpoint, $body, $queryParams);
    }

    
    /**
     * Get Coupon
     * 
     * Retrieves details of a specific coupon.
     * 
     * @param string $couponId Coupon ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202406)
     * @return array API response containing coupon details
     */
    public function getCoupon(
        string $couponId,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202406'
    ): array {
        $endpoint = "promotion/{$apiVersion}/coupons/{$couponId}";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Search Coupons
     * 
     * Searches for coupons with specified criteria.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters (title_keyword, etc.)
     * @param array $additionalParams Additional query parameters (page_token, page_size)
     * @param string $apiVersion API version (default: 202406)
     * @return array API response containing coupons
     */
    public function searchCoupons(
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202406'
    ): array {
        $endpoint = "promotion/{$apiVersion}/coupons/search";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }
}