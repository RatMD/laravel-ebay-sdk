<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\Subscription;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /subscription
 * @see https://developer.ebay.com/api-docs/sell/account/resources/subscription/methods/getSubscription
 */
class GetSubscription implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/subscription';

    /**
     * Create a new instance.
     * @param null|int $limit
     * @param null|string $continuationToken
     * @return void
     */
    public function __construct(
        public readonly ?int $limit = null,
        public readonly ?string $continuationToken = null,
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
        return ['limit' => $this->limit, 'continuation_token' => $this->continuationToken];
    }
}
