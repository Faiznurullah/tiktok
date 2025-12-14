<?php

namespace Faiznurullah\Tiktok\Resources\SupplyChain;

use Faiznurullah\Tiktok\Resources\BaseResource;





class SupplyChainResource extends BaseResource
{
 
    /**
     * Confirm Package Shipment
     * 
     * Synchronizes and confirms package shipment information.
     * 
     * @param string $warehouseProviderId Warehouse provider ID
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function confirmPackageShipment(
        string $warehouseProviderId,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "supply_chain/{$apiVersion}/packages/sync";
        
        $body = array_merge($bodyParams, [
            'warehouse_provider_id' => $warehouseProviderId
        ]);
        
        return $this->post($endpoint, $body, $additionalParams);
    }
}