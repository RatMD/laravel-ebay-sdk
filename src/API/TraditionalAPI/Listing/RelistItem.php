<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\TraditionalAPI\Listing;

use Rat\eBaySDK\Concerns\CommonTraditions;
use Rat\eBaySDK\Contracts\TraditionalAPIRequest;
use Rat\eBaySDK\Support\XMLBody;

/**
 * RelistItem
 * @see https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/RelistItem.html
 */
class RelistItem implements TraditionalAPIRequest
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
