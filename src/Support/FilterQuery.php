<?php declare(strict_types=1);

namespace Rat\eBaySDK\Support;

class FilterQuery
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
     *
     * @return string
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
