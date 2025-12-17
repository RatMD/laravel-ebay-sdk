<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPIv2\RateTable;

use Illuminate\Support\Facades\Validator;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /payout_settings/update_percentage
 * @see https://developer.ebay.com/api-docs/sell/account/v2/resources/payout_settings/methods/updatePayoutPercentage
 */
class UpdatePayoutPercentage implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v2/payout_settings/update_percentaget';

    /**
     * Create a new instance.
     * @param string $rateTableId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly array $payload
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
    public function body(): array
    {
        return $this->payload;
    }

    /**
     * @inheritdoc
     */
    public function validate(): void
    {
        Validator::make($this->payload, [
            'payoutInstruments'                     => ['required', 'array', 'min:1'],
            'payoutInstruments.*.instrumentId'      => ['required'],
            'payoutInstruments.*.payoutPercentage'  => ['required'],
        ])->validate();
    }
}
