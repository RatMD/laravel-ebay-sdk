<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MessageAPI\Conversation;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /conversation
 * @see https://developer.ebay.com/api-docs/commerce/message/resources/conversation/methods/getConversations
 */
class GetConversations implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/message/v1/conversation';

    /**
     * Create a new instance.
     * @param string $conversationType
     * @param ?string $conversationStatus
     * @param ?string $referenceId
     * @param ?string $referenceType
     * @param ?string $startTime
     * @param ?string $endTime
     * @param ?string $otherPartyUsername
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly string $conversationType,
        public readonly ?string $conversationStatus = null,
        public readonly ?string $referenceId = null,
        public readonly ?string $referenceType = null,
        public readonly ?string $startTime = null,
        public readonly ?string $endTime = null,
        public readonly ?string $otherPartyUsername = null,
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
    public function query(): array
    {
        return [
            'conversation_type'     => $this->conversationType,
            'conversation_status'   => $this->conversationStatus,
            'reference_id'          => $this->referenceId,
            'reference_type'        => $this->referenceType,
            'start_time'            => $this->startTime,
            'end_time'              => $this->endTime,
            'other_party_username'  => $this->otherPartyUsername,
            'limit'                 => $this->limit,
            'offset'                => $this->offset
        ];
    }
}
