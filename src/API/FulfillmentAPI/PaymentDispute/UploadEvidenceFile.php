<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FulfillmentAPI\PaymentDispute;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Support\MultipartBody;

/**
 * POST /payment_dispute/{paymentDisputeId}/upload_evidence_file
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/resources/payment_dispute/methods/uploadEvidenceFile
 */
class UploadEvidenceFile implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/payment_dispute/{paymentDisputeId}/upload_evidence_file';

    /**
     * Create a new instance.
     * @param string $paymentDisputeId
     * @param string $filePath
     * @param null|string $fileName
     * @return void
     */
    public function __construct(
        public readonly string $paymentDisputeId,
        public readonly string $filePath,
        public readonly ?string $fileName = null,
    ) { }

    /**
     * @inheritdoc
     */
    public function base(string $environment): ?string
    {
        if ($environment === 'production') {
            return 'https://apiz.ebay.com';
        } else {
            return 'https://apiz.sandbox.ebay.com';
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
        return ['paymentDisputeId' => $this->paymentDisputeId];
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
