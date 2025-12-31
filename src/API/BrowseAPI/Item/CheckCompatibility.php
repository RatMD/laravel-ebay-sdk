<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\BrowseAPI\Item;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /item/{itemId}/check_compatibility
 * @see https://developer.ebay.com/api-docs/buy/browse/resources/item/methods/checkCompatibility
 */
class CheckCompatibility implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/browse/v1/item/{itemId}/check_compatibility';

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
