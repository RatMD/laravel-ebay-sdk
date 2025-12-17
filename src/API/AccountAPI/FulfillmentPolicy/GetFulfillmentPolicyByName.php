<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\FulfillmentPolicy;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\Marketplace;

/**
 * GET /fulfillment_policy/get_by_policy_name
 * @see https://developer.ebay.com/api-docs/sell/account/resources/fulfillment_policy/methods/getFulfillmentPolicyByName
 */
class GetFulfillmentPolicyByName implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/fulfillment_policy/get_by_policy_name';

    /**
     * Create a new instance.
     * @param Marketplace $marketplaceId
     * @param string $name
     * @return void
     */
    public function __construct(
        public readonly Marketplace $marketplaceId,
        public readonly string $name,
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
        return ['marketplace_id' => $this->marketplaceId, 'name' => $this->name];
    }
}
