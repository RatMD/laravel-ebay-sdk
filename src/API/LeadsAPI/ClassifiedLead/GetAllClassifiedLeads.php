<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\LeadsAPI\ClassifiedLead;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /classified_lead
 * @see https://developer.ebay.com/api-docs/sell/leads/resources/classified_lead/methods/getAllClassifiedLeads
 */
class GetAllClassifiedLeads implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/leads/v1/classified_lead';

    /**
     * Create a new instance.
     * @param null|string $startTime
     * @param null|string $endTime
     * @param bool $includeMessages
     * @param null|string $status
     * @return void
     */
    public function __construct(
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
