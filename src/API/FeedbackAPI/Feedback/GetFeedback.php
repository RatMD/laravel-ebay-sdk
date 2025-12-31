<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedbackAPI\Feedback;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\FeedbackType;
use Rat\eBaySDK\Enums\HTTPMethod;

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
     * @param null|string $filter
     * @param null|string $sort
     * @param null|int $limit
     * @param null|int $offset
     * @return void
     */
    public function __construct(
        public readonly FeedbackType $feedbackType,
        public readonly string $userId,
        public readonly ?string $feedbackId = null,
        public readonly ?string $listingId = null,
        public readonly ?string $transactionId = null,
        public readonly ?string $orderLineItemId = null,
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
