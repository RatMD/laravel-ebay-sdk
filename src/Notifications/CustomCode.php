<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

/**
 * Reserved for future use.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class CustomCode
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly array $headers,
        public readonly array $payload,
	) { }
}
