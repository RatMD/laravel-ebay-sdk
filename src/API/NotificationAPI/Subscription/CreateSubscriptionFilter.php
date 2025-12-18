<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\NotificationAPI\Subscription;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /subscription/{subscriptionId}/filter
 * @see https://developer.ebay.com/api-docs/sell/notification/resources/subscription/methods/createSubscriptionFilter
 */
class CreateSubscriptionFilter implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/notification/v1/subscription/{subscriptionId}/filter';

    /**
     * Create a new instance.
     * @param string $subscriptionId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $subscriptionId,
        public readonly array $payload
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::POST;
    }

    /**
     * @inheritdoc
     */
    public function path(): string
    {
        return self::PATH;
    }

    /**
     * @inheritdoc
     */
    public function params(): array
    {
        return ['subscriptionId' => $this->subscriptionId];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }
}
