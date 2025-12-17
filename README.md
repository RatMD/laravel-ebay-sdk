Laravel eBay SDK
================

> [!CAUTION]
> This is an **experimental** eBay SDK under active development. Production use is discouraged.  
> Breaking changes may occur at any time, including minor and patch releases.

A work-in-progress Laravel SDK for integrating with eBay APIs. It provides OAuth authentication, 
webhook handling, event-based notifications, and typed clients for both Modern and Traditional 
(XML/SOAP) eBay APIs.

- [How to authorize with eBay](#how-to-authorize-with-ebay)
- [How to Listening for eBay Notifications](#how-to-listening-for-ebay-notifications)

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

### How to authorize with eBay

To use the eBay APIs, you must first authorize your application and obtain a refresh token. The SDK 
provides a ready-to-use OAuth flow to handle this process.

#### 1. Create and configure your eBay application

In the [eBay Developer Portal](https://developer.ebay.com), set up your application and define an 
`Auth Accepted Redirect URL`. You can use the default callback provided by the SDK 
`/ebay/oauth/callback` or define a custom callback (see `Rat\eBaySDK\Http\Controllers\AuthController`).


#### 2. Configure credentials and scopes

Add your eBay credentials and desired OAuth scopes on the `ebay-sdk.php` configuration file.

```php
'credentials' => [
    'client_id' => env('EBAY_CLIENT_ID', null),
    'client_secret' => env('EBAY_CLIENT_SECRET', null),
    'redirect_uri' => env('EBAY_REDIRECT_URI', null),
    'environment' => env('EBAY_API_ENVIRONMENT', 'sandbox'),
],
```

#### 3. Start the authorization flow

Visit the route `/ebay/oauth/authorize` to begin the OAuth authorization process (handled also by 
`Rat\eBaySDK\Http\Controllers\AuthController`). The URL is created by 
`Rat\eBaySDK\Authentication\OAuthAuthentication::getAuthorizationUrl()`.

#### 4. Store the refresh token

After a successful authorization, listen for the `Rat\eBaySDK\Events\OAuthSuccess` event and persist 
the provided `refresh_token` in your database. 

Example:

```php
namespace App\Listeners;

use App\Models\Setting;
use Rat\eBaySDK\Events\OAuthSuccess;

class StoreRefreshToken
{
    /**
     * Create the event listener.
     */
    public function __construct() {}

    /**
     * Handle the event.
     */
    public function handle(OAuthSuccess $event): void
    {
        Setting::setOption('ebay_refresh_token', $event->tokens['refresh_token']);
    }
}
```

#### 5. Configure the client

Configure the SDK client to use the stored `refresh_token`. If you are using traditional eBay APIs, 
also configure the required application keys.

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

### How to Listening for eBay Notifications

The SDK supports eBay **Platform Notifications (push)** and provides built-in request validation for
incoming webhook events.

Configure notifications in the eBay Developer Portal. Go to the "Alerts & Notifications" section in
your [eBay Developer Portal](https://developer.ebay.com). Select **Platform Notifications (push)** 
and configure your webhook endpoint, for example:

```
https://example.tld/ebay/notify
```

Make sure to enable the option: “My server is ready to receive events”.

To **Secure your webhook endpoint** the SDK supports an optional `webhook_token` in the 
`ebay-sdk.php` configuration file. This shared secret is used to validate incoming webhook requests 
from eBay. When a `webhook_token` is configured, include it in your webhook URL:

```
https://example.tld/ebay/notify/{webhook_token}
```

Incoming requests will be rejected if the token does not match the configured value.


## Testing

```bash
./vendor/bin/pest
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License
Published under MIT License \
Copyright © 2023 - 2025 Sam @ rat.md
