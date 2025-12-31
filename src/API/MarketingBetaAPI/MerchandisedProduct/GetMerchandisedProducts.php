<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingBetaAPI\MerchandisedProduct;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /merchandised_product
 * @see https://developer.ebay.com/api-docs/buy/marketing/resources/merchandised_product/methods/getMerchandisedProducts
 */
class GetMerchandisedProducts implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/marketing/v1_beta/merchandised_product';

    /**
     * Create a new instance.
     * @param string $metricName
     * @param string $categoryId
     * @param null|string $aspectFilter
     * @param null|int $limit
     * @return void
     */
    public function __construct(
        public readonly string $metricName,
        public readonly string $categoryId,
        public readonly ?string $aspectFilter = null,
        public readonly ?int $limit = 8,
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
            'metric_name'   => $this->metricName,
            'category_id'   => $this->categoryId,
            'aspect_filter' => $this->aspectFilter,
            'limit'         => $this->limit,
        ];
    }
}
