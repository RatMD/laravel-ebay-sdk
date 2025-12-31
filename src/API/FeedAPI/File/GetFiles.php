<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedAPI\File;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /file
 * @see https://developer.ebay.com/api-docs/buy/feed/v1/resources/file/methods/getFiles
 */
class GetFiles implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/feed/v1/file';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param string $feedTypeId
     * @param null|string $feedScope
     * @param null|string $categoryIds
     * @param null|string $lookBack
     * @param null|int $limit
     * @param null|string $continuationToken
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly string $feedTypeId,
        public readonly ?string $feedScope = null,
        public readonly ?string $categoryIds = null,
        public readonly ?string $lookBack = null,
        public readonly ?int $limit = 20,
        public readonly ?string $continuationToken = null,
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
            'feed_type_id'          => $this->feedTypeId,
            'feed_scope'            => $this->feedScope,
            'category_ids'          => $this->categoryIds,
            'look_back'             => $this->lookBack,
            'limit'                 => $this->limit,
            'continuation_token'    => $this->continuationToken,
        ];
    }

    /**
     * @inheritdoc
     */
    public function headers(): array
    {
        return ['X-EBAY-C-MARKETPLACE-ID' => $this->marketplaceId];
    }
}
