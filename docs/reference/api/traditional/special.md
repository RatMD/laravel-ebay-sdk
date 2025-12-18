---
outline: deep
---
# Traditional / Special Offer and Listing <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/SpecialOfferIndex.html" />

This Call Reference describes the elements and attributes for each Special Offer and Listing call 
below.

## AddSecondChanceItem <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/AddSecondChanceItem.html" />

Creates a new Second Chance Offer (that is, an offer for an unsold item) for one of that item's 
non-winning bidders.

```php
use Rat\eBaySDK\API\TraditionalAPI\Special\AddSecondChanceItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new AddSecondChanceItem(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetAdFormatLeads <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetAdFormatLeads.html" />

Retrieves sales lead information for a lead generation listing.

```php
use Rat\eBaySDK\API\TraditionalAPI\Special\GetAdFormatLeads;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetAdFormatLeads(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetBestOffers <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetBestOffers.html" />

Retrieves best offers.

```php
use Rat\eBaySDK\API\TraditionalAPI\Special\GetBestOffers;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetBestOffers(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## PlaceOffer <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/PlaceOffer.html" />

Enables the authenticated user to to make a bid, a Best Offer, or a purchase on the item specified 
by the ItemID input field.

```php
use Rat\eBaySDK\API\TraditionalAPI\Special\PlaceOffer;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new PlaceOffer(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## RespondToBestOffer <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/RespondToBestOffer.html" />

This call enables the seller to accept or decline a buyer's Best Offer on an item, or make a counter 
offer to the buyer's Best Offer.

```php
use Rat\eBaySDK\API\TraditionalAPI\Special\RespondToBestOffer;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new RespondToBestOffer(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## VerifyAddSecondChanceItem <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/VerifyAddSecondChanceItem.html" />

Simulates the creation of a new Second Chance Offer listing of an item without actually creating a
listing.

```php
use Rat\eBaySDK\API\TraditionalAPI\Special\VerifyAddSecondChanceItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new VerifyAddSecondChanceItem(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```