<?php

namespace Faiznurullah\Tiktok\Resources\Return;

use Faiznurullah\Tiktok\Resources\BaseResource;



class ReturnResource extends BaseResource
{
  
    /**
     * Get Aftersale Eligibility
     * 
     * Retrieves aftersale eligibility information for a specific order.
     * 
     * @param string $orderId Order ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters (initiate_aftersale_user, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing aftersale eligibility
     */
    public function getAftersaleEligibility(
        string $orderId,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "return_refund/{$apiVersion}/orders/{$orderId}/aftersale_eligibility";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Reject Reasons
     * 
     * Retrieves available reject reasons for returns or cancellations.
     * 
     * @param string $returnOrCancelId Return or cancel ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters (locale, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing reject reasons
     */
    public function getRejectReasons(
        string $returnOrCancelId,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "return_refund/{$apiVersion}/reject_reasons";
        
        $params = array_merge($additionalParams, [
            'return_or_cancel_id' => $returnOrCancelId,
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    
    /**
     * Create Return
     * 
     * Creates a new return request.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $orderId Order ID
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters (idempotency_key, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function createReturn(
        string $shopCipher,
        string $orderId,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "return_refund/{$apiVersion}/returns";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = array_merge($bodyParams, [
            'order_id' => $orderId
        ]);
        
        return $this->post($endpoint, $body, $queryParams);
    }

    /**
     * Approve Return
     * 
     * Approves a return request.
     * 
     * @param string $returnId Return ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters (buyer_keep_item, etc.)
     * @param array $additionalParams Additional query parameters (idempotency_key, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function approveReturn(
        string $returnId,
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "return_refund/{$apiVersion}/returns/{$returnId}/approve";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Reject Return
     * 
     * Rejects a return request.
     * 
     * @param string $returnId Return ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters (comment, etc.)
     * @param array $additionalParams Additional query parameters (idempotency_key, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function rejectReturn(
        string $returnId,
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "return_refund/{$apiVersion}/returns/{$returnId}/reject";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Search Returns
     * 
     * Searches for returns with specified criteria.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters (return_ids, etc.)
     * @param array $additionalParams Additional query parameters (sort_field, sort_order, page_size, page_token)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing returns
     */
    public function searchReturns(
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "return_refund/{$apiVersion}/returns/search";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Get Return Records
     * 
     * Retrieves return records for a specific return.
     * 
     * @param string $returnId Return ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters (locale, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing return records
     */
    public function getReturnRecords(
        string $returnId,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "return_refund/{$apiVersion}/returns/{$returnId}/records";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

   
    /**
     * Cancel Order
     * 
     * Creates a cancellation request for an order.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $cancelReason Cancel reason
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters (initiate_aftersale_user, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function cancelOrder(
        string $shopCipher,
        string $cancelReason,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "return_refund/{$apiVersion}/cancellations";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = array_merge($bodyParams, [
            'cancel_reason' => $cancelReason
        ]);
        
        return $this->post($endpoint, $body, $queryParams);
    }

    /**
     * Approve Cancellation
     * 
     * Approves a cancellation request.
     * 
     * @param string $cancelId Cancel ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters
     * @param array $additionalParams Additional query parameters (idempotency_key, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function approveCancellation(
        string $cancelId,
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "return_refund/{$apiVersion}/cancellations/{$cancelId}/approve";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Reject Cancellation
     * 
     * Rejects a cancellation request.
     * 
     * @param string $cancelId Cancel ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters
     * @param array $additionalParams Additional query parameters (idempotency_key, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function rejectCancellation(
        string $cancelId,
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "return_refund/{$apiVersion}/cancellations/{$cancelId}/reject";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Search Cancellations
     * 
     * Searches for cancellations with specified criteria.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters
     * @param array $additionalParams Additional query parameters (sort_field, sort_order, page_size, page_token)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing cancellations
     */
    public function searchCancellations(
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "return_refund/{$apiVersion}/cancellations/search";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Calculate Refund
     * 
     * Calculates refund amount for an order.
     * 
     * @param string $orderId Order ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing refund calculation
     */
    public function calculateRefund(
        string $orderId,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "return_refund/{$apiVersion}/refunds/calculate";
        
        $params = array_merge($additionalParams, [
            'order_id' => $orderId,
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }
}