<?php

namespace Faiznurullah\Tiktok\Resources\Authorization;

use Faiznurullah\Tiktok\Resources\BaseResource;

class AuthorizationResource extends BaseResource
{
    /**
     * Get Authorized Category Assets
     * 
     * Retrieves the list of business category assets authorized by a partner for an app.
     * 
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202405)
     * @return array API response containing authorized category assets
     */
    public function getCategoryAssets(array $additionalParams = [], string $apiVersion = '202405'): array
    {
        $endpoint = "authorization/{$apiVersion}/category_assets";
        
        return $this->get($endpoint, $additionalParams);
    }

    /**
     * Get Authorized Shops
     * 
     * Retrieves the list of shops authorized by a partner for an app.
     * 
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing authorized shops
     */
    public function getAuthorizedShops(array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "authorization/{$apiVersion}/shops";
        
        return $this->get($endpoint, $additionalParams);
    }
}