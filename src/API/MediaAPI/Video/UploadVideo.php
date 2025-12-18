<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MediaAPI\Video;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Support\MultipartBody;

/**
 * POST /video/{videoId}/upload
 * @see https://developer.ebay.com/api-docs/commerce/media/resources/video/methods/uploadVideo
 */
class UploadVideo implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/media/v1_beta/video/{videoId}/upload';

    /**
     * Create a new instance.
     * @param string $videoId
     * @param string $videoPath
     * @param string $fileName
     * @return void
     */
    public function __construct(
        public readonly string $videoId,
        public readonly string $videoPath,
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
    public function params(): array
    {
        return ['videoId' => $this->videoId];
    }

    /**
     * @inheritdoc
     */
    public function body(): MultipartBody
    {
        return new MultipartBody([
            [
                'name'     => 'video',
                'contents' => fopen($this->videoPath, 'rb'),
                'filename' => $this->fileName ?? basename($this->videoPath),
            ],
        ]);
    }
}
