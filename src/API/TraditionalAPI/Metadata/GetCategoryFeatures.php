<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\TraditionalAPI\Metadata;

use Rat\eBaySDK\Concerns\CommonTraditions;
use Rat\eBaySDK\Contracts\TraditionalAPIRequest;
use Rat\eBaySDK\Support\XMLBody;

/**
 * GetCategoryFeatures
 * @see https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetCategoryFeatures.html
 */
class GetCategoryFeatures implements TraditionalAPIRequest
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
