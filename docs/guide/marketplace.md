# Marketplace Account Deletion Notifications

eBay requires all marketplace applications to provide a **Marketplace Account Deletion** / 
**Closure endpoint**. This endpoint is used by eBay to notify your application when a user requests 
that their data must be deleted from your system.

The SDK provides a reference implementation that demonstrates how to:

- Validate the endpoint using the challenge verification process
- Verify signed notification requests using eBay’s Notification API public keys
- Dispatch Laravel events for valid deletion notifications

> [!IMPORTANT]
> eBay requires that all user data associated with the account must be removed from your system 
> after receiving this notification.

> [!CAUTION]
> The routes, controllers, and services provided by the SDK are intended as a reference 
> implementation. You are responsible for adapting the deletion workflow to your own application 
> architecture, data storage logic, and legal requirements.

Unlike Platform Notifications, Marketplace Account Deletion notifications are delivered as 
**signed JSON requests** and must pass signature validation before being processed.

More information about the Marketplace User Account Deletion process can be found on the 
[official eBay Guides](https://developer.ebay.com/develop/guides-v2/marketplace-user-account-deletion/marketplace-user-account-deletion).


## 1. Enable the Marketplace Deletion Route

The SDK includes an optional route that handles both:

- Endpoint challenge validation (GET)
- Notification delivery (POST)

The route is disabled by default and can be enabled via the `ebay-sdk.php` configuration file.

```php
return [
    'marketplace_deletion' => [
        'routes' => true,
        'middleware' => [],
        'token' => env('EBAY_MARKETPLACE_DELETION_VERIFICATION_TOKEN'),
        'endpoint' => env('EBAY_MARKETPLACE_DELETION_ENDPOINT'),
        'public_key_cache_ttl' => 3600,
    ]
];
```

The built-in route:

```php
use Illuminate\Support\Facades\Route;
use Rat\eBaySDK\Http\Controllers\MarketplaceDeletionController;

Route::prefix('ebay/marketplace')->name('ebay-sdk.')->group(function () {
    Route::match(['get', 'post'], '/deletion', [MarketplaceDeletionController::class, 'handle'])
        ->name('marketplace.deletion');
});
```

The endpoint must support both **GET** and **POST** requests.


## 2. Verification Token

eBay requires a verification token when registering the deletion endpoint. The SDK provides a 
console command to generate a valid token:

```sh
php artisan ebay:marketplace-token --write
```

This command will generate a token between 32–80 characters and store it in your `.env` file:

```
EBAY_MARKETPLACE_DELETION_VERIFICATION_TOKEN=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

You may also generate the token manually.


## 3. Endpoint Challenge Validation

When you register the endpoint in the eBay Developer Portal, eBay sends a GET request containing a 
`challenge_code`. The endpoint must respond with a JSON object containing a SHA-256 hash generated 
from:

```
challengeCode + verificationToken + endpoint
```

The SDK handles this automatically via:

`MarketplaceDeletionService->build($challengeCode)`

Example response:

```json
{
  "challengeResponse": "hash"
}
```

> [!NOTE]
> If the hash is incorrect, eBay will reject the endpoint.


## 4. Configure the Endpoint in the eBay Developer Portal

In your [eBay Developer Portal](https://developer.ebay.com/), navigate to:

**Alerts & Notifications** → **Marketplace Account Deletion**

Configure the "Marketplace account deletion notification endpoint", for example:

```
https://example.tld/ebay/marketplace/deletion
```

and set the same verification token you configured in `.env`.

> [!IMPORTANT]
> The endpoint URL must exactly match the value used when generating the
> challenge response. If your application runs behind a proxy or uses a custom
> domain setup, set the endpoint option explicitly in the config.

Example:

```php
'marketplace_deletion' => [
    'endpoint' => 'https://example.tld/ebay/marketplace/deletion',
]
```


## 5. Signature Verification

All deletion notifications are signed by eBay. Don't worry, the SDK automatically performs the 
required validation using `MarketplaceDeletionService->verify($payload, $signatureHeader, $headers)`.

1. Decode the `X-EBAY-SIGNATURE` header
2. Retrieve the public key from the Notification API ([GetPublicKey resource](/reference/selling-apis/notification-api.html#getpublickey))
3. Cache the key locally
4. Verify the signature using OpenSSL
5. Dispatch an event if valid

If verification fails, the endpoint returns *412 Precondition Failed*, if succeeds it returns 
*200 OK*. You normally do not need to modify the controller.


## 6. Handling Deletion Events

When a valid notification is received, the SDK dispatches the `MarketplaceAccountDeletionReceived` 
event.

Example listener:

```php
namespace App\Listeners;

use Rat\eBaySDK\Events\MarketplaceAccountDeletionReceived;

class HandleMarketplaceDeletion
{
    public function handle(MarketplaceAccountDeletionReceived $event): void
    {
        $payload = $event->payload;

        $username = $payload['notification']['data']['username'] ?? null;
        $userId = $payload['notification']['data']['userId'] ?? null;

        // Delete user data here
    }
}
```

Example Payload: 

```json
{
    "metadata": { "topic": "MARKETPLACE_ACCOUNT_DELETION", "schemaVersion": "1.0", "deprecated": false },
    "notification": {
        "notificationId": "49feeaeb-4982-42d9-a377-9645b8479411_33f7e043-fed8-442b-9d44-791923bd9a6d",
        "eventDate": "2021-03-19T20:43:59.462Z",
        "publishDate": "2021-03-19T20:43:59.679Z",
        "publishAttemptCount": 1,
        "data": {
            "username": "test_user",
            "userId": "ma8vp1jySJC",
            "eiasToken": "nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wJnY+gAZGEpwmdj6x9nY+seQ=="
        }
    }
}
```


## 7. Notes

- This endpoint must be publicly reachable
- It must not redirect
- It must not require authentication
- It must respond quickly
- It must return HTTP 200 for valid notifications

The SDK route is intended as a reference implementation. For production systems you may want to 
define your own route and controller.