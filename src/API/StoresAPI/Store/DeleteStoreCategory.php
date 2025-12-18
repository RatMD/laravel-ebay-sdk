<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\StoresAPI\Store;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * DELETE /store/categories/{categoryId}
 * @see https://developer.ebay.com/api-docs/sell/stores/resources/store/methods/deleteStoreCategory
 */
class DeleteStoreCategory implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/stores/v1/store/categories/{categoryId}';

    /**
     * Create a new instance.
     * @param string $categoryId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $categoryId,
        public readonly array $payload,
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
        return ['categoryId' => $this->categoryId];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }
}
