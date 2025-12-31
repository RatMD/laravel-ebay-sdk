<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MediaAPI\Image;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Support\MultipartBody;

/**
 * POST /image/create_image_from_file
 * @see https://developer.ebay.com/api-docs/commerce/media/resources/image/methods/createImageFromFile
 */
class CreateImageFromFile implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/media/v1_beta/image/create_image_from_file';

    /**
     * Create a new instance.
     * @param string $imagePath
     * @param null|string $fileName
     * @return void
     */
    public function __construct(
        public readonly string $imagePath,
        public readonly ?string $fileName = null,
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
    public function body(): MultipartBody
    {
        return new MultipartBody([
            [
                'name'     => 'image',
                'contents' => fopen($this->imagePath, 'rb'),
                'filename' => $this->fileName ?? basename($this->imagePath),
            ],
        ]);
    }
}
