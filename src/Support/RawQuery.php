<?php declare(strict_types=1);

namespace Rat\eBaySDK\Support;

use Rat\eBaySDK\Contracts\RawQueryPart;

class RawQuery implements RawQueryPart
{
    /**
     *
     * @param string $query
     * @return void
     */
    public function __construct(
        public readonly string $query
    ) { }

    /**
     * @inheritdoc
     */
    public function __toString(): string
    {
        return $this->query;
    }
}
