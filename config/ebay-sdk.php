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
     | - environment: The desired environment 'sandbox' or 'production'.
     |
     */
    'credentials' => [
        'client_id' => env('EBAY_CLIENT_ID', null),
        'client_secret' => env('EBAY_CLIENT_SECRET', null),
        'redirect_uri' => env('EBAY_REDIRECT_URI', null),
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
     | - compatibility_level: API schema version used for requests/responses
     | - error_language: Language/locale for error messages returned by eBay
     | - error_handling: Strategy for handling partial failures
     | - site_id: The desired eBay marketplace ID
     | - warning_level: Controls verbosity of warning messages in API responses
     |
     */
    'traditional' => [
        'compatibility_level' => '1395',
        'error_language' => str_replace('-', '_', env('EBAY_LOCALE', 'en_US')),
        'error_handling' => 'BestEffort',
        'site_id' => 0,
        'warning_level' => 'Low'
    ],

    'routes' => [
        /*
         |----------------------------------------------------------------------
         | Enable Package Routes
         |----------------------------------------------------------------------
         |
         | Toggle registration of the package's default routes.
         |
         */
        'enabled' => true,

        /*
         |----------------------------------------------------------------------
         | Webhook Token to improve Spoofing
         |----------------------------------------------------------------------
         |
         | Shared secret used to validate incoming eBay webhook requests. The
         | token should be part of the webhook URL and helps prevent
         | unauthorized or spoofed requests from being accepted by the app.
         |
         */
        'webhook_token' => env('EBAY_WEBHOOK_TOKEN', ''),
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
