<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\Ad;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /ad_campaign/{campaignId}/get_ads_by_inventory_reference
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/ad/methods/getAdsByInventoryReference
 */
class GetAdsByInventoryReference implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/ad_campaign/{campaignId}/get_ads_by_inventory_reference';

    /**
     * Create a new instance.
     * @param string $campaignId
     * @param string $inventoryReferenceType
     * @param string $inventoryReferenceId
     * @return void
     */
    public function __construct(
        public readonly string $campaignId,
        public readonly string $inventoryReferenceType,
        public readonly string $inventoryReferenceId,
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
    public function params(): array
    {
        return ['campaignId' => $this->campaignId];
    }

    /**
     * @inheritdoc
     */
    public function query(): array
    {
        return [
            'inventory_reference_type'  => $this->inventoryReferenceType,
            'inventory_reference_td'    => $this->inventoryReferenceId,
        ];
    }
}
