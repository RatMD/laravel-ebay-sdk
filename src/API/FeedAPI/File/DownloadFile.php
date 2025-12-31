<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedAPI\File;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /file/{fileId}/download
 * @see https://developer.ebay.com/api-docs/buy/feed/v1/resources/file/methods/downloadFile
 */
class DownloadFile implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/feed/v1/file/{fileId}/download';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param string $fileId
     * @param null|string $range
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly string $fileId,
        public readonly ?string $range = null,
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
        return ['fileId' => $this->fileId];
    }

    /**
     * @inheritdoc
     */
    public function headers(): array
    {
        return [
            'X-EBAY-C-MARKETPLACE-ID'   => $this->marketplaceId,
            'Range'                     => $this->range
        ];
    }
}
