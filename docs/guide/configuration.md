# Configuration

The SDK ships with a configuration file that allows you to define your eBay OAuth credentials, 
client settings, webhook behavior, and OAuth scopes. This page describes each section of the 
configuration.

To publish the configuration file:

```sh
php artisan vendor:publish --tag=ebay-sdk-config
```

The configuration is located at:

```sh
config/ebay-sdk.php
```

## OAuth / API Credentials

These values configure the OAuth client used by the SDK to authenticate with eBay. These values must 
match the settings in the eBay Developer Portal, regarding the used Target environment, of course.

```php
'credentials' => [
    'client_id'     => env('EBAY_CLIENT_ID', null),
    'client_secret' => env('EBAY_CLIENT_SECRET', null),
    'redirect_uri'  => env('EBAY_REDIRECT_URI', null),
    'environment'   => env('EBAY_API_ENVIRONMENT', 'sandbox'),
],
```

| Key             | Value                                             | 
| --------------- | ------------------------------------------------- |
| `client_id`     | Your eBay App’s **Client ID** (App ID)            |
| `client_secret` | Your App’s **Client Secret** (Cert ID)            |
| `redirect_uri`  | Your configured Redirect URI or **RuName**        |
| `environment`   | Target API environment: `sandbox` or `production` |

## Client / Authentication Options

These options control request behavior, token caching, debugging, and localization.

```php
'options' => [
    'caching' => (bool) env('EBAY_CACHING', true),
    'debug'   => (bool) env('EBAY_DEBUG', false),
    'locale'  => env('EBAY_LOCALE', 'en-US'),
],
```

| Key         | Value                                              | 
| ----------- | -------------------------------------------------- |
| `caching`   | Enables automatic token caching                    |
| `debug`     | Logs request and response data                     |
| `locale`    | Sets the Content-Language header sent to eBay APIs |

## Traditional API (XML/SOAP) Settings

These settings apply only to eBay’s older “Traditional” APIs (XML/SOAP).

```php
'traditional' => [
    'compatibility_level' => '1395',
    'error_language'      => str_replace('-', '_', env('EBAY_LOCALE', 'en_US')),
    'error_handling'      => 'BestEffort',
    'site_id'             => 0,
    'warning_level'       => 'Low',
],
```

| Key                   | Value                                 | 
| --------------------- | ------------------------------------- |
| `compatibility_level` | eBay API schema version               |
| `error_language`      | Language for XML/SOAP error messages  |
| `error_handling`      | Partial-failure strategy              |
| `site_id`             | eBay marketplace ID                   |
| `warning_level`       | Verbosity for warning messages        |

## OAuth Route Configuration

This section controls whether the SDK should register its default OAuth routes and which middleware 
should be attached to them.

> [!CAUTION]
> The default OAuth routes are for demonstration only and should not be used in a productive 
> environment. We highly recommend your own setup to match your application’s security and UX 
> requirements.

```php
'oauth' => [
    'routes' => false,
    'middleware' => [
        'web',
        'auth',
        'throttle:30,1',
        //'can:request_token',
    ],
],
```

| Key           | Value                                                         | 
| ------------- | ------------------------------------------------------------- |
| `routes`      | Prevents the SDK from automatically registering OAuth routes. |
| `middleware`  | Middleware stack applied to the built-in OAuth routes.        |

## Webhook Configuration

Controls the webhook handling for the eBay Platform Notifications (push). 

> [!TIP]
> We strongly recommend enabling the `async` queue worker if your event listeners perform expensive 
> operations (such as additional HTTP or API calls). Otherwise, eBay may retry and resend the same 
> notification when your endpoint takes too long to return a response.

```php 
'webhook' => [
    'routes' => false,
    'token'  => env('EBAY_WEBHOOK_TOKEN', ''),
    'async'  => false,
    'queue'  => 'default',
],
```

| Key      | Purpose                                                            |
| -------- | ------------------------------------------------------------------ |
| `routes` | Enables the built-in webhook endpoint                              |
| `token`  | Optional shared secret for request validation                      |
| `async`  | Dispatch notifications via queue instead of synchronous processing |
| `queue`  | Queue name used when async mode is enabled                         |

## Authorization Code Grant Scopes (User Token)

These scopes are requested during the OAuth user authorization flow. Please refer to your eBay 
Developer Portal for the available scopes.

> [!TIP]
> The OAuth scopes define which permissions your application requests from the user during 
> authorization. Only request the scopes you actually need. Over-scoping increases the chance of 
> user rejection and review friction.

```php
'authorization_scopes' => [
    'https://api.ebay.com/oauth/api_scope',
    'https://api.ebay.com/oauth/api_scope/sell.account',
    'https://api.ebay.com/oauth/api_scope/sell.inventory',
],
```

## Client Credentials Grant Scopes (Application Token)

These scopes apply to application-based authentication (no user context). Please refer to your eBay 
Developer Portal for the available scopes.

```php
'credential_scopes' => [
    'https://api.ebay.com/oauth/api_scope',
],
```
