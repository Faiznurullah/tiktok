<?php

namespace Faiznurullah\Tiktok\Resources\Products;

use Faiznurullah\Tiktok\Resources\BaseResource;


class ProductsResource extends BaseResource
{
  
    /**
     * Check Listing Prerequisites
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202312)
     * @return array API response
     */
    public function checkListingPrerequisites(string $shopCipher, array $additionalParams = [], string $apiVersion = '202312'): array
    {
        $endpoint = "product/{$apiVersion}/prerequisites";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Categories
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters (locale, keyword, category_version, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing categories
     */
    public function getCategories(string $shopCipher, array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "product/{$apiVersion}/categories";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Recommend Category
     * 
     * @param string $productTitle Product title
     * @param array $bodyParams Additional body parameters (description, images, etc.)
     * @param array $additionalParams Additional query parameters (shop_cipher, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response with category recommendations
     */
    public function recommendCategory(string $productTitle, array $bodyParams = [], array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "product/{$apiVersion}/categories/recommend";
        
        $body = array_merge($bodyParams, [
            'product_title' => $productTitle
        ]);
        
        return $this->post($endpoint, $body, $additionalParams);
    }

    /**
     * Get Category Rules
     * 
     * @param string $categoryId Category ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters (category_version, locale)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing category rules
     */
    public function getCategoryRules(string $categoryId, string $shopCipher, array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "product/{$apiVersion}/categories/{$categoryId}/rules";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Attributes
     * 
     * @param string $categoryId Category ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters (category_version, locale)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing attributes
     */
    public function getAttributes(string $categoryId, string $shopCipher, array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "product/{$apiVersion}/categories/{$categoryId}/attributes";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

   
    /**
     * Get Brands
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param int $pageSize Page size
     * @param array $additionalParams Additional query parameters (category_id, is_authorized, brand_name, etc.)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing brands
     */
    public function getBrands(string $shopCipher, int $pageSize, array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "product/{$apiVersion}/brands";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'page_size' => $pageSize
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Create Custom Brands
     * 
     * @param string $name Brand name
     * @param array $additionalParams Additional body parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function createCustomBrand(string $name, array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "product/{$apiVersion}/brands";
        
        $body = array_merge($additionalParams, [
            'name' => $name
        ]);
        
        return $this->post($endpoint, $body);
    }

  
    /**
     * Check Product Listing
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $description Product description
     * @param string $categoryId Category ID
     * @param array $mainImages Main images
     * @param array $skus SKU data
     * @param string $title Product title
     * @param array $packageWeight Package weight
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function checkProductListing(
        string $shopCipher,
        string $description,
        string $categoryId,
        array $mainImages,
        array $skus,
        string $title,
        array $packageWeight,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/products/listing_check";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = array_merge($bodyParams, [
            'description' => $description,
            'category_id' => $categoryId,
            'main_images' => $mainImages,
            'skus' => $skus,
            'title' => $title,
            'package_weight' => $packageWeight
        ]);
        
        return $this->post($endpoint, $body, $queryParams);
    }

    /**
     * Create Product
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param string $description Product description
     * @param array $mainImages Main images
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function createProduct(
        string $shopCipher,
        string $description,
        array $mainImages,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/products";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = array_merge($bodyParams, [
            'description' => $description,
            'main_images' => $mainImages
        ]);
        
        return $this->post($endpoint, $body, $queryParams);
    }

    /**
     * Get Product
     * 
     * @param string $productId Product ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters (return_under_review_version, return_draft_version, locale)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response containing product details
     */
    public function getProduct(string $productId, string $shopCipher, array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "product/{$apiVersion}/products/{$productId}";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Search Products
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param int $pageSize Page size
     * @param array $bodyParams Body parameters (status, etc.)
     * @param array $additionalParams Additional query parameters (page_token)
     * @param string $apiVersion API version (default: 202502)
     * @return array API response containing products
     */
    public function searchProducts(
        string $shopCipher,
        int $pageSize,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202502'
    ): array {
        $endpoint = "product/{$apiVersion}/products/search";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher,
            'page_size' => $pageSize
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Edit Product
     * 
     * @param string $productId Product ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters (save_mode, etc.)
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202509)
     * @return array API response
     */
    public function editProduct(
        string $productId,
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202509'
    ): array {
        $endpoint = "product/{$apiVersion}/products/{$productId}";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->put($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Partial Edit Product
     * 
     * @param string $productId Product ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters (save_mode, etc.)
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202509)
     * @return array API response
     */
    public function partialEditProduct(
        string $productId,
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202509'
    ): array {
        $endpoint = "product/{$apiVersion}/products/{$productId}/partial_edit";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Activate Product
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $productIds Product IDs
     * @param array $listingPlatforms Listing platforms
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function activateProduct(
        string $shopCipher,
        array $productIds,
        array $listingPlatforms,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/products/activate";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = [
            'product_ids' => $productIds,
            'listing_platforms' => $listingPlatforms
        ];
        
        return $this->post($endpoint, $body, $queryParams);
    }

    /**
     * Deactivate Products
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $productIds Product IDs
     * @param array $listingPlatforms Listing platforms
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function deactivateProducts(
        string $shopCipher,
        array $productIds,
        array $listingPlatforms,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/products/deactivate";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = [
            'product_ids' => $productIds,
            'listing_platforms' => $listingPlatforms
        ];
        
        return $this->post($endpoint, $body, $queryParams);
    }

    /**
     * Delete Products
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $productIds Product IDs
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function deleteProducts(
        string $shopCipher,
        array $productIds,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/products";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = [
            'product_ids' => $productIds
        ];
        
        return $this->deleteWithBody($endpoint, $body, $queryParams);
    }

    /**
     * Recover Products
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $productIds Product IDs
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function recoverProducts(
        string $shopCipher,
        array $productIds,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/products/recover";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = [
            'product_ids' => $productIds
        ];
        
        return $this->post($endpoint, $body, $queryParams);
    }

 
    /**
     * Update Price
     * 
     * @param string $productId Product ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $skus SKU data
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function updatePrice(
        string $productId,
        string $shopCipher,
        array $skus,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/products/{$productId}/prices/update";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        $body = [
            'skus' => $skus
        ];
        
        return $this->post($endpoint, $body, $queryParams);
    }

    /**
     * Update Inventory
     * 
     * @param string $productId Product ID
     * @param array $skus SKU data
     * @param array $additionalParams Additional query parameters (shop_cipher)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function updateInventory(
        string $productId,
        array $skus,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/products/{$productId}/inventory/update";
        
        $body = [
            'skus' => $skus
        ];
        
        return $this->post($endpoint, $body, $additionalParams);
    }

    /**
     * Inventory Search
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters (product_ids, sku_ids)
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function searchInventory(
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/inventory/search";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Upload Product Image
     * 
     * @param mixed $data File data
     * @param array $bodyParams Additional body parameters (use_case)
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function uploadProductImage(
        $data,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/images/upload";
        
        $body = array_merge($bodyParams, [
            'data' => $data
        ]);
        
        return $this->post($endpoint, $body, $additionalParams);
    }

    /**
     * Upload Product File
     * 
     * @param mixed $data File data
     * @param string $name File name
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function uploadProductFile(
        $data,
        string $name,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/files/upload";
        
        $body = [
            'data' => $data,
            'name' => $name
        ];
        
        return $this->post($endpoint, $body, $additionalParams);
    }

 
    /**
     * Search Size Charts
     * 
     * @param int $pageSize Page size
     * @param array $bodyParams Body parameters (ids, keyword)
     * @param array $additionalParams Additional query parameters (page_token, locales)
     * @param string $apiVersion API version (default: 202407)
     * @return array API response
     */
    public function searchSizeCharts(
        int $pageSize,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202407'
    ): array {
        $endpoint = "product/{$apiVersion}/sizecharts/search";
        
        $queryParams = array_merge($additionalParams, [
            'page_size' => $pageSize
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

   
    /**
     * Diagnose and Optimize Product
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters (product_id, etc.)
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202411)
     * @return array API response
     */
    public function diagnoseAndOptimizeProduct(
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202411'
    ): array {
        $endpoint = "product/{$apiVersion}/products/diagnose_optimize";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Product Information Issue Diagnosis
     * 
     * @param array $productIds Product IDs
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202405)
     * @return array API response
     */
    public function getProductDiagnoses(
        array $productIds,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202405'
    ): array {
        $endpoint = "product/{$apiVersion}/products/diagnoses";
        
        $params = array_merge($additionalParams, [
            'product_ids' => $productIds,
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Products SEO Words
     * 
     * @param array $productIds Product IDs
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202405)
     * @return array API response
     */
    public function getProductsSeoWords(
        array $productIds,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202405'
    ): array {
        $endpoint = "product/{$apiVersion}/products/seo_words";
        
        $params = array_merge($additionalParams, [
            'product_ids' => $productIds,
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Get Recommended Product Title And Description
     * 
     * @param array $productIds Product IDs
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202405)
     * @return array API response
     */
    public function getProductSuggestions(
        array $productIds,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202405'
    ): array {
        $endpoint = "product/{$apiVersion}/products/suggestions";
        
        $params = array_merge($additionalParams, [
            'product_ids' => $productIds,
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

      /**
     * Optimized Images
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters (images)
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202404)
     * @return array API response
     */
    public function optimizeImages(
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202404'
    ): array {
        $endpoint = "product/{$apiVersion}/images/optimize";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Create Image Translation Tasks
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters (images)
     * @param array $additionalParams Additional query parameters (category_asset_cipher)
     * @param string $apiVersion API version (default: 202505)
     * @return array API response
     */
    public function createImageTranslationTasks(
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202505'
    ): array {
        $endpoint = "product/{$apiVersion}/images/translation_tasks";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Get Image Translation Tasks
     * 
     * @param array $translationTaskIds Translation task IDs
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters (category_asset_cipher)
     * @param string $apiVersion API version (default: 202506)
     * @return array API response
     */
    public function getImageTranslationTasks(
        array $translationTaskIds,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202506'
    ): array {
        $endpoint = "product/{$apiVersion}/images/translation_tasks";
        
        $params = array_merge($additionalParams, [
            'translation_task_ids' => $translationTaskIds,
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

  
    /**
     * Get Global Categories
     * 
     * @param array $additionalParams Additional query parameters (locale, keyword, category_version)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function getGlobalCategories(array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "product/{$apiVersion}/global_categories";
        
        return $this->get($endpoint, $additionalParams);
    }

    /**
     * Recommend Global Categories
     * 
     * @param string $productTitle Product title
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function recommendGlobalCategories(
        string $productTitle,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/global_categories/recommend";
        
        $body = array_merge($bodyParams, [
            'product_title' => $productTitle
        ]);
        
        return $this->post($endpoint, $body, $additionalParams);
    }

    /**
     * Get Global Category Rules
     * 
     * @param string $categoryId Category ID
     * @param array $additionalParams Additional query parameters (category_version, locale)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function getGlobalCategoryRules(string $categoryId, array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "product/{$apiVersion}/categories/{$categoryId}/global_rules";
        
        return $this->get($endpoint, $additionalParams);
    }

    /**
     * Get Global Attributes
     * 
     * @param string $categoryId Category ID
     * @param array $additionalParams Additional query parameters (category_version, locale)
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function getGlobalAttributes(string $categoryId, array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "product/{$apiVersion}/categories/{$categoryId}/global_attributes";
        
        return $this->get($endpoint, $additionalParams);
    }

    /**
     * Create Global Product
     * 
     * @param string $title Product title
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function createGlobalProduct(
        string $title,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/global_products";
        
        $body = array_merge($bodyParams, [
            'title' => $title
        ]);
        
        return $this->post($endpoint, $body, $additionalParams);
    }

    /**
     * Publish Global Product
     * 
     * @param string $globalProductId Global product ID
     * @param array $bodyParams Body parameters (publish_target)
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function publishGlobalProduct(
        string $globalProductId,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/global_products/{$globalProductId}/publish";
        
        return $this->post($endpoint, $bodyParams, $additionalParams);
    }

    /**
     * Edit Global Product
     * 
     * @param string $globalProductId Global product ID
     * @param string $title Product title
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function editGlobalProduct(
        string $globalProductId,
        string $title,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/global_products/{$globalProductId}";
        
        $body = array_merge($bodyParams, [
            'title' => $title
        ]);
        
        return $this->put($endpoint, $body, $additionalParams);
    }

    /**
     * Partial Edit Global Product
     * 
     * @param string $globalProductId Global product ID
     * @param array $bodyParams Body parameters (title, etc.)
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202509)
     * @return array API response
     */
    public function partialEditGlobalProduct(
        string $globalProductId,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202509'
    ): array {
        $endpoint = "product/{$apiVersion}/global_products/{$globalProductId}/partial_edit";
        
        return $this->put($endpoint, $bodyParams, $additionalParams);
    }

    /**
     * Delete Global Products
     * 
     * @param array $globalProductIds Global product IDs
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function deleteGlobalProducts(
        array $globalProductIds,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/global_products";
        
        $body = [
            'global_product_ids' => $globalProductIds
        ];
        
        return $this->deleteWithBody($endpoint, $body, $additionalParams);
    }

    /**
     * Get Global Product
     * 
     * @param string $globalProductId Global product ID
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function getGlobalProduct(string $globalProductId, array $additionalParams = [], string $apiVersion = '202309'): array
    {
        $endpoint = "product/{$apiVersion}/global_products/{$globalProductId}";
        
        return $this->get($endpoint, $additionalParams);
    }

    /**
     * Search Global Products
     * 
     * @param int $pageSize Page size
     * @param array $bodyParams Body parameters (status, etc.)
     * @param array $additionalParams Additional query parameters (page_token)
     * @param string $apiVersion API version (default: 202312)
     * @return array API response
     */
    public function searchGlobalProducts(
        int $pageSize,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202312'
    ): array {
        $endpoint = "product/{$apiVersion}/global_products/search";
        
        $queryParams = array_merge($additionalParams, [
            'page_size' => $pageSize
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Update Global Inventory
     * 
     * @param string $globalProductId Global product ID
     * @param array $globalSkus Global SKUs data
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202309)
     * @return array API response
     */
    public function updateGlobalInventory(
        string $globalProductId,
        array $globalSkus,
        array $additionalParams = [],
        string $apiVersion = '202309'
    ): array {
        $endpoint = "product/{$apiVersion}/global_products/{$globalProductId}/inventory/update";
        
        $body = [
            'global_skus' => $globalSkus
        ];
        
        return $this->post($endpoint, $body, $additionalParams);
    }

   
    /**
     * Create Manufacturer
     * 
     * @param string $name Manufacturer name
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202409)
     * @return array API response
     */
    public function createManufacturer(
        string $name,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202409'
    ): array {
        $endpoint = "product/{$apiVersion}/compliance/manufacturers";
        
        $body = array_merge($bodyParams, [
            'name' => $name
        ]);
        
        return $this->post($endpoint, $body, $additionalParams);
    }

    /**
     * Partial Edit Manufacturer
     * 
     * @param string $manufacturerId Manufacturer ID
     * @param string $name Manufacturer name
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202409)
     * @return array API response
     */
    public function partialEditManufacturer(
        string $manufacturerId,
        string $name,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202409'
    ): array {
        $endpoint = "product/{$apiVersion}/compliance/manufacturers/{$manufacturerId}/partial_edit";
        
        $body = array_merge($bodyParams, [
            'name' => $name
        ]);
        
        return $this->post($endpoint, $body, $additionalParams);
    }

    /**
     * Search Manufacturers
     * 
     * @param int $pageSize Page size
     * @param array $bodyParams Body parameters (manufacturer_ids)
     * @param array $additionalParams Additional query parameters (page_token)
     * @param string $apiVersion API version (default: 202501)
     * @return array API response
     */
    public function searchManufacturers(
        int $pageSize,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202501'
    ): array {
        $endpoint = "product/{$apiVersion}/compliance/manufacturers/search";
        
        $queryParams = array_merge($additionalParams, [
            'page_size' => $pageSize
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Create Responsible Person
     * 
     * @param string $name Responsible person name
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202409)
     * @return array API response
     */
    public function createResponsiblePerson(
        string $name,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202409'
    ): array {
        $endpoint = "product/{$apiVersion}/compliance/responsible_persons";
        
        $body = array_merge($bodyParams, [
            'name' => $name
        ]);
        
        return $this->post($endpoint, $body, $additionalParams);
    }

    /**
     * Partial Edit Responsible Person
     * 
     * @param string $responsiblePersonId Responsible person ID
     * @param string $name Responsible person name
     * @param array $bodyParams Additional body parameters
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202409)
     * @return array API response
     */
    public function partialEditResponsiblePerson(
        string $responsiblePersonId,
        string $name,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202409'
    ): array {
        $endpoint = "product/{$apiVersion}/compliance/responsible_persons/{$responsiblePersonId}/partial_edit";
        
        $body = array_merge($bodyParams, [
            'name' => $name
        ]);
        
        return $this->post($endpoint, $body, $additionalParams);
    }

    /**
     * Search Responsible Persons
     * 
     * @param int $pageSize Page size
     * @param array $bodyParams Body parameters (responsible_person_ids, etc.)
     * @param array $additionalParams Additional query parameters (page_token)
     * @param string $apiVersion API version (default: 202501)
     * @return array API response
     */
    public function searchResponsiblePersons(
        int $pageSize,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202501'
    ): array {
        $endpoint = "product/{$apiVersion}/compliance/responsible_persons/search";
        
        $queryParams = array_merge($additionalParams, [
            'page_size' => $pageSize
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

   
    /**
     * Create Category Upgrade Task
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202407)
     * @return array API response
     */
    public function createCategoryUpgradeTask(
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202407'
    ): array {
        $endpoint = "product/{$apiVersion}/products/category_upgrade_task";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, [], $queryParams);
    }

    /**
     * Get Global Listing Rules
     * 
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202507)
     * @return array API response
     */
    public function getGlobalListingRules(
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202507'
    ): array {
        $endpoint = "product/{$apiVersion}/global_listing_rules";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }

    /**
     * Replicate Product
     * 
     * @param string $productId Product ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $bodyParams Body parameters (replicate_target)
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202507)
     * @return array API response
     */
    public function replicateProduct(
        string $productId,
        string $shopCipher,
        array $bodyParams = [],
        array $additionalParams = [],
        string $apiVersion = '202507'
    ): array {
        $endpoint = "product/{$apiVersion}/products/{$productId}/global_replicate";
        
        $queryParams = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->post($endpoint, $bodyParams, $queryParams);
    }

    /**
     * Get Global Replicated Products
     * 
     * @param string $productId Product ID
     * @param string $shopCipher Shop cipher identifier
     * @param array $additionalParams Additional query parameters
     * @param string $apiVersion API version (default: 202507)
     * @return array API response
     */
    public function getGlobalReplicatedProducts(
        string $productId,
        string $shopCipher,
        array $additionalParams = [],
        string $apiVersion = '202507'
    ): array {
        $endpoint = "product/{$apiVersion}/products/{$productId}/replicated_products";
        
        $params = array_merge($additionalParams, [
            'shop_cipher' => $shopCipher
        ]);
        
        return $this->get($endpoint, $params);
    }
}