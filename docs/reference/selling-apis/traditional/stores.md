---
outline: deep
---
# Traditional / eBay Stores <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/eBayStoresIndex.html" />

This Call Reference describes the elements and attributes for each eBay Stores call below.

## GetStore <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetStore.html" />

Retrieves configuration information for the eBay store owned by the specified UserID, or by the 
caller.

```php
use Rat\eBaySDK\API\TraditionalAPI\Stores\GetStore;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetStore(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetStoreCategoryUpdateStatus <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetStoreCategoryUpdateStatus.html" />

Returns the status of the processing for category-structure changes specified with a call to 
SetStoreCategories.

```php
use Rat\eBaySDK\API\TraditionalAPI\Stores\GetStoreCategoryUpdateStatus;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetStoreCategoryUpdateStatus(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## SetStoreCategories <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/SetStoreCategories.html" />

Changes the category structure of an eBay store.

```php
use Rat\eBaySDK\API\TraditionalAPI\Stores\SetStoreCategories;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SetStoreCategories(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```