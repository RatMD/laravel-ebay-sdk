Laravel eBay SDK
================

_Coming Soon_

## Features

- Supports Modern and Traditional APIs (using XML).
- Covers all notification events.

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
$client = new Client();
$client->setRefreshToken();
$client->execute();

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
