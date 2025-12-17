<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\PaymentsProgram;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\Marketplace;
use Rat\eBaySDK\Enums\PaymentsProgramType;

/**
 * GET /payments_program/{marketplace_id}/{payments_program_type}
 * @see https://developer.ebay.com/api-docs/sell/account/resources/payments_program/methods/getPaymentsProgram
 */
class GetPaymentsProgram implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/payments_program/{marketplaceId}/{paymentsProgramType}';

    /**
     * Create a new instance.
     * @param Marketplace $marketplaceId
     * @param PaymentsProgramType $paymentsProgramType
     * @return void
     */
    public function __construct(
        public readonly Marketplace $marketplaceId,
        public readonly PaymentsProgramType $paymentsProgramType,
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
        return [
            'marketplace_id' => $this->marketplaceId,
            'payments_program_type' => $this->paymentsProgramType
        ];
    }
}
