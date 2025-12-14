<?php

namespace Faiznurullah\Tiktok\Resources\Seller;

use Faiznurullah\Tiktok\Resources\BaseResource;


class SellerResource extends BaseResource
{
    /**
     * Get Active Shops
     * 
     * Retrieves the list of active shops for the seller.
     * 
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing active shops
     */
    public function getActiveShops(array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "seller/{$apiVersion}/shops";
        
        return $this->get($endpoint, $additionalParams);
    }

    /**
     * Get Seller Permissions
     * 
     * Retrieves the list of permissions granted to the seller.
     * 
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing seller permissions
     */
    public function getSellerPermissions(array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "seller/{$apiVersion}/permissions";
        
        return $this->get($endpoint, $additionalParams);
    }
}