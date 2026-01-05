# TranslationLanguage Enum <DocsBadge path="sell/translation/types/api:LanguageEnum" />

This enumeration type lists the languages that are currently supported for either input or output 
text.

| Key  | Value | Description                                                       |
| ---- | ----- | ----------------------------------------------------------------- |
| `DE` | `de`  | Indicates the language of the input or output text is German.     |
| `EN` | `en`  | Indicates the language of the input or output text is English.    |
| `ES` | `es`  | Indicates the language of the input or output text is Spanish.    |
| `FR` | `fr`  | Indicates the language of the input or output text is French.     |
| `IT` | `it`  | Indicates the language of the input or output text is Italian.    |
| `JA` | `ja`  | Indicates the language of the input or output text is Japanese.   |
| `PL` | `pl`  | Indicates the language of the input or output text is Polish.     |
| `PT` | `pt`  | Indicates the language of the input or output text is Portuguese. |
| `RU` | `ru`  | Indicates the language of the input or output text is Russian.    |
| `ZH` | `zh`  | Indicates the language of the input or output text is Chinese.    |

## Example

```php
use Rat\eBaySDK\Enums\TranslationLanguage;

TranslationLanguage::DE;
```

## Used by

- [TranslationAPI\Language\Translate](/reference/selling-apis/translation-api.html#translate)
