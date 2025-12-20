<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FulfillmentAPI\PaymentDispute;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /payment_dispute/{paymentDisputeId}/fetch_evidence_content
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/resources/payment_dispute/methods/fetchEvidenceContent
 */
class FetchEvidenceContent implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/payment_dispute/{paymentDisputeId}/fetch_evidence_content';

    /**
     * Create a new instance.
     * @param string $paymentDisputeId
     * @param string $evidenceId
     * @param string $fileId
     * @return void
     */
    public function __construct(
        public readonly string $paymentDisputeId,
        public readonly string $evidenceId,
        public readonly string $fileId,
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
        return ['paymentDisputeId' => $this->paymentDisputeId];
    }

    /**
     * @inheritdoc
     */
    public function query(): array
    {
        return [
            'evidence_id'   => $this->evidenceId,
            'file_id'       => $this->fileId
        ];
    }
}
