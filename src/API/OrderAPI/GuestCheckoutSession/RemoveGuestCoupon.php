<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\OrderAPI\GuestCheckoutSession;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /guest_checkout_session/{checkoutSessionId}/remove_coupon
 * @see https://developer.ebay.com/api-docs/buy/order/resources/guest_checkout_session/methods/removeGuestCoupon
 */
class RemoveGuestCoupon implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/uy/order/v2/guest_checkout_session/{checkoutSessionId}/remove_coupon';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param string $checkoutSessionId
     * @param string $redemptionCode
     * @param null|string $endUserCtx
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly string $checkoutSessionId,
        public readonly string $redemptionCode,
        public readonly ?string $endUserCtx = null,
    ) { }

    /**
     * @inheritdoc
     */
    public function base(string $environment): ?string
    {
        if ($environment === 'production') {
            return 'https://apix.ebay.com';
        } else {
            return 'https://apix.sandbox.ebay.com';
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
        return ['checkoutSessionId' => $this->checkoutSessionId];
    }

    /**
     * @inheritdoc
     */
    public function headers(): array
    {
        return [
            'X-EBAY-C-ENDUSERCTX'       => $this->endUserCtx,
            'X-EBAY-C-MARKETPLACE-ID'   => $this->marketplaceId
        ];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return ['redemptionCode' => $this->redemptionCode];
    }
}
