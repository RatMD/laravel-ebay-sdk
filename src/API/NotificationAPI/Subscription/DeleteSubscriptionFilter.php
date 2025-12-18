<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\NotificationAPI\Subscription;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * DELETE /subscription/{subscriptionId}/filter/{filterId}
 * @see https://developer.ebay.com/api-docs/sell/notification/resources/subscription/methods/deleteSubscriptionFilter
 */
class DeleteSubscriptionFilter implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/notification/v1/subscription/{subscriptionId}/filter/{filterId}';

    /**
     * Create a new instance.
     * @param string $subscriptionId
     * @param string $filterId
     * @return void
     */
    public function __construct(
        public readonly string $subscriptionId,
        public readonly string $filterId
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::DELETE;
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
        return [
            'subscriptionId'   => $this->subscriptionId,
            'filterId'         => $this->filterId
        ];
    }
}
