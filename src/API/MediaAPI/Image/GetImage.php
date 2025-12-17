<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MediaAPI\Image;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\MediaAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /image/{imageId}
 * @see https://developer.ebay.com/api-docs/commerce/media/resources/image/methods/getImage
 */
class GetImage implements MediaAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/media/v1_beta/image/{imageId}';

    /**
     * Create a new instance.
     * @param string $imageId
     * @return void
     */
    public function __construct(
        public readonly string $imageId,
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
        return ['imageId' => $this->imageId];
    }
}
