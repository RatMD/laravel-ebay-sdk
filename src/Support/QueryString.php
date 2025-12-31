<?php declare(strict_types=1);

namespace Rat\eBaySDK\Support;

use BackedEnum;

class QueryString
{
    /**
     * Format query data value.
     * @param string|array|BackedEnum $value
     * @param string $separator
     * @return string
     */
    public static function formatData(string|array|BackedEnum $value, string $separator = ','): string
    {
        if ($value instanceof BackedEnum) {
            return (string) $value->value;
        }

        if (is_string($value)) {
            return $value;
        }

        return implode($separator, array_map(
            fn ($item) => static::formatData($item),
            $value
        ));
    }

    /**
     * Build a query string from an array, with optional raw (non-encoded) values.
     * @param array $data
     * @param string $separator
     * @param bool $rfc3986
     * @return string
     */
    public static function build(array $data, string $separator = '&', bool $rfc3986 = true): string
    {
        $pairs = [];
        $encode = $rfc3986
            ? fn(string $s) => rawurlencode($s)     // RFC3986 (%20)
            : fn(string $s) => urlencode($s);       // RFC1738 (+)

        $walk = function ($value, string $key) use (&$pairs, $encode) {
            $encodedKey = $encode($key);

            if ($value instanceof FilterQuery) {
                $pairs[] = $encodedKey . '=' . (string) $value;
                return;
            }

            if ($value === null) {
                return;
            }

            $pairs[] = $encodedKey . '=' . $encode((string) static::formatData($value));
        };

        foreach ($data as $k => $v) {
            $walk($v, (string) $k);
        }

        return implode($separator, $pairs);
    }
}
