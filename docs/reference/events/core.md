---
outline: deep
---
# Core Package Events

The SDK exposes several events that allow you to hook into request execution, OAuth flows, and 
incoming eBay notifications.

## APIRequest

Dispatched immediately before an API request is sent to eBay. This event can be used for logging, 
debugging, request inspection, or custom instrumentation.

```php
namespace App\Listeners;

use Rat\eBaySDK\Events\APIRequest;

class YourEventListener
{
    public function handle(APIRequest $event): void
    {
		$event->request;            // PSR-7 Request Interface
		(array) $event->options;    // Guzzle Request Options
    }
}
```

## APIResponse

Dispatched after an API response has been received from eBay. This event is useful for response 
logging, debugging, metrics, or error inspection.

```php
namespace App\Listeners;

use Rat\eBaySDK\Events\APIResponse;

class YourEventListener
{
    public function handle(APIResponse $event): void
    {
		$event->request;            // PSR-7 Request Interface
		(array) $event->options;    // Guzzle Request Options
		$event->response;           // PSR-7 Response Interface
    }
}
```

## MarketplaceAccountDeletionReceived

Dispatched when a valid **Marketplace Account Deletion / Closure notification** has been received
from eBay. This event is triggered after the SDK has successfully:

- verified the request signature using eBay’s public key
- validated the notification payload
- confirmed that the request originated from eBay

The event provides access to the decoded JSON payload, the request headers, and the raw request 
body. You should listen to this event to remove stored user data as required by eBay’s data 
protection and account deletion policies.

```php
namespace App\Listeners;

use Rat\eBaySDK\Events\MarketplaceAccountDeletionReceived;

class YourEventListener
{
    public function handle(MarketplaceAccountDeletionReceived $event): void
    {
        (array) $event->payload; // Decoded JSON payload
        (array) $event->headers; // Request headers
        (string) $event->raw;    // Raw request body

        // Example:
        $username = $event->payload['notification']['data']['username'] ?? null;
        $userId = $event->payload['notification']['data']['userId'] ?? null;

        // Delete user data here
    }
}
```

Example payload: 

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


## OAuthFailure

Dispatched when the OAuth authorization process fails or is aborted. This event does not provide 
additional context and serves as a simple failure signal.

Typical use cases include logging, user-facing error handling, or restarting the authorization flow.

```php
namespace App\Listeners;

use Rat\eBaySDK\Events\OAuthFailure;

class YourEventListener
{
    public function handle(OAuthFailure $event): void
    {
        // Provides no context values
    }
}
```

## OAuthSuccess

Dispatched after a successful OAuth authorization flow. The event contains the full token response 
returned by eBay, including the refresh_token.

This event is typically used to persist the refresh token for later API access.

Token payload example:
``` 
$event->tokens = [
    "access_token"              => "<your-access-token>",
    "expires_in"                => 7200,
    "refresh_token"             => "<your-refresh-token>",
    "refresh_token_expires_in"  => 47304000,
    "token_type"                => "User Access Token",
];
```

```php
namespace App\Listeners;

use Rat\eBaySDK\Events\OAuthSuccess;

class YourEventListener
{
    public function handle(OAuthSuccess $event): void
    {
        (array) $event->tokens;     // The eBay OAuth tokens response

        // Example Usage
        Setting::setOption('refresh_token', $event->tokens['refresh_token']);
    }
}
```

## GenericNotification

Dispatched for incoming eBay webhook notifications where the event type is recognized, is dispatched 
before the dedicated notification class exists.

This event provides access to both the parsed payload and the raw XML body, allowing custom 
handling of unsupported or less common notification types.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\GenericNotification;

class YourEventListener
{
    public function handle(GenericNotification $event): void
    {
        (string) $event->eventName; // Event name
		(array) $event->headers;    // Request Headers
		(array) $event->payload;    // Parsed XML Body
        (string) $event->raw;       // Raw XML Body
    }
}
```

## UnknownNotification

Dispatched when an incoming webhook notification cannot be identified or parsed correctly or no 
dedicated notification class exists.

This event provides access to both the parsed payload and the raw XML body, allowing custom 
handling of unsupported or less common notification types. It is primarily intended for debugging, 
logging, and future-proofing against new or malformed eBay notification types.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\UnknownNotification;

class YourEventListener
{
    public function handle(UnknownNotification $event): void
    {
        (string) $event->eventName; // Event name or [missing]
		(array) $event->headers;    // Request Headers
		(array) $event->payload;    // Parsed XML Body
        (string) $event->raw;       // Raw XML Body
    }
}
```