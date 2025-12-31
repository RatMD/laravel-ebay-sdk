<?php declare(strict_types=1);

namespace Rat\eBaySDK\Support;

use Rat\eBaySDK\Contracts\RawQueryPart;

class FilterQuery implements RawQueryPart
{
    /**
     *
     * @param array $filters
     * @return void
     */
    public function __construct(
        public readonly array $filters
    ) { }

    /**
     * @inheritdoc
     */
    public function __toString(): string
    {
        $query = '';
        foreach ($this->filters AS $key => $value) {
            $query .= "{$key}:" . urlencode(QueryString::formatData($value));
        }
        return $query;
    }
}
