---
outline: deep
---
# Feed Beta API <Badge type="warning" style="margin-left:0.75rem;">v1_beta.35.3</Badge> <DocsBadge path="buy/feed/static/overview.html" />

The Feed Beta API gives you the ability to:

- Download an entire category of items from a specific eBay marketplace.
- Download all the items listed in a specific day, category, and marketplace.
- Download the item group variation information for an item
- Curate the items off-line by item aspects, price, product, payment method, ship-to location, etc.
- Keep the item information up-to-date using hourly feed files.
- Track changes to the status of priority items within specified campaigns using daily priority item feed files.

> [!NOTE]
> This is a [Limited Release](https://developer.ebay.com/api-docs/static/versioning.html#limited) 
> API available only to select developers approved by business units.

## Item

### GetItemFeed <DocsBadge path="buy/feed/resources/item/methods/getItemFeed" />

<ResourcePath method="GET">/item</ResourcePath>

This method lets you download a TSV_GZIP (tab separated value gzip) Item feed file. The feed file 
contains all the items from all the child categories of the specified category. The first line of 
the file is the header, which labels the columns and indicates the order of the values on each line. 
Each header is described in the Response fields section.

There are two types of item feed files generated:
- A daily Item feed file containing all the newly listed items for a specific category, date, and 
  marketplace (feed_scope = NEWLY_LISTED)
- A weekly Item Bootstrap feed file containing all the items in a specific category and marketplace 
  (feed_scope = ALL_ACTIVE)

> [!NOTE] 
> Filters are applied to the feed files. For details, see Feed File Filters. When curating the items 
> returned, be sure to code as if these filters are not applied as they can be changed or removed in 
> the future.

> [!NOTE]
> The downloaded file will be gzipped automatically, so there is no reason to supply 
> Accept-Encoding:gzip as a header. If this header is supplied, the downloaded file will be 
> compressed twice, and this has no extra benefit.

```php
use Rat\eBaySDK\API\FeedBetaAPI\Item\GetItemFeed;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItemFeed(
    marketplaceId: (string) $marketplaceId,
    feedScope: (string) $feedScope,
    categoryId: (string) $categoryId,
    date: (string) $date = null,
    range: (string) $range = null,
);
$response = $client->execute($request);
```

## ItemGroup

### GetItemGroupFeed <DocsBadge path="buy/feed/resources/item_group/methods/getItemGroupFeed" />

<ResourcePath method="GET">/item_group</ResourcePath>

This method lets you download a TSV_GZIP (tab separated value gzip) Item Group feed file. An item 
group is an item that has various aspect differences, such as color, size, storage capacity, etc.

There are two types of item group feed files generated:

- A daily Item Group feed file containing the item group variation information associated with items 
  returned in the Item feed file for a specific day, category, and marketplace. 
  (feed_scope = NEWLY_LISTED)
- A weekly Item Group Bootstrap feed file containing all the item group variation information 
  associated with items returned in the Item Bootstrap feed file for all the items in a specific 
  category. (feed_scope = ALL_ACTIVE)

> [!NOTE]
> Filters are applied to the feed files. For details, see Feed File Filters. When curating the items 
> returned, be sure to code as if these filters are not applied as they can be changed or removed in 
> the future.

> [!NOTE]
> The downloaded file will be gzipped automatically, so there is no reason to supply 
> Accept-Encoding:gzip as a header. If this header is supplied, the downloaded file will be 
> compressed twice, and this has no extra benefit.

The contents of these feed files are based on the contents of the corresponding daily Item or Item 
Bootstrap feed file. When a new Item or Item Bootstrap feed file is generated, the service reads the 
file and if an item in the file has a primaryItemGroupId value, which indicates the item is part of 
an item group, it uses that value to return the item group (parent item) information for that item 
in the corresponding Item Group or Item Group Bootstrap feed file.

This information includes the name/value pair of the aspects of the items in this group returned in 
the variesByLocalizedAspects column. For example, if the item was a shirt some of the variation 
names could be Size, Color, etc. Also the images for the various aspects are returned in the 
additionalImageUrls column.

The first line in any feed file is the header, which labels the columns and indicates the order of 
the values on each line. Each header is described in the Response fields section.

```php
use Rat\eBaySDK\API\FeedBetaAPI\ItemGroup\GetItemGroupFeed;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItemGroupFeed(
    marketplaceId: (string) $marketplaceId,
    feedScope: (string) $feedScope,
    categoryId: (string) $categoryId,
    date: (string) $date = null,
    range: (string) $range = null,
);
$response = $client->execute($request);
```

## ItemPriority

### GetItemPriorityFeed <DocsBadge path="buy/feed/resources/item_priority/methods/getItemPriorityFeed" />

<ResourcePath method="GET">/item_priority</ResourcePath>

Using this method, you can download a TSV_GZIP (tab separated value gzip) Item Priority feed file, 
which allows you to track changes (deltas) in the status of your priority items, such as when an 
item is added or removed from a campaign. The delta feed tracks the changes to the status of items 
within a category you specify in the input URI. You can also specify a specific date for the feed 
you want returned.

> [!CAUTION]
> You must consume the daily feeds (Item, Item Group) before consuming the Item Priority feed. This 
> ensures that your inventory is up to date.

> [!NOTE]
> The downloaded file will be gzipped automatically, so there is no reason to supply 
> Accept-Encoding:gzip as a header. If this header is supplied, the downloaded file will be 
> compressed twice, and this has no extra benefit.

```php
use Rat\eBaySDK\API\FeedBetaAPI\ItemPriority\GetItemPriorityFeed;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItemPriorityFeed(
    marketplaceId: (string) $marketplaceId,
    categoryId: (string) $categoryId,
    date: (string) $date,
    range: (string) $range = null,
);
$response = $client->execute($request);
```

## ItemSnapshot

### GetItemSnapshotFeed <DocsBadge path="buy/feed/resources/item_snapshot/methods/getItemSnapshotFeed" />

<ResourcePath method="GET">/item_snapshot</ResourcePath>

The Hourly Snapshot feed file is generated each hour every day for most categories. This method lets 
you download an Hourly Snapshot TSV_GZIP (tab-separated value gzip) feed file containing the details 
of all the items that have changed within the specified day and hour for a specific category. This 
means to generate the 8AM file of items that have changed from 8AM and 8:59AM, the service starts at 
9AM. You can retrieve the 8AM snapshot file at 10AM.

Snapshot feeds now include new listings. You can check itemCreationDate to identify listings that 
were newly created within the specified hour.

> [!NOTE]
> Filters are applied to the feed files. For details, see Feed File Filters. When curating the items 
> returned, be sure to code as if these filters are not applied as they can be changed or removed in 
> the future.

You can use the response from this method to update the item details of items stored in your
database. By looking at the value of itemSnapshotDate for a given item, you will be able to tell 
which information is the latest.

> [!CAUTION] 
> When the value of the availability column is UNAVAILABLE, only the itemId and availability columns 
> are populated.

> [!NOTE]
> The downloaded file will be gzipped automatically, so there is no reason to supply 
> Accept-Encoding:gzip as a header. If this header is supplied, the downloaded file will be 
> compressed twice, and this has no extra benefit.

```php
use Rat\eBaySDK\API\FeedBetaAPI\ItemSnapshot\GetItemSnapshotFeed;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItemSnapshotFeed(
    marketplaceId: (string) $marketplaceId,
    categoryId: (string) $categoryId,
    snapshotDate: (string) $snapshotDate,
    range: (string) $range = null,
);
$response = $client->execute($request);
```