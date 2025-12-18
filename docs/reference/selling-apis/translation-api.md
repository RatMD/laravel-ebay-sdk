---
outline: deep
---
# Translation API <DocsBadge path="sell/translation/static/overview.html" />

The Translation API provides machine translation to help bring inventory to new markets. The 
Translation API translates common commerce content, such as the title of an item to help present 
marketplace listings to buyers in different countries or regions. The Translation API takes foreign 
language search queries from the buyer and translates them for the target marketplace, as well.

## Language

### Translate <DocsBadge path="commerce/translation/v1_beta/translate" />

<ResourcePath method="POST">/translate</ResourcePath>

This method translates listing title and listing description text from one language into another.
For a full list of supported language translations, see the [table](https://developer.ebay.com/develop/guides-v2/other-apis/other-apis-guide#supported-languages).


```php
use Rat\eBaySDK\API\TranslationAPI\Language\Translate;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new Translate(
    payload: (array) $payload,
);
$response = $client->execute($request);
```
