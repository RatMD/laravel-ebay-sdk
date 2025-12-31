<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\ComplianceAPI\ListingViolation;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /listing_violation
 * @see https://developer.ebay.com/api-docs/sell/compliance/resources/listing_violation/methods/getListingViolations
 */
class GetListingViolations implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/compliance/v1/listing_violation';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param string $complianceType
     * @param null|string $listingId
     * @param null|string $filter
     * @param null|int $limit
     * @param null|int $offset
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly string $complianceType,
        public readonly ?string $listingId = null,
        public readonly ?string $filter = null,
        public readonly ?int $limit = 100,
        public readonly ?int $offset = 0,
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
            'compliance_type'   => $this->complianceType,
            'listing_id'        => $this->listingId,
            'filter'            => $this->filter,
            'limit'             => $this->limit,
            'offset'            => $this->offset,
        ];
    }

    /**
     * @inheritdoc
     */
    public function headers(): array
    {
        return [
            'X-EBAY-C-MARKETPLACE-ID'   => $this->marketplaceId
        ];
    }
}
