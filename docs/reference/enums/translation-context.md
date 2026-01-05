# TranslationContext Enum <DocsBadge path="sell/translation/types/api:TranslationContextEnum" />

This enumeration type indicates the listing entities that may be translated with the Translation API.

| Value              | Description                                                                                                        |
| ------------------ | ------------------------------------------------------------------------------------------------------------------ |
| `ITEM_TITLE`       | This value is input into the translationContext input field if the user wishes to translate a listing title.       |
| `ITEM_DESCRIPTION` | This value is input into the translationContext input field if the user wishes to translate a listing description. |

## Example

```php
use Rat\eBaySDK\Enums\TranslationContext;

TranslationContext::ITEM_TITLE;
```

## Used by

- [TranslationAPI\Language\Translate](/reference/selling-apis/translation-api.html#translate)
