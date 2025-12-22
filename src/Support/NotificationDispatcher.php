<?php declare(strict_types=1);

namespace Rat\eBaySDK\Support;

use Illuminate\Support\Facades\Log;
use Rat\eBaySDK\Exceptions\InvalidNotificationPayloadException;
use Rat\eBaySDK\Exceptions\InvalidWebhookTokenException;
use Rat\eBaySDK\Notifications\GenericNotification;
use Rat\eBaySDK\Notifications\UnknownNotification;

class NotificationDispatcher
{
    /**
     *
     * @param string $content
     * @param array $headers
     * @param null|string $token
     * @return void
     */
    public function handle(string $content, array $headers, ?string $token = null): void
    {
        $known = config('ebay-sdk.routes.webhook_token');
        if (!empty($known)) {
            if (!hash_equals($known, $token ?? '')) {
                throw new InvalidWebhookTokenException;
            }
        }

        // Parse Data
        libxml_use_internal_errors(true);

        $xmlObject = simplexml_load_string($content, 'SimpleXMLElement', \LIBXML_NOCDATA);
        if ($xmlObject === false) {
            if (app()->hasDebugModeEnabled()) {
                Log::warning('Invalid XML received', [
                    'body' => $content,
                    'errors' => array_map(fn($e) => trim($e->message), libxml_get_errors()),
                ]);
            }
            libxml_clear_errors();
            throw new InvalidNotificationPayloadException;
        }

        // Travel data
        $namespaces = $xmlObject->getNamespaces(true);
        if (empty($namespaces['soapenv'])) {
            throw new InvalidNotificationPayloadException;
        }
        $body = $xmlObject->children($namespaces['soapenv'])->Body;
        $payload = [];
        foreach ($body->children('urn:ebay:apis:eBLBaseComponents') as $child) {
            $payload = json_decode(json_encode($child), true);
            break;
        }

        // Execute Event Action
        $eventName = $payload['NotificationEventName'] ?? '';
        if ($eventName === '') {
            event(new UnknownNotification('[missing]', $headers, $payload, $content));
        } else {
            event(new GenericNotification($eventName, $headers, $payload, $content));

            $class = "Rat\\eBaySDK\\Notifications\\{$eventName}";
            if (class_exists($class)) {
                event(new $class($headers, $payload));
            } else {
                event(new UnknownNotification($eventName, $headers, $payload, $content));
            }
        }
    }
}
