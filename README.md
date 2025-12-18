Laravel eBay SDK
================

> [!CAUTION]
> This is an **experimental** eBay SDK under active development. Production use is discouraged.  
> Breaking changes may occur at any time, including minor and patch releases.

A work-in-progress Laravel SDK for integrating with eBay APIs. It provides OAuth authentication, 
webhook handling, event-based notifications, and typed clients for both Modern and Traditional 
(XML/SOAP) eBay APIs.

- [Documentation Page](https://ratmd.github.io/laravel-ebay-sdk)
- [How to authorize with eBay](http://localhost:5173/laravel-ebay-sdk/guide/authorize.html)
- [How to Listening for eBay Notifications](http://localhost:5173/laravel-ebay-sdk/guide/webhook.html)

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

[Visit the Documentation Page for more details](https://ratmd.github.io/laravel-ebay-sdk)

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItem\GetInventoryItem;
use Rat\eBaySDK\Client;

$client = new Client();
$client->setRefreshToken($refreshToken);
$response = $client->execute(new GetInventoryItem('MyCustomSKU'));
```

## Testing

```bash
./vendor/bin/pest
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License
Published under MIT License \
Copyright © 2024 - 2026 Sam @ rat.md

This software is not an official eBay product and is not associated with, sponsored by, or endorsed 
by eBay Inc.
