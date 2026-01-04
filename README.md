<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
</p>

<p align="center">
    <a href="https://laravel.com" target="_blank">Laravel</a> is an accessible and powerful <a href="http://php.net" target="_blank">PHP</a> web application framework with an expressive and elegant syntax.
</p>

---

# eBay SDK for Laravel

> [!CAUTION]
> This is an **experimental** eBay SDK under active development. Production use is discouraged.  
> Breaking changes may occur at any time, including minor and patch releases.

A Laravel SDK for integrating with eBay APIs, featuring OAuth authentication, webhook notifications, 
event handling, and practical utilities for common workflows. The SDK supports both Modern REST APIs 
and Traditional (XML/SOAP) eBay APIs and is designed to evolve alongside eBay’s platform.

- [Documentation Page](https://ebay-sdk.rat.md)
  - [Authorize with eBay](https://ebay-sdk.rat.md/guide/authorize.html)
  - [Receive eBay Notifications](https://ebay-sdk.rat.md/guide/webhook.html)

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
