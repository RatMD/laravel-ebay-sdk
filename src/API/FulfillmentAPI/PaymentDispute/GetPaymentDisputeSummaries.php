<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FulfillmentAPI\PaymentDispute;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /payment_dispute_summary
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/resources/payment_dispute/methods/getPaymentDisputeSummaries
 */
class GetPaymentDisputeSummaries implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/payment_dispute_summary';

    /**
     * Create a new instance.
     * @param ?string $orderId
     * @param ?string $buyerUsername
     * @param ?string $openDateFrom
     * @param ?string $openDateTo
     * @param ?string $paymentDisputeStatus
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly ?string $orderId = null,
        public readonly ?string $buyerUsername = null,
        public readonly ?string $openDateFrom = null,
        public readonly ?string $openDateTo = null,
        public readonly ?string $paymentDisputeStatus = null,
        public readonly int $limit = 50,
        public readonly int $offset = 0,
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
    public function query(): array
    {
        return [
            'order_id'                  => $this->orderId,
            'buyer_username'            => $this->buyerUsername,
            'open_date_from'            => $this->openDateFrom,
            'open_date_to'              => $this->openDateTo,
            'payment_dispute_status'    => $this->paymentDisputeStatus,
            'limit'                     => $this->limit,
            'offset'                    => $this->offset,
        ];
    }
}
