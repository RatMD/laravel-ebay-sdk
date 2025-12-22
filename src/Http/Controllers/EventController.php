<?php declare(strict_types=1);

namespace Rat\eBaySDK\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Rat\eBaySDK\Exceptions\InvalidNotificationPayloadException;
use Rat\eBaySDK\Exceptions\InvalidWebhookTokenException;
use Rat\eBaySDK\Support\NotificationDispatcher;

class EventController extends Controller
{
    /**
     *
     * @param NotificationDispatcher $dispatcher
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
            $this->dispatcher->handle(
                $request->getContent(),
                $request->headers->all(),
                $token
            );
        } catch (InvalidWebhookTokenException $exc) {
            return response('Forbidden', 403);
        } catch (InvalidNotificationPayloadException $exc) {
            return response('Invalid Payload', 400);
        }
        return response('', 200);
    }
}
