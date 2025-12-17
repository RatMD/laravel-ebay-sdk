<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\TraditionalAPI\Order;

use Rat\eBaySDK\Concerns\CommonTraditions;
use Rat\eBaySDK\Contracts\TraditionalAPIRequest;
use Rat\eBaySDK\Support\XMLBody;

/**
 * GetItemTransactions
 * @see https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetItemTransactions.html
 */
class GetItemTransactions implements TraditionalAPIRequest
{
    use CommonTraditions;

    /**
     * Create a new instance.
     * @param array|string $payload
     * @return void
     */
    public function __construct(
        public readonly array|string $payload,
    ) { }

    /**
     * @inheritdoc
     */
    public function body(): XMLBody
    {
        return new XMLBody($this->payload);
    }
}
