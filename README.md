Laravel eBay SDK
================

> [!CAUTION]
> This is an **experimental** eBay SDK under active development. Production use is discouraged.  
> Breaking changes may occur at any time, including minor and patch releases.

A work-in-progress Laravel SDK for integrating with eBay APIs. It provides OAuth authentication, 
webhook handling, event-based notifications, and typed clients for both Modern and Traditional 
(XML/SOAP) eBay APIs.

## Features

- OAuth 2.0 authentication flow (authorization and callback).
- Optional route and controller integration for OAuth and webhooks.
- Support for Modern REST APIs and Traditional XML/SOAP APIs (XML-only).
- Normalized handling of eBay notification webhooks.
- Dispatches Laravel events for all supported eBay notification types.
- Designed for event-driven and extensible integrations.

## Requirements

- PHP ≥ 8.2
- Laravel ≥ 11

## Installation

Install the package via composer:

```bash
composer require rat.md/laravel-ebay-sdk
```

Publish the configuration file with:

```bash
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

### Configure the Client using Dependency Injection

The recommended way to configure the eBay client is to extend the container binding. This allows you 
to inject dynamic, runtime-specific data (like refresh tokens) without storing them in the package 
configuration.

The client is resolved through Laravel’s service container, so any extensions will automatically 
apply wherever the client is injected or resolved via `app()`.

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
            }

            return $client;
        });
    }
}
```

## Testing

```bash
./vendor/bin/pest
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License
Published under MIT License \
Copyright © 2023 - 2025 Sam @ rat.md
