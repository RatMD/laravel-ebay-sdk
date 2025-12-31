<?php declare(strict_types=1);

namespace Rat\eBaySDK\Contracts;

use Stringable;

interface RawQueryPart extends Stringable
{
    /**
     * @return string
     */
    public function __toString();
}
