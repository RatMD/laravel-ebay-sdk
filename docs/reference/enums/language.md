# Language Enum <DocsBadge path="commerce/media/types/api:LanguageEnum" />

This enumeration value indicates the language of the document.

| Value           | Description           |
| --------------- | --------------------- |
| `ENGLISH`                 | The document is in English. |
| `SPANISH`                 | The document is in Spanish. |
| `ITALIAN`                 | The document is in Italian. |
| `GERMAN`                  | The document is in German. |
| `POLISH`                  | The document is in Polish. |
| `DUTCH`                   | The document is in Dutch. |
| `PORTUGESE`               | The document is in Portuguese. Note: This enumeration value is deprecated. Use the PORTUGUESE enum value instead when creating a document. |
| `PORTUGUESE`              | The document is in Portuguese. |
| `FRENCH`                  | The document is in French. |
| `OTHER`                   | The document is in a language other than the ones specifically listed above. |

## Example

```php
use Rat\eBaySDK\Enums\Language;

Language::ENGLISH;
```
