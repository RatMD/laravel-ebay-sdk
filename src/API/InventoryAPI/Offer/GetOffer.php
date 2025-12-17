<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\InventoryAPI\Offer;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /offer/{offerId}
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/offer/methods/getOffer
 */
class GetOffer implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/inventory/v1/offer/{offerId}';

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
        return ['offerId' => $this->offerId];
    }
}
