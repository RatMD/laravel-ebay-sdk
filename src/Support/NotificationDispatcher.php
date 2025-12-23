<?php declare(strict_types=1);

namespace Rat\eBaySDK\Support;

use Illuminate\Support\Facades\Log;
use Rat\eBaySDK\Exceptions\InvalidNotificationPayloadException;
use Rat\eBaySDK\Exceptions\InvalidWebhookTokenException;
use Rat\eBaySDK\Jobs\DispatchNotificationJob;
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
    public function handleAsync(string $content, array $headers, ?string $token = null): void
    {
        $this->assertToken($token);
        $this->parseXmlContent($content, true);

        DispatchNotificationJob::dispatch($content, $headers, $token)
            ->onQueue(config('ebay-sdk.webhook.queue', 'default'));
    }

    /**
     *
     * @param string $content
     * @param array $headers
     * @param null|string $token
     * @return void
     */
    public function handle(string $content, array $headers, ?string $token = null): void
    {
        $this->assertToken($token);
        $payload = $this->parseXmlContent($content);

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

    /**
     * Validate Token
     * @param null|string $token
     * @return void
     */
    private function assertToken(?string $token = null): void
    {
        $known = config('ebay-sdk.webhook.token');
        if (!empty($known) && !hash_equals($known, $token ?? '')) {
            throw new InvalidWebhookTokenException;
        }
    }

    /**
     * Parse XML Content
     * @param string $content
     * @return array|true
     */
    private function parseXmlContent(string $content, bool $assertOnly = false): array|true
    {
        libxml_use_internal_errors(true);

        // Parse XML Content
        $xmlObject = simplexml_load_string($content, 'SimpleXMLElement', \LIBXML_NOCDATA);
        if ($xmlObject === false) {
            if ((bool) config('ebay-sdk.options.debug', false)) {
                Log::warning('Invalid XML received', [
                    'body' => $content,
                    'errors' => array_map(fn($e) => trim($e->message), libxml_get_errors()),
                ]);
            }
            libxml_clear_errors();
            throw new InvalidNotificationPayloadException;
        }

        // Travel XML Content
        $namespaces = $xmlObject->getNamespaces(true);
        if (empty($namespaces['soapenv'])) {
            throw new InvalidNotificationPayloadException;
        }
        if ($assertOnly) {
            return true;
        }

        // Find payload
        $body = $xmlObject->children($namespaces['soapenv'])->Body;
        $payload = [];
        foreach ($body->children('urn:ebay:apis:eBLBaseComponents') as $child) {
            $payload = json_decode(json_encode($child), true);
            break;
        }
        return $payload;
    }
}
