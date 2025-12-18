<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MetadataAPI\ShippingMarketplace;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /shipping/marketplace/{marketplaceId}/get_shipping_locations
 * @see https://developer.ebay.com/api-docs/sell/metadata/resources/shipping:marketplace/methods/getShippingLocations
 */
class GetShippingLocations implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/metadata/v1/shipping/marketplace/{marketplaceId}/get_shipping_locations';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
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
        return [
            'marketplaceId' => $this->marketplaceId
        ];
    }
}
