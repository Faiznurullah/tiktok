<?php

namespace Faiznurullah\Tiktok\Resources\CustomerService;

use Faiznurullah\Tiktok\Resources\BaseResource;


class CustomerServiceResource extends BaseResource
{
  
    /**
     * Create Conversation
     * 
     * Creates a new conversation with a buyer.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $buyerUserId Buyer user ID
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function createConversation(
        string $shopCipher,
        string $buyerUserId,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "customer_service/{$apiVersion}/conversations";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = [
            'buyer_user_id' => $buyerUserId
        ];
        
        return $this->post($endpoint, $body, $queryParams);
    }

    /**
     * Get Conversations
     * 
     * Retrieves list of conversations.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param int $pageSize Page size
     * @param array $additionalParams Additional query parameters (page_token, locale)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing conversations
     */
    public function getConversations(
        string $shopCipher,
        int $pageSize,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "customer_service/{$apiVersion}/conversations";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'page_size' => $pageSize
        ]);
        
        return $this->get($endpoint, $params);
    }

 
    /**
     * Get Conversation Messages
     * 
     * Retrieves messages from a specific conversation.
     * 
     * @param string $conversationId Conversation ID
     * @param string $shopCipher Shop cipher identifier
     * @param int $pageSize Page size
     * @param array $additionalParams Additional query parameters (page_token, locale, sort_order, sort_field)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing conversation messages
     */
    public function getConversationMessages(
        string $conversationId,
        string $shopCipher,
        int $pageSize,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "customer_service/{$apiVersion}/conversations/{$conversationId}/messages";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'page_size' => $pageSize
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Send Message
     * 
     * Sends a message to a conversation.
     * 
     * @param string $conversationId Conversation ID
     * @param string $shopCipher Shop cipher identifier
     * @param string $type Message type
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function sendMessage(
        string $conversationId,
        string $shopCipher,
        string $type,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "customer_service/{$apiVersion}/conversations/{$conversationId}/messages";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = array_merge($bodyParams, [
            'type' => $type
        ]);
        
        return $this->post($endpoint, $body, $queryParams);
    }

    /**
     * Read Message
     * 
     * Marks messages in a conversation as read.
     * 
     * @param string $conversationId Conversation ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function readMessage(
        string $conversationId,
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "customer_service/{$apiVersion}/conversations/{$conversationId}/messages/read";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

   
    /**
     * Upload Buyer Messages Image
     * 
     * Uploads an image for buyer messages.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param mixed $data File data
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function uploadBuyerMessagesImage(
        string $shopCipher,
        $data,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "customer_service/{$apiVersion}/images/upload";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = [
            'data' => $data
        ];
        
        return $this->post($endpoint, $body, $queryParams);
    }

  
    /**
     * Get Agent Settings
     * 
     * Retrieves agent settings for customer service.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters (category_asset_cipher)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing agent settings
     */
    public function getAgentSettings(
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "customer_service/{$apiVersion}/agents/settings";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Update Agent Settings
     * 
     * Updates agent settings for customer service.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param bool $canAcceptChat Whether agent can accept chat
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function updateAgentSettings(
        string $shopCipher,
        bool $canAcceptChat,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "customer_service/{$apiVersion}/agents/settings";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = array_merge($bodyParams, [
            'can_accept_chat' => $canAcceptChat
        ]);
        
        return $this->put($endpoint, $body, $queryParams);
    }

    /**
     * Get Customer Service Performance
     * 
     * Retrieves customer service performance data.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $supportDateGe Support date (greater than or equal)
     * @param string $supportDateLt Support date (less than)
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202407)
     * @return array API response containing performance data
     */
    public function getCustomerServicePerformance(
        string $shopCipher,
        string $supportDateGe,
        string $supportDateLt,
        array $additionalParams = [],
        string $apiVersion = '202407'
    ): array {
        $endpoint = "customer_service/{$apiVersion}/performance";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'support_date_ge' => $supportDateGe,
            'support_date_lt' => $supportDateLt
        ]);
        
        return $this->get($endpoint, $params);
    }
}