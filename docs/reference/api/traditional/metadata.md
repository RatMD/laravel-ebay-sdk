---
outline: deep
---
# Traditional / eBay Metadata <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/MetadataIndex.html" />

This Call Reference describes the elements and attributes for each eBay Metadata call below.

## GetAllBidders <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetAllBidders.html" />

Provides three modes for retrieving a list of the users that bid on a listing.

```php
use Rat\eBaySDK\API\TraditionalAPI\Metadata\GetAllBidders;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetAllBidders(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetCategories <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetCategories.html" />

Retrieves the latest eBay category hierarchy for a given eBay site. Information returned for each 
category includes the category name and the unique ID for the category (unique within the eBay site 
for which categories are retrieved). A category ID is a required input when you list most items.

```php
use Rat\eBaySDK\API\TraditionalAPI\Metadata\GetCategories;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCategories(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetCategoryFeatures <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetCategoryFeatures.html" />

Returns information about the features that are applicable to different categories, such as listing 
durations, shipping term requirements, and Best Offer support.

```php
use Rat\eBaySDK\API\TraditionalAPI\Metadata\GetCategoryFeatures;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCategoryFeatures(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetDescriptionTemplates <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetDescriptionTemplates.html" />

Retrieves Theme and Layout specifications for the display of an item's description.

```php
use Rat\eBaySDK\API\TraditionalAPI\Metadata\GetDescriptionTemplates;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetDescriptionTemplates(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GeteBayDetails <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GeteBayDetails.html" />

Retrieves eBay IDs and codes (e.g., site IDs and shipping service codes), enumerated data (e.g., 
payment methods), and other common eBay meta-data.

```php
use Rat\eBaySDK\API\TraditionalAPI\Metadata\GeteBayDetails;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GeteBayDetails(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetItemShipping <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetItemShipping.html" />

Returns shipping cost estimates for an item for every calculated shipping service that the seller 
has offered with the listing.

```php
use Rat\eBaySDK\API\TraditionalAPI\Metadata\GetItemShipping;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItemShipping(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```