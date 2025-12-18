<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\LeadsAPI\ClassifiedLead;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /classified_lead/{itemId}
 * @see https://developer.ebay.com/api-docs/sell/leads/resources/classified_lead/methods/getClassifiedLeadsByItemId
 */
class GetAllClassifiedLeadsByItemId implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/leads/v1/classified_lead/{itemId}';

    /**
     * Create a new instance.
     * @param string $itemId
     * @param ?string $startTime
     * @param ?string $endTime
     * @param bool $includeMessages
     * @param ?string $status
     * @return void
     */
    public function __construct(
        public readonly string $itemId,
        public readonly ?string $startTime = null,
        public readonly ?string $endTime = null,
        public readonly bool $includeMessages = false,
        public readonly ?string $status = null,
    ) { }

    /**
     * @inheritdoc
     */
    public function base(string $environment): ?string
    {
        if ($environment === 'production') {
            return 'https://apiz.ebay.com';
        } else {
            return 'https://apiz.sandbox.ebay.com';
        }
    }

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
        return ['itemId' => $this->itemId];
    }

    /**
     * @inheritdoc
     */
    public function query(): array
    {
        return [
            'startTime'         => $this->startTime,
            'endTime'           => $this->endTime,
            'includeMessages'   => $this->includeMessages === true ? 'true' : 'false',
            'status'            => $this->status,
        ];
    }
}
