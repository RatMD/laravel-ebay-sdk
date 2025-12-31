<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\DealAPI\DealItem;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /deal_item
 * @see https://developer.ebay.com/api-docs/buy/deal/resources/deal_item/methods/getDealItems
 */
class GetDealItems implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/deal/v1/deal_item';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param null|string $categoryIds
     * @param null|bool $commissionable
     * @param null|string $deliveryCountry
     * @param int $limit
     * @param int $offset
     * @param null|string $endUserCtx
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly ?string $categoryIds = null,
        public readonly ?bool $commissionable = null,
        public readonly ?string $deliveryCountry = null,
        public readonly int $limit = 100,
        public readonly int $offset = 0,
        public readonly ?string $endUserCtx = null,
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
        $commissionable = $this->commissionable === true
            ? 'true'
            : ($this->commissionable === false ? 'false' : null);
        return [
            'category_ids'      => $this->categoryIds,
            'commissionable'    => $commissionable,
            'delivery_country'  => $this->deliveryCountry,
            'limit'             => $this->limit,
            'offset'            => $this->offset
        ];
    }

    /**
     * @inheritdoc
     */
    public function headers(): array
    {
        return [
            'X-EBAY-C-ENDUSERCTX'       => $this->endUserCtx,
            'X-EBAY-C-MARKETPLACE-ID'   => $this->marketplaceId
        ];
    }
}
