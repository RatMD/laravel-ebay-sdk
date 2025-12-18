<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MediaAPI\Image;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /image/create_image_from_url
 * @see https://developer.ebay.com/api-docs/commerce/media/resources/image/methods/createImageFromUrl
 */
class CreateImageFromUrl implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/media/v1_beta/image/create_image_from_url';

    /**
     * Create a new instance.
     * @param string $imageUrl
     * @return void
     */
    public function __construct(
        public readonly string $imageUrl,
    ) { }

    /**
     * @inheritdoc
     */
    public function base(string $environment): ?string
    {
        if ($environment === 'production') {
            return 'https://apim.ebay.com';
        } else {
            return 'https://apim.sandbox.ebay.com';
        }
    }

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
        return ['imageUrl' => $this->imageUrl];
    }
}
