---
outline: deep
---

# Getting Started

> [!CAUTION]
> This is an experimental eBay SDK under active development. Production use is discouraged.
> Breaking changes may occur at any time, including minor and patch releases.

A work-in-progress Laravel SDK for integrating with eBay APIs. It provides OAuth authentication, 
webhook handling, event-based notifications, and typed clients for both Modern and Traditional 
(XML/SOAP) eBay APIs.

## Requirements
- PHP ≥ 8.2
- Laravel ≥ 11

## Installation

Install the package via composer:

```sh
composer require rat.md/laravel-ebay-sdk
```

Publish the configuration file with:

```sh
php artisan vendor:publish --tag="ebay-sdk-config"
```

## Usage

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItem\GetInventoryItem;
use Rat\eBaySDK\Client;

$client = new Client();
$client->setRefreshToken($refreshToken);
$response = $client->execute(new GetInventoryItem('MyCustomSKU'));
```

Registration via ServiceProvider

```php
namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Rat\eBaySDK\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->extend(Client::class, function (Client $client) {
            $token = Setting::getOption('ebay_refresh_token');
            if (!empty($token)) {
                $client->setRefreshToken($token);
                $client->setTraditionalApplicationKeys(
                    'appId',
                    'devId',
                    'certId',
                );
            }
            return $client;
        });
    }
}
```