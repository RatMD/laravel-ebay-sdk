<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\TraditionalAPI\Listing;

use Rat\eBaySDK\Concerns\CommonTraditions;
use Rat\eBaySDK\Contracts\TraditionalAPIRequest;
use Rat\eBaySDK\Support\XMLBody;

/**
 * ReviseInventoryStatus
 * @see https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/ReviseInventoryStatus.html
 */
class ReviseInventoryStatus implements TraditionalAPIRequest
{
    use CommonTraditions;

    /**
     * Create a new instance.
     * @param null|array|string $payload
     * @return void
     */
    public function __construct(
        public readonly null|array|string $payload = null,
    ) { }

    /**
     * @inheritdoc
     */
    public function body(): XMLBody
    {
        return new XMLBody($this->payload);
    }
}
