---
outline: deep
---
# Traditional / Standard Listing <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/StandardListingIndex.html" />

This Call Reference describes the elements and attributes for each Standard Listing call below.

## AddFixedPriceItem <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/AddFixedPriceItem.html" />

Defines and lists a new fixed-price item. This call supports multiple-variation listings.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\AddFixedPriceItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new AddFixedPriceItem(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## AddItem <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/AddItem.html" />

Defines a single new item and lists it on a specified eBay site. 

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\AddItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new AddItem(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## AddItems <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/AddItems.html" />

Defines from one to five items and lists them on a specified eBay site.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\AddItems;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new AddItems(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## AddToItemDescription <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/AddToItemDescription.html" />

Appends a horizontal rule, then a message about what time the addition was made by the seller, and 
then the seller-specified text.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\AddToItemDescription;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new AddToItemDescription(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## EndFixedPriceItem <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/EndFixedPriceItem.html" />

Ends the specified fixed-price listing before the date and time at which it would normally end per 
the listing duration.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\EndFixedPriceItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new EndFixedPriceItem(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## EndItem <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/EndItem.html" />

Ends the specified eBay listing before the date and time at which it would normally end per the 
listing duration.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\EndItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new EndItem(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## EndItems <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/EndItems.html" />

Ends up to 10 specified listings before the date and time at which the listings would normally end 
per the listing duration.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\EndItems;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new EndItems(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetBidderList <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/GetBidderList.html" />

Retrieves all items the user is currently bidding on, and the ones they have won or purchased.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\GetBidderList;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetBidderList(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetItem <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/GetItem.html" />

Returns full details on the listing, including title, description, price information, user 
information, shippinging, and so on, for the specified ItemID.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\GetItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItem(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetSellerEvents <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/GetSellerEvents.html" />

Retrieves price changes, item revisions, description revisions, and other changes that have occurred 
within the last 48 hours related to a seller's eBay listings.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\GetSellerEvents;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSellerEvents(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetSellerList <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/GetSellerList.html" />

Returns a list of the items posted by the authenticated user, including the related item data.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\GetSellerList;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSellerList(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## RelistFixedPriceItem <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/RelistFixedPriceItem.html" />

Enables a seller to take a relist an eBay listing that has ended. This call supports 
multiple-variation listings.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\RelistFixedPriceItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new RelistFixedPriceItem(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## RelistItem <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/RelistItem.html" />

Enables a seller to take a relist an eBay listing that has ended.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\RelistItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new RelistItem(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## ReviseFixedPriceItem <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/ReviseFixedPriceItem.html" />

Enables a seller to change the properties of an active, fixed-price listing. This call supports 
multiple-variation listings.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\ReviseFixedPriceItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new ReviseFixedPriceItem(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## ReviseInventoryStatus <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/ReviseInventoryStatus.html" />

Enables a seller to change the price and/or quantity of an active fixed-price listing.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\ReviseInventoryStatus;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new ReviseInventoryStatus(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## ReviseItem <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/ReviseItem.html" />

Enables a seller to change the properties of an active listing. 

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\ReviseItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new ReviseItem(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## VerifyAddFixedPriceItem <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/VerifyAddFixedPriceItem.html" />

Enables a seller to verify that a newly created fixed-price listing is valid before actually 
publishing the listing. This call supports multiple-variation listings.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\VerifyAddFixedPriceItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new VerifyAddFixedPriceItem(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## VerifyAddItem <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/VerifyAddItem.html" />

Enables a seller to verify that a newly created listing is valid before actually publishing the
listing.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\VerifyAddItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new VerifyAddItem(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## VerifyRelistItem <DocsBadge path="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/VerifyRelistItem.html" />

Enables a seller to verify that a newly revised listing is valid before actually relisting the item. 
Expected listing fees will also be returned.

```php
use Rat\eBaySDK\API\TraditionalAPI\Listing\VerifyRelistItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new VerifyRelistItem(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```