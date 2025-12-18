<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MessageAPI\Conversation;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /bulk_update_conversation
 * @see https://developer.ebay.com/api-docs/commerce/message/resources/conversation/methods/bulkUpdateConversation
 */
class BulkUpdateConversation implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/message/v1/bulk_update_conversation';

    /**
     * Create a new instance.
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly array $payload
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::POST;
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
    public function body(): array
    {
        return $this->payload;
    }
}
