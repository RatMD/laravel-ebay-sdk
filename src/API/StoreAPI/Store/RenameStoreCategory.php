<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\StoreAPI\Store;

use Illuminate\Support\Facades\Validator;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * PUT /store/categories/{categoryId}
 * @see https://developer.ebay.com/api-docs/sell/stores/resources/store/methods/moveStoreCategory
 */
class MoveStoreCategory implements APIRequest
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
        return ['categoryId' => $this->categoryId];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }

    /**
     * @inheritdoc
     */
    public function validate(): void
    {
        Validator::make($this->query(), [
            'categoryName'  => ['required', 'max:35'],
        ])->validate();
    }
}
