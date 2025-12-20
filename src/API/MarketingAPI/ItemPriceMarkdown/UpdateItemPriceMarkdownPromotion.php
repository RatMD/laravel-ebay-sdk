<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\ItemPriceMarkdown;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * PUT /item_price_markdown/{promotionId}
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/item_price_markdown/methods/updateItemPriceMarkdownPromotion
 */
class UpdateItemPriceMarkdownPromotion implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/item_price_markdown/{promotionId}';

    /**
     * Create a new instance.
     * @param string $promotionId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $promotionId,
        public readonly array $payload,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::PUT;
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

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }
}
