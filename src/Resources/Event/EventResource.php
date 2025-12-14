<?php

namespace Faiznurullah\Tiktok\Resources\Event;

use Faiznurullah\Tiktok\Resources\BaseResource;


class EventResource extends BaseResource
{
    /**
     * Get Shop Webhooks
     * 
     * Retrieves the list of webhooks for a specific shop.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing shop webhooks
     */
    public function getShopWebhooks(string $shopCipher, array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "event/{$apiVersion}/webhooks";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Update Shop Webhook
     * 
     * Updates or creates a webhook for a specific shop and event type.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $address Webhook callback URL
     * @param string $eventType Event type for the webhook
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function updateShopWebhook(
        string $shopCipher, 
        string $address, 
        string $eventType, 
        array $additionalParams = [], 
        string $apiVersion = '202309'
    ): array {
        $endpoint = "event/{$apiVersion}/webhooks";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $bodyParams = [
            'address' => $address,
            'event_type' => $eventType
        ];
        
        return $this->put($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Delete Shop Webhook
     * 
     * Deletes a webhook for a specific shop and event type.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $eventType Event type for the webhook to delete
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function deleteShopWebhook(
        string $shopCipher, 
        string $eventType, 
        array $additionalParams = [], 
        string $apiVersion = '202309'
    ): array {
        $endpoint = "event/{$apiVersion}/webhooks";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $bodyParams = [
            'event_type' => $eventType
        ];
        
        return $this->deleteWithBody($endpoint, $bodyParams, $queryParams);
    }
}