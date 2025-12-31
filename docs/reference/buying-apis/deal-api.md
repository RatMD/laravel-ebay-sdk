---
outline: deep
---
# Deal API <Badge type="warning" style="margin-left:0.75rem;">v1.3.0</Badge> <DocsBadge path="buy/deal/static/overview.html" />

The Deal API allows third-party developers to search for and retrieve details about eBay deals and 
events, as well as the items associated with those deals and events.

> [!NOTE]
> This is a [Limited Release](https://developer.ebay.com/api-docs/static/versioning.html#limited) 
> API available only to select developers approved by business units.

## DealItem

### GetDealItems <DocsBadge path="buy/deal/resources/deal_item/methods/getDealItems" />

<ResourcePath method="GET">/deal_item</ResourcePath>

This method retrieves a paginated set of deal items. The result set contains all deal items 
associated with the specified search criteria and marketplace ID.

```php
use Rat\eBaySDK\API\DealAPI\DealItem\GetDealItems;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetDealItems(
    marketplaceId: (string) $marketplaceId,
    categoryIds: (string) $categoryIds = null,
    commissionable: (bool) $commissionable = null,
    deliveryCountry: (string) $deliveryCountry = null,
    limit: (int) $limit = 100,
    offset: (int) $offset = 0,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

## Event

### GetEvent <DocsBadge path="buy/deal/resources/event/methods/getEvent" />

<ResourcePath method="GET">/event/{eventId}</ResourcePath>

This method retrieves the details for an eBay event. The result set contains detailed information 
associated with the specified event ID, such as applicable coupons, start and end dates, and event
terms.

```php
use Rat\eBaySDK\API\DealAPI\Event\GetEvent;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetEvent(
    marketplaceId: (string) $marketplaceId,
    eventId: (string) $eventId,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

### GetEvents <DocsBadge path="buy/deal/resources/event/methods/getEvents" />

<ResourcePath method="GET">/event</ResourcePath>

This method returns paginated results containing all eBay events for the specified marketplace.

```php
use Rat\eBaySDK\API\DealAPI\Event\GetEvents;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetEvents(
    marketplaceId: (string) $marketplaceId,
    limit: (int) $limit = 20,
    offset: (int) $offset = 0,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

## EventItem

### GetEventItems <DocsBadge path="buy/deal/resources/event_item/methods/getEventItems" />

<ResourcePath method="GET">/event/{eventId}</ResourcePath>

This method returns a paginated set of event items. The result set contains all event items 
associated with the specified search criteria and marketplace ID.

```php
use Rat\eBaySDK\API\DealAPI\EventItem\GetEventItems;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetEventItems(
    marketplaceId: (string) $marketplaceId,
    eventIds: (string) $eventIds,
    categoryIds: (string) $categoryIds = null,
    commissionable: (bool) $commissionable = null,
    deliveryCountry: (string) $deliveryCountry = null,
    limit: (int) $limit = 20,
    offset: (int) $offset = 0,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```
