<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\InventoryAPI\Offer;

use Illuminate\Support\Facades\Validator;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\FormatType;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\Marketplace;

/**
 * GET /offer
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/offer/methods/getOffers
 */
class GetOffers implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/inventory/v1/offer';

    /**
     * Create a new instance.
     * @param string $sku
     * @param null|Marketplace $marketplaceId
     * @param null|FormatType $format
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly string $sku,
        public readonly ?Marketplace $marketplaceId = null,
        public readonly ?FormatType $format = null,
        public readonly int $limit = 25,
        public readonly int $offset = 0,
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
            'sku'               => (string) $this->sku,
            'marketplace_id'    => (string) $this->limit,
            'format'            => (string) $this->limit,
            'limit'             => (string) $this->limit,
            'offset'            => (string) $this->offset,
        ];
    }

    /**
     * @inheritdoc
     */
    public function validate(): void
    {
        Validator::make($this->query(), [
            'sku'   => ['required'],
            'limit' => ['required', 'min:1', 'max:100']
        ])->validate();
    }
}
