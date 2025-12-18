<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedbackAPI\FeedbackRatingSummary;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /feedback_rating_summary
 * @see https://developer.ebay.com/api-docs/commerce/feedback/resources/feedback_rating_summary/methods/getFeedbackRatingSummary
 */
class GetFeedbackRatingSummary implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/feedback/v1/feedback_rating_summary';

    /**
     * Create a new instance.
     * @param string $userId
     * @param string $filter
     * @return void
     */
    public function __construct(
        public readonly string $userId,
        public readonly string $filter,
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
            'user_id'   => $this->userId,
            'filter'    => $this->filter,
        ];
    }
}
