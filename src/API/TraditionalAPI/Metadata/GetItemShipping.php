<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\TraditionalAPI\Metadata;

use Rat\eBaySDK\Concerns\CommonTraditions;
use Rat\eBaySDK\Contracts\TraditionalAPIRequest;
use Rat\eBaySDK\Support\XMLBody;

/**
 * GetItemShipping
 * @see https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetItemShipping.html
 */
class GetItemShipping implements TraditionalAPIRequest
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
