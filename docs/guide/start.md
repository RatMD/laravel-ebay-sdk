---
outline: deep
---

# Getting Started

> [!CAUTION]
> This is an **experimental** eBay SDK in an early alpha stage. Not all APIs have been fully tested 
> or can be tested due to user, marketplace, country restrictions, or sandbox limitations.
> While the SDK should be usable, breaking changes may occur at any time, including minor releases.

A Laravel SDK for integrating with eBay APIs, featuring OAuth authentication, webhook notifications, 
event handling, and practical utilities for common workflows. The SDK supports both Modern REST APIs 
and Traditional (XML/SOAP) eBay APIs and is designed to evolve alongside eBay’s platform.

## Requirements

- PHP ≥ 8.2
- Laravel ≥ 11 | ≥ 12

> [!TIP]
> We strongly recommend a task-scheduling enabled and queue-based Laravel setup to handle
> performance-intensive processes and, most importantly, to process eBay webhook notifications
> in a compliant and reliable manner (See [Configuration](/guide/configuration#webhook-configuration)).

## Installation

Install the package via composer:

```sh
composer require rat.md/laravel-ebay-sdk
```

Publish the configuration file with:

```sh
php artisan vendor:publish --tag="ebay-sdk-config"
```

## Basic Usage

Just use the default SDK configuration from your `config/ebay-sdk.php` / `.env` settings. No 
explicit environment or authentication setup is required, just the refresh token is needed.

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItem\GetInventoryItem;
use Rat\eBaySDK\Client;

$client = new Client(); // or app(Client::class)
$client->setRefreshToken($refreshToken);
$response = $client->execute(new GetInventoryItem('MyCustomSKU'));
```

## Extend via ServiceProvider

For single-account applications it is recommended to extend the `Client` binding and inject the 
persisted refresh token at container resolution time. This keeps the SDK usage clean while 
centralizing authentication state.

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

## Custom Client (Multi-Tenant / Multi-User)

For multi-tenant or multi-user scenarios you can explicitly create and pass your own `Environment` 
and even `Authentication`-implementing instances. This allows full control over credentials, scopes, 
locale, caching behavior, and traditional API settings per client instance.

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItem\GetInventoryItem;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\Authentication\Environment;
use Rat\eBaySDK\Authentication\OAuthAuthentication;

$env = new Environment(
    clientId: $clientId,
    clientSecret: $clientSecret,
    redirectUri: $redirectUri,
    devId: $devId,
    environment: $environment,
    authorizationScopes: $authorizationScopes,
    credentialScopes: $credentialScopes,
    debug: $debug,
    caching: $caching,
    locale: $locale,
    compatibilityLevel: $compatibilityLevel,
    siteId: $siteId,
);

// Defining OAuthAuthentication explicitly this way is optional, as the Client
// will create a default instance automatically, based on the passed environment,
// when none is provided.
//
// However, you may supply your own Authentication implementation if you need
// custom behavior, as long as it implements Rat\eBaySDK\Contracts\Authentication.
$auth = new OAuthAuthentication($env);

$client = new Client(environment: $env, auth: $auth);

$client->setRefreshToken($refreshToken);

$response = $client->execute(new GetInventoryItem('MyCustomSKU'));
```
