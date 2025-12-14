<?php

namespace Faiznurullah\Tiktok\Resources\Fulfillment;

use Faiznurullah\Tiktok\Resources\BaseResource;


class FulfillmentResource extends BaseResource
{
    /**
     * Get order split attributes
     * 
     * @param string $shopCipher Shop cipher
     * @param array $orderIds Order IDs array
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function getOrderSplitAttributes(string $shopCipher, array $orderIds, array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher,
            'order_ids' => $orderIds
        ], $queryParams);

        return $this->httpClient->get('/fulfillment/202309/orders/split_attributes', $queryParams, [], '202309');
    }

    /**
     * Split orders
     * 
     * @param string $orderId Order ID
     * @param string $shopCipher Shop cipher
     * @param array $splittableGroups Splittable groups array
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function splitOrders(string $orderId, string $shopCipher, array $splittableGroups, array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        $bodyParams = array_merge([
            'splittable_groups' => $splittableGroups
        ], $bodyParams);

        return $this->httpClient->post("/fulfillment/202309/orders/{$orderId}/split", $queryParams, $bodyParams, '202309');
    }

    /**
     * Get eligible shipping service
     * 
     * @param string $orderId Order ID
     * @param string $shopCipher Shop cipher
     * @param array $orderLineItemIds Order line item IDs (optional)
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function getEligibleShippingService(string $orderId, string $shopCipher, array $orderLineItemIds = [], array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        $bodyParams = array_merge([
            'order_line_item_ids' => $orderLineItemIds
        ], $bodyParams);

        return $this->httpClient->post("/fulfillment/202309/orders/{$orderId}/shipping_services/query", $queryParams, $bodyParams, '202309');
    }

    /**
     * Create first mile bundle
     * 
     * @param string $shopCipher Shop cipher
     * @param array $orderIds Order IDs array
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function createFirstMileBundle(string $shopCipher, array $orderIds, array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        $bodyParams = array_merge([
            'order_ids' => $orderIds
        ], $bodyParams);

        return $this->httpClient->post('/fulfillment/202407/bundles', $queryParams, $bodyParams, '202407');
    }

    /**
     * Create packages
     * 
     * @param string $shopCipher Shop cipher
     * @param array $orderIds Order IDs array
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function createPackages(string $shopCipher, array $orderIds, array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        $bodyParams = array_merge([
            'order_id' => $orderIds
        ], $bodyParams);

        return $this->httpClient->post('/fulfillment/202309/packages', $queryParams, $bodyParams, '202309');
    }

    /**
     * Search packages
     * 
     * @param array $bodyParams Body parameters including create_time_ge
     * @param string|null $sortField Sort field (optional)
     * @param string|null $sortOrder Sort order (optional)
     * @param string|null $pageToken Page token (optional)
     * @param string|null $shopCipher Shop cipher (optional)
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function searchPackages(array $bodyParams, ?string $sortField = null, ?string $sortOrder = null, ?string $pageToken = null, ?string $shopCipher = null, array $queryParams = []): array
    {
        $queryParams = array_merge(array_filter([
            'sort_field' => $sortField,
            'sort_order' => $sortOrder,
            'page_token' => $pageToken,
            'shop_cipher' => $shopCipher
        ]), $queryParams);

        return $this->httpClient->post('/fulfillment/202309/packages/search', $queryParams, $bodyParams, '202309');
    }

    /**
     * Search combinable packages
     * 
     * @param string $shopCipher Shop cipher
     * @param string $pageSize Page size
     * @param string|null $pageToken Page token (optional)
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function searchCombinablePackages(string $shopCipher, string $pageSize, ?string $pageToken = null, array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher,
            'page_size' => $pageSize
        ], array_filter([
            'page_token' => $pageToken
        ]), $queryParams);

        return $this->httpClient->get('/fulfillment/202309/combinable_packages/search', $queryParams, [], '202309');
    }

    /**
     * Combine packages
     * 
     * @param string $shopCipher Shop cipher
     * @param array $combinablePackages Combinable packages array
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function combinePackages(string $shopCipher, array $combinablePackages, array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        $bodyParams = array_merge([
            'combinable_packages' => $combinablePackages
        ], $bodyParams);

        return $this->httpClient->post('/fulfillment/202309/packages/combine', $queryParams, $bodyParams, '202309');
    }

    /**
     * Uncombine packages
     * 
     * @param string $packageId Package ID
     * @param string $shopCipher Shop cipher
     * @param array $orderIds Order IDs array
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function uncombinePackages(string $packageId, string $shopCipher, array $orderIds, array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        $bodyParams = array_merge([
            'order_ids' => $orderIds
        ], $bodyParams);

        return $this->httpClient->post("/fulfillment/202309/packages/{$packageId}/uncombine", $queryParams, $bodyParams, '202309');
    }

    /**
     * Get package handover time slots
     * 
     * @param string $packageId Package ID
     * @param string $shopCipher Shop cipher
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function getPackageHandoverTimeSlots(string $packageId, string $shopCipher, array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        return $this->httpClient->get("/fulfillment/202309/packages/{$packageId}/handover_time_slots", $queryParams, [], '202309');
    }

    /**
     * Ship package
     * 
     * @param string $packageId Package ID
     * @param string $shopCipher Shop cipher
     * @param array $bodyParams Body parameters including handover_method
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function shipPackage(string $packageId, string $shopCipher, array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        return $this->httpClient->post("/fulfillment/202309/packages/{$packageId}/ship", $queryParams, $bodyParams, '202309');
    }

    /**
     * Batch ship packages
     * 
     * @param string $shopCipher Shop cipher
     * @param array $packages Packages array
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function batchShipPackages(string $shopCipher, array $packages, array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        $bodyParams = array_merge([
            'packages' => $packages
        ], $bodyParams);

        return $this->httpClient->post('/fulfillment/202309/packages/ship', $queryParams, $bodyParams, '202309');
    }

    /**
     * Mark package as shipped
     * 
     * @param string $orderId Order ID
     * @param string $shopCipher Shop cipher
     * @param array $orderLineItemIds Order line item IDs (optional)
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function markPackageAsShipped(string $orderId, string $shopCipher, array $orderLineItemIds = [], array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        $bodyParams = array_merge([
            'order_line_item_ids' => $orderLineItemIds
        ], $bodyParams);

        return $this->httpClient->post("/fulfillment/202309/orders/{$orderId}/packages", $queryParams, $bodyParams, '202309');
    }

    /**
     * Get package shipping document
     * 
     * @param string $packageId Package ID
     * @param string $shopCipher Shop cipher
     * @param string $documentType Document type
     * @param string|null $documentSize Document size (optional)
     * @param string|null $documentFormat Document format (optional)
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function getPackageShippingDocument(string $packageId, string $shopCipher, string $documentType, ?string $documentSize = null, ?string $documentFormat = null, array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher,
            'document_type' => $documentType
        ], array_filter([
            'document_size' => $documentSize,
            'document_format' => $documentFormat
        ]), $queryParams);

        return $this->httpClient->get("/fulfillment/202309/packages/{$packageId}/shipping_documents", $queryParams, [], '202309');
    }

    /**
     * Get package detail
     * 
     * @param string $packageId Package ID
     * @param string|null $shopCipher Shop cipher (optional)
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function getPackageDetail(string $packageId, ?string $shopCipher = null, array $queryParams = []): array
    {
        $queryParams = array_merge(array_filter([
            'shop_cipher' => $shopCipher
        ]), $queryParams);

        return $this->httpClient->get("/fulfillment/202309/packages/{$packageId}", $queryParams, [], '202309');
    }

    /**
     * Get tracking
     * 
     * @param string $orderId Order ID
     * @param string $shopCipher Shop cipher
     * @param string|null $categoryAssetCipher Category asset cipher (optional)
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function getTracking(string $orderId, string $shopCipher, ?string $categoryAssetCipher = null, array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], array_filter([
            'category_asset_cipher' => $categoryAssetCipher
        ]), $queryParams);

        return $this->httpClient->get("/fulfillment/202309/orders/{$orderId}/tracking", $queryParams, [], '202309');
    }

    /**
     * Update shipping info
     * 
     * @param string $orderId Order ID
     * @param string $shopCipher Shop cipher
     * @param string $trackingNumber Tracking number
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function updateShippingInfo(string $orderId, string $shopCipher, string $trackingNumber, array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        $bodyParams = array_merge([
            'tracking_number' => $trackingNumber
        ], $bodyParams);

        return $this->httpClient->post("/fulfillment/202309/orders/{$orderId}/shipping_info/update", $queryParams, $bodyParams, '202309');
    }

    /**
     * Update package shipping info
     * 
     * @param string $packageId Package ID
     * @param string $shopCipher Shop cipher
     * @param string $trackingNumber Tracking number
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function updatePackageShippingInfo(string $packageId, string $shopCipher, string $trackingNumber, array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        $bodyParams = array_merge([
            'tracking_number' => $trackingNumber
        ], $bodyParams);

        return $this->httpClient->post("/fulfillment/202309/packages/{$packageId}/shipping_info/update", $queryParams, $bodyParams, '202309');
    }

    /**
     * Fulfillment upload delivery file
     * 
     * @param string $shopCipher Shop cipher
     * @param mixed $data File data
     * @param string|null $categoryAssetCipher Category asset cipher (optional)
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function fulfillmentUploadDeliveryFile(string $shopCipher, $data, ?string $categoryAssetCipher = null, array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], array_filter([
            'category_asset_cipher' => $categoryAssetCipher
        ]), $queryParams);

        $bodyParams = array_merge([
            'data' => $data
        ], $bodyParams);

        return $this->httpClient->post('/fulfillment/202309/files/upload', $queryParams, $bodyParams, '202309');
    }

    /**
     * Fulfillment upload delivery image
     * 
     * @param string $shopCipher Shop cipher
     * @param mixed $data Image data
     * @param string|null $categoryAssetCipher Category asset cipher (optional)
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function fulfillmentUploadDeliveryImage(string $shopCipher, $data, ?string $categoryAssetCipher = null, array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], array_filter([
            'category_asset_cipher' => $categoryAssetCipher
        ]), $queryParams);

        $bodyParams = array_merge([
            'data' => $data
        ], $bodyParams);

        return $this->httpClient->post('/fulfillment/202309/images/upload', $queryParams, $bodyParams, '202309');
    }

    /**
     * Update package delivery status
     * 
     * @param string $shopCipher Shop cipher
     * @param array $packages Packages array
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function updatePackageDeliveryStatus(string $shopCipher, array $packages, array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        $bodyParams = array_merge([
            'packages' => $packages
        ], $bodyParams);

        return $this->httpClient->post('/fulfillment/202309/packages/deliver', $queryParams, $bodyParams, '202309');
    }

    /**
     * Upload invoice
     * 
     * @param string $shopCipher Shop cipher
     * @param array $invoices Invoices array
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function uploadInvoice(string $shopCipher, array $invoices, array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        $bodyParams = array_merge([
            'invoices' => $invoices
        ], $bodyParams);

        return $this->httpClient->post('/fulfillment/202502/invoice/upload', $queryParams, $bodyParams, '202502');
    }

    /**
     * TTS tracking validation
     * 
     * @param string $shopCipher Shop cipher
     * @param string $trackingNumber Tracking number
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function ttsTrackingValidation(string $shopCipher, string $trackingNumber, array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher,
            'tracking_number' => $trackingNumber
        ], $queryParams);

        return $this->httpClient->get('/fulfillment/202508/tts_tracking_validation', $queryParams, [], '202508');
    }

    /**
     * Create first mile bundle (V2)
     * 
     * @param string $shopCipher Shop cipher
     * @param array $orderIds Order IDs array
     * @param array $bodyParams Additional body parameters
     * @param array $queryParams Additional query parameters
     * @return array
     */
    public function createFirstMileBundleV2(string $shopCipher, array $orderIds, array $bodyParams = [], array $queryParams = []): array
    {
        $queryParams = array_merge([
            'shop_cipher' => $shopCipher
        ], $queryParams);

        $bodyParams = array_merge([
            'order_ids' => $orderIds
        ], $bodyParams);

        return $this->httpClient->post('/fulfillment/202510/first_mile_bundle', $queryParams, $bodyParams, '202510');
    }
}