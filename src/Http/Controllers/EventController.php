<?php declare(strict_types=1);

namespace Rat\eBaySDK\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Rat\eBaySDK\Events\GenericEvent;
use Rat\eBaySDK\Events\UnknownEvent;

class EventController extends Controller
{
    /**
     *
     * @param Request $request
     * @param string $token
     * @return Response
     */
    public function dispatch(Request $request, ?string $token = null): Response
    {
        $known = config('ebay-sdk.routes.webhook_token');
        if (!empty($known)) {
            if (!hash_equals($known, $token ?? '')) {
                return response('Forbidden', 403);
            }
        }

        // Fetch Data
        $headers = $request->headers->all();
        $content = $request->getContent();
        libxml_use_internal_errors(true);

        $xmlObject = simplexml_load_string($content, 'SimpleXMLElement', \LIBXML_NOCDATA);
        if ($xmlObject === false) {
            Log::warning('Invalid XML received', [
                'body' => $content,
                'errors' => array_map(fn($e) => trim($e->message), libxml_get_errors()),
            ]);
            libxml_clear_errors();
            return response('Invalid Request', 400);
        }

        // Parse data
        $namespaces = $xmlObject->getNamespaces(true);
        $body = $xmlObject->children($namespaces['soapenv'])->Body;
        $payload = [];
        foreach ($body->children('urn:ebay:apis:eBLBaseComponents') as $child) {
            $payload = json_decode(json_encode($child), true);
            break;
        }

        // Execute Event Action
        $eventName = $payload['NotificationEventName'];
        if ($eventName === '') {
            event(new UnknownEvent('[missing]', $headers, $payload, $content));
        } else {
            event(new GenericEvent($eventName, $headers, $payload, $content));

            $class = "Rat\\eBaySDK\\Events\\{$eventName}";
            if (class_exists($class)) {
                event(new $class($headers, $payload));
            } else {
                event(new UnknownEvent($eventName, $headers, $payload, $content));
            }
        }

        // Respond
        return response('', 200);
    }
}
