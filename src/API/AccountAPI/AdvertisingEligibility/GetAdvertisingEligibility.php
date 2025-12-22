<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\AdvertisingEligibility;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\MarketplaceId;

/**
 * GET /advertising_eligibility
 * @see https://developer.ebay.com/api-docs/sell/account/resources/advertising_eligibility/methods/getAdvertisingEligibility
 */
class GetAdvertisingEligibility implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/advertising_eligibility';

    /**
     * Create a new instance.
     * @param MarketplaceId $marketplaceId
     * @param ?string $programTypes
     * @return void
     */
    public function __construct(
        public readonly MarketplaceId $marketplaceId,
        public readonly ?string $programTypes = null
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
    public function headers(): array
    {
        return [
            'X-EBAY-C-MARKETPLACE-ID' => $this->marketplaceId->value
        ];
    }

    /**
     * @inheritdoc
     */
    public function query(): array
    {
        return ['marketplace_id' => $this->marketplaceId, 'program_types' => $this->programTypes];
    }
}
