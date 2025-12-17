<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedAPI\Schedule;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /schedule_template/{scheduleTemplateId}
 * @see https://developer.ebay.com/api-docs/sell/feed/resources/schedule/methods/getScheduleTemplate
 */
class GetScheduleTemplate implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/feed/v1/schedule_template/{scheduleTemplateId}';

    /**
     * Create a new instance.
     * @param string $scheduleTemplateId
     * @return void
     */
    public function __construct(
        public readonly string $scheduleTemplateId,
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
        return ['scheduleTemplateId' => $this->scheduleTemplateId];
    }
}
