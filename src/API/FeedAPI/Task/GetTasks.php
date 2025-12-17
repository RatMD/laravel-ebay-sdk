<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedAPI\Task;

use Illuminate\Support\Facades\Validator;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /task
 * @see hhttps://developer.ebay.com/api-docs/sell/feed/resources/task/methods/getTasks
 */
class GetTasks implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/feed/v1/task';

    /**
     * Create a new instance.
     * @param string $feedType
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly string $feedType,
        public readonly ?string $scheduleId = null,
        public readonly int $lookBackDays = 7,
        public readonly ?string $dateRange = null,
        public readonly int $limit = 10,
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
            'feed_type'         => $this->feedType,
            'schedule_id'       => $this->scheduleId,
            'look_back_days'    => $this->lookBackDays,
            'date_range'        => $this->dateRange,
            'limit'             => (string) $this->limit,
            'offset'            => (string) $this->offset,
        ];
    }

    /**
     * @inheritdoc
     */
    public function validate(): void
    {
        Validator::make($this->query(), [
            'feed_type' => ['required'],
            'limit'     => ['required', 'min:1', 'max:500']
        ])->validate();
    }
}
