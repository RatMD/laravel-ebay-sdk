---
outline: deep
---

# Webhook Notifications using NotificationDispatcherService

The `NotificationDispatcherService` is responsible for receiving eBay API webhook notifications, 
validating them, and dispatching them as Laravel events. It acts as the bridge between eBay’s 
webhook system and Laravel’s event-driven architecture.

The service supports both synchronous and asynchronous processing and is designed to respond to eBay 
webhooks as fast as possible to prevent duplicate retries.

## Overview

- `\Rat\eBaySDK\Services\NotificationDispatcherService`
  Validates incoming webhook requests, parses the XML payload, and dispatches Laravel events.
- `\Rat\eBaySDK\Jobs\DispatchNotificationJob`
  Optional queue-based job that processes webhook notifications asynchronously.
- `\Rat\eBaySDK\Http\Controllers\EventController`
  A ready-to-use controller that receives webhook requests from eBay and forwards them to the dispatcher.
- `\Rat\eBaySDK\Notifications\*`
  Event classes representing individual eBay notification types.

## Requirements

1. You must expose an HTTP endpoint that eBay can call. Read [Receive eBay Notifications](/guide/webhook)
   for more details.
2. eBay expects a very fast HTTP 200 response, and if processing takes too long, eBay will retry the 
   webhook. Thus, asynchronous handling is strongly recommended, using a working and running 
   Laravel queue worker.

## Usage

Set-Up a Controller (or use the SDK-one). Read more on the [Receive eBay Notifications](/guide/webhook)
documentation page.

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
        private readonly NotificationDispatcher $dispatcher
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