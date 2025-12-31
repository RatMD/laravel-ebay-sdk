<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\NotificationAPI\Subscription;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /subscription
 * @see https://developer.ebay.com/api-docs/sell/notification/resources/subscription/methods/getSubscriptions
 */
class GetSubscriptions implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/notification/v1/subscription';

    /**
     * Create a new instance.
     * @param null|string $continuationToken
     * @param int $limit
     * @return void
     */
    public function __construct(
        public readonly ?string $continuationToken = null,
        public readonly int $limit = 10
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::GET;
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
    public function query(): array
    {
        return [
            'continuation_token'    => $this->continuationToken,
            'limit'                 => $this->limit
        ];
    }
}
