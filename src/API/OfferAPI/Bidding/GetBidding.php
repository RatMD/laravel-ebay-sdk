<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\OfferAPI\Bidding;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /bidding/{itemId}
 * @see https://developer.ebay.com/api-docs/buy/offer/resources/bidding/methods/getBidding
 */
class GetBidding implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/marketing/v1_beta/bidding/{itemId}';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param string $itemId
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly string $itemId,
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
        return ['itemId' => $this->itemId];
    }

    /**
     * @inheritdoc
     */
    public function headers(): array
    {
        return ['X-EBAY-C-MARKETPLACE-ID' => $this->marketplaceId];
    }
}
