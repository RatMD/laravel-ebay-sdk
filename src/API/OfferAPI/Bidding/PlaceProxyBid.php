<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\OfferAPI\Bidding;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /bidding/{itemId}/place_proxy_bid
 * @see https://developer.ebay.com/api-docs/buy/offer/resources/bidding/methods/placeProxyBid
 */
class PlaceProxyBid implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/marketing/v1_beta/bidding/{itemId}/place_proxy_bid';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param string $itemId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly string $itemId,
        public readonly array $payload,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::POST;
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

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }
}
