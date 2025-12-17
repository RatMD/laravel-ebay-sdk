<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedAPI\Schedule;

use Illuminate\Support\Facades\Validator;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * PUT /schedule/{scheduleId}
 * @see https://developer.ebay.com/api-docs/sell/feed/resources/schedule/methods/updateSchedule
 */
class UpdateSchedule implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/feed/v1/schedule/{scheduleId}';

    /**
     * Create a new instance.
     * @param string $scheduleId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $scheduleId,
        public readonly array $payload,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::PUT;
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
        return ['scheduleId' => $this->scheduleId];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }

    /**
     * @inheritdoc
     */
    public function validate(): void
    {
        Validator::make($this->payload, [
            'schemaVersion' => ['required'],
        ])->validate();
    }
}
