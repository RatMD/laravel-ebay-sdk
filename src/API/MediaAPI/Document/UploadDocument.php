<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MediaAPI\Document;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\MediaAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Support\MultipartBody;

/**
 * POST /document/{documentId}/upload
 * @see https://developer.ebay.com/api-docs/commerce/media/resources/document/methods/uploadDocument
 */
class UploadDocument implements MediaAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/media/v1_beta/document/{documentId}/upload';

    /**
     * Create a new instance.
     * @param string $documentId
     * @param string $documentPath
     * @param string $fileName
     * @return void
     */
    public function __construct(
        public readonly string $documentId,
        public readonly string $documentPath,
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
        return ['documentId' => $this->documentId];
    }

    /**
     * @inheritdoc
     */
    public function body(): MultipartBody
    {
        return new MultipartBody([
            [
                'name'     => 'file',
                'contents' => fopen($this->documentPath, 'rb'),
                'filename' => $this->fileName ?? basename($this->documentPath),
            ],
        ]);
    }
}
