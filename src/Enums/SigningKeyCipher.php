<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/developer/key-management/types/api:SigningKeyCipher
 */
enum SigningKeyCipher: string
{
    /**
     * Represents the Ed25519 algorithm as specified in RFC 8032.
     */
    case ED25519 = "ED25519";

    /**
     * Represents the RSASSA-PKCS1-v1_5 algorithm as specified in RFC 3447.
     */
    case RSA = "RSA";
}
