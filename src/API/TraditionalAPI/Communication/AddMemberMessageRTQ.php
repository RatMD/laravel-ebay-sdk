<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\TraditionalAPI\Communication;

use Rat\eBaySDK\Concerns\CommonTraditions;
use Rat\eBaySDK\Contracts\TraditionalAPIRequest;
use Rat\eBaySDK\Support\XMLBody;

/**
 * AddMemberMessageRTQ
 * @see https://developer.ebay.com/devzone/xml/docs/Reference/eBay/AddMemberMessageRTQ.html
 */
class AddMemberMessageRTQ implements TraditionalAPIRequest
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
