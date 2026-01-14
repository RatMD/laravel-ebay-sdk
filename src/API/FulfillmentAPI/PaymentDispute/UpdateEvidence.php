<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FulfillmentAPI\PaymentDispute;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /payment_dispute/{paymentDisputeId}/update_evidence
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/resources/payment_dispute/methods/updateEvidence
 */
class UpdateEvidence implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/fulfillment/v1/payment_dispute/{paymentDisputeId}/update_evidence';

    /**
     * Create a new instance.
     * @param string $paymentDisputeId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $paymentDisputeId,
        public readonly array $payload,
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
    public function body(): array
    {
        return $this->payload;
    }
}
