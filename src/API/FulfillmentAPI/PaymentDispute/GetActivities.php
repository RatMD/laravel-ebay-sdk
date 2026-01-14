<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FulfillmentAPI\PaymentDispute;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /payment_dispute/{paymentDisputeId}/activity
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/resources/payment_dispute/methods/getActivities
 */
class GetActivities implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/fulfillment/v1/payment_dispute/{paymentDisputeId}/activity';

    /**
     * Create a new instance.
     * @param string $paymentDisputeId
     * @return void
     */
    public function __construct(
        public readonly string $paymentDisputeId,
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
}
