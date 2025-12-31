<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedbackAPI\AwaitingFeedback;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /awaiting_feedback
 * @see https://developer.ebay.com/api-docs/commerce/feedback/resources/awaiting_feedback/methods/getItemsAwaitingFeedback
 */
class GetItemsAwaitingFeedback implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/feedback/v1/awaiting_feedback';

    /**
     * Create a new instance.
     * @param null|string $filter
     * @param null|string $sort
     * @param null|int $limit
     * @param null|int $offset
     * @return void
     */
    public function __construct(
        public readonly ?string $filter = null,
        public readonly ?string $sort = null,
        public readonly ?int $limit = 25,
        public readonly ?int $offset = 0,
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
            'filter'    => $this->filter,
            'sort'      => $this->sort,
            'limit'     => $this->limit,
            'offset'    => $this->offset,
        ];
    }
}
