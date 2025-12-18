<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MessageAPI\Conversation;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /conversation/{conversationId}
 * @see https://developer.ebay.com/api-docs/commerce/message/resources/conversation/methods/getConversation
 */
class GetConversation implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/message/v1/conversation/{conversationId}';

    /**
     * Create a new instance.
     * @param string $conversationId
     * @param string $conversationType
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly string $conversationId,
        public readonly string $conversationType,
        public readonly int $limit = 25,
        public readonly int $offset = 0,
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
        return ['conversationId' => $this->conversationId];
    }

    /**
     * @inheritdoc
     */
    public function query(): array
    {
        return [
            'conversation_type' => $this->conversationType,
            'limit'             => $this->limit,
            'offset'            => $this->offset
        ];
    }
}
