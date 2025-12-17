<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedAPI\Task;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Support\MultipartBody;

/**
 * POST /task/{taskId}/upload_file
 * @see https://developer.ebay.com/api-docs/sell/feed/resources/task/methods/uploadFile
 */
class UploadFile implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/feed/v1/task/{taskId}/upload_file';

    /**
     * Create a new instance.
     * @param string $feedType
     * @param string $filePath
     * @param ?string $fileName
     * @return void
     */
    public function __construct(
        public readonly string $taskId,
        public readonly string $filePath,
        public readonly ?string $fileName = null,
    ) { }

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
        return ['taskId' => $this->taskId];
    }

    /**
     * @inheritdoc
     */
    public function body(): MultipartBody
    {
        return new MultipartBody([
            [
                'name'     => 'file',
                'contents' => fopen($this->filePath, 'rb'),
                'filename' => $this->fileName ?? basename($this->filePath),
            ],
        ]);
    }
}
