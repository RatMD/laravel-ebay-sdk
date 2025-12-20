<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\ItemPromotion;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * DELETE /item_promotion/{promotionId}
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/item_promotion/methods/deleteItemPromotion
 */
class DeleteItemPromotion implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/item_promotion/{promotionId}';

    /**
     * Create a new instance.
     * @param string $promotionId
     * @return void
     */
    public function __construct(
        public readonly string $promotionId,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::DELETE;
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
        return ['promotionId' => $this->promotionId];
    }
}
