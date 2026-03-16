<?php

return [
    /*
     |--------------------------------------------------------------------------
     | eBay OAuth / API Credentials
     |--------------------------------------------------------------------------
     |
     | - client_id: Your eBay App's Client ID (App ID).
     | - client_secret: Your eBay App's Client Secret (Cert ID).
     | - redirect_uri: Your eBay App's Redirect URI or RuName.
     | - dev_id: Your eBay App's Dev ID (for Traditional API usage only).
     | - environment: The desired environment 'sandbox' or 'production'.
     |
     */
    'credentials' => [
        'client_id' => env('EBAY_CLIENT_ID', null),
        'client_secret' => env('EBAY_CLIENT_SECRET', null),
        'redirect_uri' => env('EBAY_REDIRECT_URI', null),
        'dev_id' => env('EBAY_DEV_ID', null),
        'environment' => env('EBAY_API_ENVIRONMENT', 'sandbox'),
    ],

    /*
     |--------------------------------------------------------------------------
     | eBay Client / Authentication Settings
     |--------------------------------------------------------------------------
     |
     | - caching: Determines whether to cache access tokens or not.
     | - debug: Whether to debug all requests or not.
     | - locale: Specify the Content-Language / locale value on requests.
     |
     */
    'options' => [
        'caching' => (bool) env('EBAY_CACHING', true),
        'debug' => (bool) env('EBAY_DEBUG', false),
        'locale' => env('EBAY_LOCALE', 'en-US'),
    ],

    /*
     |--------------------------------------------------------------------------
     | Default Traditional API Settings
     |--------------------------------------------------------------------------
     |
     | Default configuration for eBay Traditional (XML/SOAP) API calls. These
     | values are used unless explicitly overridden per request.
     |
     | - compatibility_level: API schema version used for requests/responses.
     | - error_language: Language/locale for error messages returned by eBay.
     | - error_handling: Strategy for handling partial failures.
     | - site_id: The desired eBay marketplace ID.
     | - warning_level: Controls verbosity of warning messages in API responses.
     |
     */
    'traditional' => [
        'compatibility_level' => env('EBAY_COMPATIBILITY_LEVEL', '1395'),
        'error_language' => str_replace('-', '_', env('EBAY_LOCALE', 'en_US')),
        'error_handling' => 'BestEffort',
        'site_id' => env('EBAY_SITE_ID', 0),
        'warning_level' => 'Low'
    ],

    'oauth' => [
        /*
         |----------------------------------------------------------------------
         | Enable OAuth Package Routes
         |----------------------------------------------------------------------
         |
         | Determines whether the package should register its default OAuth
         | routes. It is recommended to declare your own routes.
         |
         */
        'routes' => false,

        /*
         |----------------------------------------------------------------------
         | Additional Middleware
         |----------------------------------------------------------------------
         |
         | Extra middleware applied to the package’s built-in OAuth routes.
         | These will only take effect when OAuth routes are enabled.
         |
         */
        'middleware' => [
            'web',
            'auth',
            'throttle:30,1',
            //'can:request_token',
        ]
    ],

    'marketplace_deletion' => [
        /*
        |----------------------------------------------------------------------
        | Enable Marketplace Account Deletion Routes
        |----------------------------------------------------------------------
        |
        | Determines whether the package should register its default endpoint
        | for eBay Marketplace Account Deletion / Closure notifications.
        |
        */
        'routes' => false,

        /*
        |----------------------------------------------------------------------
        | Additional Middleware
        |----------------------------------------------------------------------
        |
        | Extra middleware applied to the package’s built-in marketplace
        | deletion endpoint. These will only take effect when the package
        | routes are enabled.
        |
        */
        'middleware' => [
            'web'
        ],

        /*
        |----------------------------------------------------------------------
        | Marketplace Deletion Verification Token
        |----------------------------------------------------------------------
        |
        | Shared verification token used for endpoint validation during the
        | marketplace account deletion setup on eBay’s side.
        |
        */
        'token' => env('EBAY_MARKETPLACE_DELETION_VERIFICATION_TOKEN', null),

        /*
        |----------------------------------------------------------------------
        | Marketplace Deletion Endpoint URL
        |----------------------------------------------------------------------
        |
        | Absolute public URL of your marketplace account deletion endpoint.
        |
        | This value is used during eBay’s endpoint challenge validation and
        | must exactly match the endpoint URL registered in the eBay Developer
        | Portal, otherwise the challenge verification will fail.
        |
        | If left null, the package may fall back to generating the endpoint
        | URL from the named route, for example via:
        |
        | route('ebay-sdk.marketplace.deletion', absolute: true)
        |
        | Using an explicit value is recommended when your application runs
        | behind proxies, load balancers, tunnels, or a non-trivial APP_URL
        | setup.
        |
        */
        'endpoint' => env('EBAY_MARKETPLACE_DELETION_ENDPOINT', null),

        /*
        |----------------------------------------------------------------------
        | Public Key Cache TTL
        |----------------------------------------------------------------------
        |
        | Number of seconds the retrieved eBay notification public keys should
        | remain cached locally.
        |
        | These keys are used to verify signed marketplace account deletion
        | notifications before the payload is accepted and processed.
        |
        */
        'public_key_cache_ttl' => 3600,
    ],

    'webhook' => [
        /*
         |----------------------------------------------------------------------
         | Enable Webhook Notification Routes
         |----------------------------------------------------------------------
         |
         | Controls whether the package should register its default webhook
         | endpoint. Disable this if you prefer to define a custom route.
         |
         */
        'routes' => false,

        /*
         |----------------------------------------------------------------------
         | Webhook Token
         |----------------------------------------------------------------------
         |
         | Shared secret for validating incoming eBay notifications. The token
         | should be part of the webhook URL and helps prevent spoofed requests.
         |
         */
        'token' => env('EBAY_WEBHOOK_TOKEN', ''),

        /*
         |----------------------------------------------------------------------
         | Asynchronous Processing
         |----------------------------------------------------------------------
         |
         | When enabled, incoming notifications are validated and then queued
         | for background processing instead of being handled synchronously.
         |
         */
        'async' => false,

        /*
         |----------------------------------------------------------------------
         | Queue Name
         |----------------------------------------------------------------------
         |
         | Defines which queue should be used when asynchronous processing
         | is enabled. This allows separation from other job pipelines.
         |
         */
        'queue' => 'default',
    ],

    /*
     |--------------------------------------------------------------------------
     | Authorization Code Grant Scopes (User Token)
     |--------------------------------------------------------------------------
     |
     | The desired OAuth scopes requested during the authorization code flow.
     | These scopes determine what actions the signed-in user authorizes
     | your application to perform on their behalf.
     |
     | Available Scopes as of 2025/12/16:
     |
     | api_scope
     |     -> View public data from eBay
     | api_scope/commerce.feedback
     |     -> Allows access to Feedback APIs.
     | api_scope/commerce.identity.readonly
     |     -> View a user's basic information, such as username or business
     |        account details, from their eBay member account
     | api_scope/commerce.message
     |     -> Allows access to eBay Message APIs.
     | api_scope/commerce.notification.subscription
     |     -> View and manage your event notification subscriptions
     | api_scope/commerce.notification.subscription.readonly
     |     -> View your event notification subscriptions
     | api_scope/commerce.shipping
     |     -> View and manage shipping information
     | api_scope/commerce.vero
     |     -> Allows access to APIs that are related to eBay's Verified Rights
     |        Owner (VeRO) program.
     | api_scope/sell.account
     |     -> View and manage your account settings
     | api_scope/sell.account.readonly
     |     -> View your account settings
     | api_scope/sell.analytics.readonly
     |     -> View your selling analytics data, such as performance reports
     | api_scope/sell.finances
     |     -> View and manage your payment and order information to display this
     |        information to you and allow you to initiate refunds using the
     |        third party application
     | api_scope/sell.fulfillment
     |     -> View and manage your order fulfillments
     | api_scope/sell.fulfillment.readonly
     |     -> View your order fulfillments
     | api_scope/sell.inventory
     |     -> View and manage your inventory and offers
     | api_scope/sell.inventory.mapping
     |     -> Enables applications to manage and enhance inventory listings
     |        through the Inventory Mapping Public API.
     | api_scope/sell.inventory.readonly
     |     -> View your inventory and offers
     | api_scope/sell.marketing
     |     -> View and manage your eBay marketing activities, such as ad
     |        campaigns and listing promotions
     | api_scope/sell.marketing.readonly
     |     -> View your eBay marketing activities, such as ad campaigns and
     |        listing promotions
     | api_scope/sell.payment.dispute
     |     -> View and manage disputes and related details (including payment
     |        and order information)
     | api_scope/sell.reputation
     |     -> View and manage your reputation data, such as feedback.
     | api_scope/sell.reputation.readonly
     |     -> View your reputation data, such as feedback.
     | api_scope/sell.stores
     |     -> View and manage eBay stores
     | api_scope/sell.stores.readonly
     |     -> View eBay stores
     | scope/sell.edelivery
     |     -> Allows access to eDelivery International Shipping APIs.
     |
     */
    'authorization_scopes' => [
        'https://api.ebay.com/oauth/api_scope',
        //'https://api.ebay.com/oauth/api_scope/commerce.feedback',
        //'https://api.ebay.com/oauth/api_scope/commerce.identity.readonly',
        //'https://api.ebay.com/oauth/api_scope/commerce.message',
        //'https://api.ebay.com/oauth/api_scope/commerce.notification.subscription',
        //'https://api.ebay.com/oauth/api_scope/commerce.notification.subscription.readonly',
        //'https://api.ebay.com/oauth/api_scope/commerce.shipping',
        //'https://api.ebay.com/oauth/api_scope/commerce.vero',
        'https://api.ebay.com/oauth/api_scope/sell.account',
        //'https://api.ebay.com/oauth/api_scope/sell.account.readonly',
        //'https://api.ebay.com/oauth/api_scope/sell.analytics.readonly',
        //'https://api.ebay.com/oauth/api_scope/sell.finances',
        //'https://api.ebay.com/oauth/api_scope/sell.fulfillment',
        //'https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly',
        'https://api.ebay.com/oauth/api_scope/sell.inventory',
        //'https://api.ebay.com/oauth/api_scope/sell.inventory.mapping',
        //'https://api.ebay.com/oauth/api_scope/sell.inventory.readonly',
        //'https://api.ebay.com/oauth/api_scope/sell.marketing',
        //'https://api.ebay.com/oauth/api_scope/sell.marketing.readonly',
        //'https://api.ebay.com/oauth/api_scope/sell.payment.dispute',
        //'https://api.ebay.com/oauth/api_scope/sell.reputation',
        //'https://api.ebay.com/oauth/api_scope/sell.reputation.readonly',
        //'https://api.ebay.com/oauth/api_scope/sell.stores',
        //'https://api.ebay.com/oauth/api_scope/sell.stores.readonly',
        //'https://api.ebay.com/oauth/scope/sell.edelivery',
    ],

    /*
     |--------------------------------------------------------------------------
     | Client Credentials Grant Scopes (Application Token)
     |--------------------------------------------------------------------------
     |
     | The desired OAuth scopes used for the client credentials flow. This
     | creates an application access token (no user context).
     |
     | Available Scopes as of 2025/12/16:
     |
     | api_scope
     |     -> View public data from eBay
     | api_scope/commerce.feedback.readonly
     |     -> Allows readonly access to Feedback APIs.
     |
     */
    'credential_scopes' => [
        'https://api.ebay.com/oauth/api_scope',
        //'https://api.ebay.com/oauth/api_scope/commerce.feedback.readonly',
    ],
];
