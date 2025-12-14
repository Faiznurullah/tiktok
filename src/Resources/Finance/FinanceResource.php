<?php

namespace Faiznurullah\Tiktok\Resources\Finance;

use Faiznurullah\Tiktok\Resources\BaseResource;


class FinanceResource extends BaseResource
{
  
    /**
     * Get Statements
     * 
     * Retrieves financial statements with specified criteria.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $sortField Sort field
     * @param array $additionalParams Additional query parameters (statement_time_lt, payment_status, page_size, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing statements
     */
    public function getStatements(
        string $shopCipher,
        string $sortField,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "finance/{$apiVersion}/statements";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'sort_field' => $sortField
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Payments
     * 
     * Retrieves payment information with specified criteria.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $sortField Sort field
     * @param array $additionalParams Additional query parameters (create_time_lt, page_size, page_token, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing payments
     */
    public function getPayments(
        string $shopCipher,
        string $sortField,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "finance/{$apiVersion}/payments";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'sort_field' => $sortField
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Withdrawals
     * 
     * Retrieves withdrawal information with specified criteria.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $types Withdrawal types
     * @param array $additionalParams Additional query parameters (create_time_lt, page_size, page_token, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing withdrawals
     */
    public function getWithdrawals(
        string $shopCipher,
        array $types,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "finance/{$apiVersion}/withdrawals";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'types' => $types
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Transactions by Order
     * 
     * Retrieves statement transactions for a specific order.
     * 
     * @param string $orderId Order ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202501)
     * @return array API response containing order transactions
     */
    public function getTransactionsByOrder(
        string $orderId,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202501'
    ): array {
        $endpoint = "finance/{$apiVersion}/orders/{$orderId}/statement_transactions";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Transactions by Statement
     * 
     * Retrieves transactions for a specific statement.
     * 
     * @param string $statementId Statement ID
     * @param string $shopCipher Shop cipher identifier
     * @param string $sortField Sort field
     * @param array $additionalParams Additional query parameters (page_size, page_token, sort_order)
     * @param string $apiVersion API version (default: 202501)
     * @return array API response containing statement transactions
     */
    public function getTransactionsByStatement(
        string $statementId,
        string $shopCipher,
        string $sortField,
        array $additionalParams = [],
        string $apiVersion = '202501'
    ): array {
        $endpoint = "finance/{$apiVersion}/statements/{$statementId}/statement_transactions";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'sort_field' => $sortField
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Unsettled Transactions
     * 
     * Retrieves unsettled order transactions.
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $sortField Sort field
     * @param array $additionalParams Additional query parameters (search_time_ge, payment_status, page_size, etc.)
     * @param string $apiVersion API version (default: 202507)
     * @return array API response containing unsettled transactions
     */
    public function getUnsettledTransactions(
        string $shopCipher,
        string $sortField,
        array $additionalParams = [],
        string $apiVersion = '202507'
    ): array {
        $endpoint = "finance/{$apiVersion}/orders/unsettled";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'sort_field' => $sortField
        ]);
        
        return $this->get($endpoint, $params);
    }
}