<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MetadataAPI\Marketplace;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Support\FilterQuery;

/**
 * GET /marketplace/{marketplaceId}/get_listing_structure_policies
 * @see https://developer.ebay.com/api-docs/sell/metadata/resources/marketplace/methods/getListingStructurePolicies
 */
class GetListingStructurePolicies implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/metadata/v1/marketplace/{marketplaceId}/get_listing_structure_policies';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param null|string|FilterQuery $filter
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly null|string|FilterQuery $filter = null,
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

    /**
     * @inheritdoc
     */
    public function query(): array
    {
        return [
            'filter' => $this->filter
        ];
    }
}
