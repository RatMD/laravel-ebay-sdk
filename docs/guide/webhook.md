# Receive eBay Notifications

The SDK supports **eBay Platform Notifications** (push) and provides built-in helpers for validating 
and processing incoming webhook events.

eBay sends webhook notifications as SOAP/XML payloads. The SDK includes a reference implementation 
that:

- Validates incoming webhook requests
- Parses the SOAP/XML payload
- Dispatches framework events based on the notification type

## 1. Setup Laravel Route & Controller

The SDK provides an example webhook route that demonstrates how incoming notifications can be 
handled. However, this route is disabled by default and supposed for demonstration only. You can 
still enable them via the `ebay-sdk.php` configuration file:

```php
return [
    'webook' => [
        'routes' => false,
        'token' => env('EBAY_WEBHOOK_TOKEN', ''),
        'async' => false,
        'queue' => 'default',
    ]
];
```

The single route:

```php
use Illuminate\Support\Facades\Route;
use Rat\eBaySDK\Http\Controllers\EventController;

Route::prefix('ebay')->name('ebay-sdk.')->group(function () {
    Route::post('/notify/{token?}', [EventController::class, 'dispatch'])
        ->name('webhook.notify');
});
```

The `EventController` shown below can be used as-is, since it contains only minimal logic. However, 
we strongly recommend using the provided `NotificationDispatcherService`, as it handles all XML
parsing, event dispatching, and optional queue-based processing required for proper webhook 
integration.

```php
namespace Rat\eBaySDK\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Rat\eBaySDK\Exceptions\InvalidNotificationPayloadException;
use Rat\eBaySDK\Exceptions\InvalidWebhookTokenException;
use Rat\eBaySDK\Services\NotificationDispatcherService;

class EventController extends Controller
{
    /**
     *
     * @param NotificationDispatcherService $dispatcher
     * @return void
     */
    public function __construct(
        private readonly NotificationDispatcherService $dispatcher
    ) {}

    /**
     *
     * @param Request $request
     * @param ?string $token
     * @return Response
     */
    public function dispatch(Request $request, ?string $token = null): Response
    {
        try {
            $async = (bool) config('ebay-sdk.webhook.async', false);

            if ($async) {
                $this->dispatcher->handleAsync(
                    $request->getContent(),
                    $request->headers->all(),
                    $token
                );
            } else {
                $this->dispatcher->handle(
                    $request->getContent(),
                    $request->headers->all(),
                    $token
                );
            }
        } catch (InvalidWebhookTokenException) {
            return response('Forbidden', 403);
        } catch (InvalidNotificationPayloadException) {
            return response('Invalid Payload', 400);
        }

        return response('', 200);
    }
}
```

## 2. Configure Notifications in the eBay Developer Portal

In your [eBay Developer Portal](https://developer.ebay.com/), navigate to:

**Alerts & Notifications** → **Platform Notifications (push)**

Configure your webhook endpoint URL, see example below, and ensure that the option 
"**My server is ready to receive events**" is enabled, otherwise eBay will not deliver any 
notification.

```
https://example.tld/ebay/notify
```



## 3. Secure the Webhook Endpoint (Optional but Recommended)

To protect your webhook endpoint from unauthorized requests, the SDK supports an optional webhook 
token. This webhook token can be set as shared secret in your environment file or your `ebay-sdk.php` 
configuration file respectively:

```php{4}
return [
    'webook' => [
        'routes' => false,
        'token' => env('EBAY_WEBHOOK_TOKEN', ''),
        'async' => false,
        'queue' => 'default',
    ]
];
```

If a webhook_token is configured, include it in your webhook URL on your [eBay Developer Portal](https://developer.ebay.com/).
Incoming requests will be rejected with a **HTTP 403** response if the provided token does not match 
the configured value.

```
https://example.tld/ebay/notify/{webhook_token}
```

## 4. Listen for Events

Once your webhook endpoint is configured and receiving requests, you can start listening for 
notification events using Laravel’s event system.

The SDK dispatches two generic notification events by default:

- `GenericNotification`  
Dispatched for every incoming notification where `NotificationEventName` is present and non-empty.
- `UnknownNotification`  
Dispatched when the notification type is unknown to the SDK or when `NotificationEventName` is missing or empty.

In addition to these generic events, the SDK also dispatches specific notification events for 
supported eBay platform notifications. A full list of available notification events can be found 
[here](/reference/events/ebay).

**Example Listener (GenericNotification)**

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

**Example Listener (AskSellerQuestion)**

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\AskSellerQuestion;

class YourEventListener
{
    public function handle(AskSellerQuestion $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```