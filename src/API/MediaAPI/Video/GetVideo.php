<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MediaAPI\Video;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\MediaAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /video/{videoId}
 * @see https://developer.ebay.com/api-docs/commerce/media/resources/video/methods/getVideo
 */
class GetVideo implements MediaAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/media/v1_beta/video/{videoId}';

    /**
     * Create a new instance.
     * @param string $videoId
     * @return void
     */
    public function __construct(
        public readonly string $videoId,
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
        return ['videoId' => $this->videoId];
    }
}
