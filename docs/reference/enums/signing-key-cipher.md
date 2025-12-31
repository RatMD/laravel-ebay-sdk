# SigningKeyCipher Enum <DocsBadge path="developer/key-management/types/api:SigningKeyCipher" />

This enumerated type lists the supported ciphers that can be used when creating new keypairs.

| Value     | Description                                                          |
| --------- | -------------------------------------------------------------------- |
| `ED25519` | Represents the Ed25519 algorithm as specified in RFC 8032.           |
| `RSA`     | Represents the RSASSA-PKCS1-v1_5 algorithm as specified in RFC 3447. |

## Example

```php
use Rat\eBaySDK\Enums\PrograSigningKeyCiphermType;

SigningKeyCipher::ED25519;
```
