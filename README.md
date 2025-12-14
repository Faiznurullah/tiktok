# TikTok Shop SDK for PHP

SDK PHP yang komprehensif untuk berinteraksi dengan TikTok Shop API.

## Fitur

- ✅ **Resource Pattern**: Endpoint terorganisir berdasarkan fungsi (Authorization, Products, Orders, dll)
- ✅ **Type Safety**: Type hints lengkap untuk dukungan IDE yang lebih baik
- ✅ **Extensible**: Mudah menambahkan endpoint baru dan extend untuk marketplace lain
- ✅ **Error Handling**: Exception handling yang komprehensif
- ✅ **Authentication**: Signature generation dan token management otomatis
- ✅ **Debug Mode**: Dukungan debugging bawaan
- ✅ **PSR Standards**: Mengikuti PSR-4 autoloading dan coding standards

## Installation

```bash
composer require faiznurullah/tiktok
```

## Quick Start

```php
<?php

require_once 'vendor/autoload.php';

use Faiznurullah\Tiktok\TikTokShopFactory;

// Buat client
$client = TikTokShopFactory::create(
    appKey: 'your-app-key',
    appSecret: 'your-app-secret',
    accessToken: 'your-access-token'
);

// Ambil authorized category assets
$categoryAssets = $client->authorization()->getCategoryAssets();
echo json_encode($categoryAssets, JSON_PRETTY_PRINT);
```

## Configuration

### Konfigurasi Dasar

```php
use Faiznurullah\Tiktok\TikTokShopFactory;

$client = TikTokShopFactory::create(
    appKey: 'your-app-key',
    appSecret: 'your-app-secret',
    accessToken: 'your-access-token',  // Optional
    apiVersion: '202405',              // Optional, default: '202405'
    debugMode: false                   // Optional, default: false
);
```

### Konfigurasi Lanjutan

```php
use Faiznurullah\Tiktok\TikTokShopClient;
use Faiznurullah\Tiktok\Config\TikTokShopConfig;

$config = new TikTokShopConfig(
    appKey: 'your-app-key',
    appSecret: 'your-app-secret',
    apiVersion: '202405',
    baseUrl: 'https://open-api.tiktokglobalshop.com',
    debugMode: false,
    timeout: 30
);

$client = new TikTokShopClient($config);
```

### Sandbox Environment

```php
$sandboxClient = TikTokShopFactory::createSandbox(
    appKey: 'your-sandbox-app-key',
    appSecret: 'your-sandbox-app-secret'
);
```

## Available Resources

SDK ini menyediakan berbagai resource untuk mengakses TikTok Shop API:

```php
$client->authorization()        // Authorization endpoints
$client->products()            // Product management
$client->orders()              // Order management
$client->analytics()           // Shop analytics
$client->finance()             // Financial statements
$client->fulfillment()         // Order fulfillment
$client->logistics()           // Warehouse & logistics
$client->promotion()           // Marketing activities
$client->returns()             // Returns & refunds
$client->seller()              // Seller information
$client->customerService()     // Customer service
$client->customerEngagement()  // Customer engagement
$client->events()              // Webhooks & events
$client->supplyChain()         // Supply chain management
```

## Usage Examples

### Authorization

```php
// Ambil authorized category assets
$categoryAssets = $client->authorization()->getCategoryAssets();

// Ambil authorized shops
$shops = $client->authorization()->getAuthorizedShops();
```

### Products

```php
// Ambil daftar produk
$products = $client->products()->getProducts([
    'page_size' => 20,
    'page_token' => ''
]);

// Ambil produk tertentu
$product = $client->products()->getProduct('product-id');

// Buat produk baru
$newProduct = $client->products()->createProduct([
    'title' => 'Product Title',
    'description' => 'Product Description',
    // ... data produk lainnya
]);
```

### Orders

```php
// Ambil daftar order
$orders = $client->orders()->getOrders([
    'order_status' => '100',
    'page_size' => 20
]);

// Ambil order tertentu
$order = $client->orders()->getOrder('order-id');
```

### Analytics

```php
// Ambil performa shop
$performance = $client->analytics()->getShopPerformance(
    shopCipher: 'shop-cipher',
    startDateGe: '2024-01-01',
    endDateLt: '2024-01-31'
);
```

## Error Handling

```php
use Faiznurullah\Tiktok\Exceptions\TikTokShopException;

try {
    $categoryAssets = $client->authorization()->getCategoryAssets();
} catch (TikTokShopException $e) {
    echo "API Error: " . $e->getMessage();
    echo "Error Code: " . $e->getCode();
    
    // Ambil additional context jika tersedia
    if ($context = $e->getContext()) {
        echo "Context: " . json_encode($context);
    }
}
```

## Architecture Overview

SDK ini menggunakan arsitektur **Resource Pattern**:

```
TikTokShopClient
├── authorization()           → AuthorizationResource
├── products()               → ProductsResource
├── orders()                 → OrdersResource
├── analytics()              → AnalyticsResource
├── finance()                → FinanceResource
├── fulfillment()            → FulfillmentResource
├── logistics()              → LogisticsResource
├── promotion()              → PromotionResource
├── returns()                → ReturnResource
├── seller()                 → SellerResource
├── customerService()        → CustomerServiceResource
├── customerEngagement()     → CustomerEngagementResource
├── events()                 → EventResource
└── supplyChain()            → SupplyChainResource
```

### Key Design Patterns

1. **Resource Pattern**: Setiap kategori API adalah kelas resource terpisah
2. **Strategy Pattern**: HTTP client dan authentication yang dapat dikonfigurasi
3. **Factory Pattern**: Pembuatan client mudah dengan default yang masuk akal
4. **Interface Segregation**: Interface kecil dan fokus untuk testability yang lebih baik

## Requirements

- PHP 8.0 atau lebih tinggi
- Composer untuk dependency management
- Akses ke TikTok Shop Partner Center

## Testing

```bash
# Install dependencies
composer install

# Run tests
./vendor/bin/phpunit
```

## Contributing

1. Fork repository ini
2. Buat feature branch (`git checkout -b feature/amazing-feature`)
3. Commit perubahan (`git commit -m 'Add some amazing feature'`)
4. Push ke branch (`git push origin feature/amazing-feature`)
5. Buka Pull Request

## License

Project ini dilisensikan di bawah MIT License - lihat file [LICENSE](LICENSE) untuk detail.

## Support

- [TikTok Shop Developer Documentation](https://partner.tiktokshop.com/docv2)
- [Issue Tracker](https://github.com/faiznurullah/tiktok/issues)