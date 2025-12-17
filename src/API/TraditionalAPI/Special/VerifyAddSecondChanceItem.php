<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\TraditionalAPI\Special;

use Rat\eBaySDK\Concerns\CommonTraditions;
use Rat\eBaySDK\Contracts\TraditionalAPIRequest;
use Rat\eBaySDK\Support\XMLBody;

/**
 * VerifyAddSecondChanceItem
 * @see https://developer.ebay.com/devzone/xml/docs/Reference/eBay/VerifyAddSecondChanceItem.html
 */
class VerifyAddSecondChanceItem implements TraditionalAPIRequest
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
