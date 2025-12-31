<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\OrderAPI\GuestPurchaseOrder;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /guest_purchase_order/{purchaseOrderId}
 * @see https://developer.ebay.com/api-docs/buy/order/resources/guest_purchase_order/methods/getGuestPurchaseOrder
 */
class GetGuestPurchaseOrder implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/uy/order/v2/guest_purchase_order/{purchaseOrderId}';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param string $purchaseOrderId
     * @param null|string $endUserCtx
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly string $purchaseOrderId,
        public readonly ?string $endUserCtx = null,
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
        return ['purchaseOrderId' => $this->purchaseOrderId];
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
}
