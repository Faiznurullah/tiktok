<?php

namespace Faiznurullah\Tiktok\Resources\CustomerEngagement;

use Faiznurullah\Tiktok\Resources\BaseResource;

class CustomerEngagementResource extends BaseResource
{
    
    /**
     * Get Message Templates
     * 
     * Retrieves available message templates for customer engagement.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $locale Locale for templates
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202412)
     * @return array API response containing message templates
     */
    public function getMessageTemplates(
        string $shopCipher,
        string $locale,
        array $additionalParams = [],
        string $apiVersion = '202412'
    ): array {
        $endpoint = "customer_engagement/{$apiVersion}/message_templates";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'locale' => $locale
        ]);
        
        return $this->get($endpoint, $params);
    }

   
    /**
     * Create Engagement Task
     * 
     * Creates a new customer engagement task.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $idempotencyKey Idempotency key
     * @param string $templateId Template ID
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202412)
     * @return array API response
     */
    public function createEngagementTask(
        string $shopCipher,
        string $idempotencyKey,
        string $templateId,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202412'
    ): array {
        $endpoint = "customer_engagement/{$apiVersion}/engagement_tasks";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'idempotency_key' => $idempotencyKey
        ]);
        
        $body = array_merge($bodyParams, [
            'template_id' => $templateId
        ]);
        
        return $this->post($endpoint, $body, $queryParams);
    }

    /**
     * Create Custom Engagement Task
     * 
     * Creates a custom customer engagement task.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $idempotencyKey Idempotency key
     * @param array $productIds Product IDs
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202502)
     * @return array API response
     */
    public function createCustomEngagementTask(
        string $shopCipher,
        string $idempotencyKey,
        array $productIds,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202502'
    ): array {
        $endpoint = "customer_engagement/{$apiVersion}/engagement_tasks/custom";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'idempotency_key' => $idempotencyKey
        ]);
        
        $body = array_merge($bodyParams, [
            'product_ids' => $productIds
        ]);
        
        return $this->post($endpoint, $body, $queryParams);
    }

      /**
     * Send Engagement Message
     * 
     * Sends an engagement message to customers.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters (task_id, etc.)
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202412)
     * @return array API response
     */
    public function sendEngagementMessage(
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202412'
    ): array {
        $endpoint = "customer_engagement/{$apiVersion}/messages";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

  
    /**
     * Get Task Performances
     * 
     * Retrieves performance data for engagement tasks.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $locale Locale for performance data
     * @param array $bodyParams Body parameters (task_ids, etc.)
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202412)
     * @return array API response containing task performance data
     */
    public function getTaskPerformances(
        string $shopCipher,
        string $locale,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202412'
    ): array {
        $endpoint = "customer_engagement/{$apiVersion}/performances";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'locale' => $locale
        ]);
        
        return $this->get($endpoint, $queryParams);
    }

  
    /**
     * Get Feature Permissions
     * 
     * Retrieves feature permissions for customer engagement.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202502)
     * @return array API response containing feature permissions
     */
    public function getFeaturePermissions(
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202502'
    ): array {
        $endpoint = "customer_engagement/{$apiVersion}/permissions";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }
}