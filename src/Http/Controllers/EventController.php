<?php declare(strict_types=1);

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
