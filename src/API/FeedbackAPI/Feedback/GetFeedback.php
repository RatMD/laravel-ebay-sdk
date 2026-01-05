<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedbackAPI\Feedback;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\FeedbackType;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Support\FilterQuery;

/**
 * GET /feedback
 * @see https://developer.ebay.com/api-docs/commerce/feedback/resources/feedback/methods/getFeedback
 */
class GetFeedback implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/feedback/v1/feedback';

    /**
     * Create a new instance.
     * @param FeedbackType $feedbackType
     * @param string $userId
     * @param null|string $feedbackId
     * @param null|string $listingId
     * @param null|string $transactionId
     * @param null|string $orderLineItemId
     * @param null|string|FilterQuery $filter
     * @param null|string $sort
     * @param null|int $limit
     * @param null|int $offset
     * @return void
     */
    public function __construct(
        public readonly FeedbackType $feedbackType,
        public readonly string $userId,
        public readonly null|string $feedbackId = null,
        public readonly null|string $listingId = null,
        public readonly null|string $transactionId = null,
        public readonly null|string $orderLineItemId = null,
        public readonly null|string|FilterQuery $filter = null,
        public readonly null|string $sort = null,
        public readonly null|int $limit = 25,
        public readonly null|int $offset = 0,
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
            'feedback_type'         => $this->feedbackType,
            'user_id'               => $this->userId,
            'feedback_id'           => $this->feedbackId,
            'listing_id'            => $this->listingId,
            'transaction_id'        => $this->transactionId,
            'order_line_item_id'    => $this->orderLineItemId,
            'filter'                => $this->filter,
            'sort'                  => $this->sort,
            'limit'                 => $this->limit,
            'offset'                => $this->offset,
        ];
    }
}
