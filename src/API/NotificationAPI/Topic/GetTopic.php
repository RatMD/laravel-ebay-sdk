<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\NotificationAPI\Topic;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /topic/{topicId}
 * @see https://developer.ebay.com/api-docs/sell/notification/resources/topic/methods/getTopic
 */
class GetTopic implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/notification/v1/topic/{topicId}';

    /**
     * Create a new instance.
     * @param string $topicId
     * @return void
     */
    public function __construct(
        public readonly string $topicId
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
        return ['topicId' => $this->topicId];
    }
}
