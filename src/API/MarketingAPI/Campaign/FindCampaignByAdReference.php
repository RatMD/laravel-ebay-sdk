<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\Campaign;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /ad_campaign/find_campaign_by_ad_reference
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/campaign/methods/findCampaignByAdReference
 */
class FindCampaignByAdReference implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/ad_campaign/find_campaign_by_ad_reference';

    /**
     * Create a new instance.
     * @param null|string $listingId
     * @param null|string $inventoryReferenceId
     * @param null|string $inventoryReferenceType
     * @return void
     */
    public function __construct(
        public readonly ?string $listingId = null,
        public readonly ?string $inventoryReferenceId = null,
        public readonly ?string $inventoryReferenceType = null,
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
            'listing_id'                => $this->listingId,
            'inventory_reference_id'    => $this->inventoryReferenceId,
            'inventory_reference_type'  => $this->inventoryReferenceType,
        ];
    }
}
