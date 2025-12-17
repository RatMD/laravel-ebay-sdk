<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\InventoryAPI\Offer;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /offer/{offerId}/publish
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/offer/methods/publishOffer
 */
class PublishOffer implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/inventory/v1/offer/{offerId}/publish';

    /**
     * Create a new instance.
     * @param string $offerId
     * @return void
     */
    public function __construct(
        public readonly string $offerId,
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
        return ['offerId' => $this->offerId];
    }
}
