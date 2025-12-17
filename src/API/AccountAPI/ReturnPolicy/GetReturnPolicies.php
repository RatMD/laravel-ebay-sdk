<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\ReturnPolicy;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\Marketplace;

/**
 * GET /return_policy
 * @see https://developer.ebay.com/api-docs/sell/account/resources/return_policy/methods/getReturnPolicies
 */
class GetReturnPolicies implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/return_policy';

    /**
     * Create a new instance.
     * @param Marketplace $marketplaceId
     * @return void
     */
    public function __construct(
        public readonly Marketplace $marketplaceId,
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
        return ['marketplace_id' => $this->marketplaceId];
    }
}
