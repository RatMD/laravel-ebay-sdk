<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\CatalogAPI\Product;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /product/{epid}
 * @see https://developer.ebay.com/api-docs/sell/catalog/resources/product/methods/getProduct
 */
class GetProduct implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/catalog/v1_beta/product/{epid}';

    /**
     * Create a new instance.
     * @param string $epid
     * @return void
     */
    public function __construct(
        public readonly string $epid,
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
        return [
            'epid' => $this->epid,
        ];
    }
}
