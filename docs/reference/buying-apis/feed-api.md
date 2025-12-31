---
outline: deep
---
# Feed API <Badge type="warning" style="margin-left:0.75rem;">v1.2.1</Badge> <DocsBadge path="buy/feed/v1/static/overview.html" />

The Feed API gives users the ability mirror an eBay category by downloading feed files of the items 
in chosen categories or specific marketplaces.

> [!NOTE] 
> This is a [Limited Release](https://developer.ebay.com/api-docs/static/versioning.html#limited) 
> API available only to select developers approved by business units.

## Access

### GetAccess <DocsBadge path="buy/feed/v1/resources/access/methods/getAccess" />

<ResourcePath method="GET">/access</ResourcePath>

The getAccess method retrieves the access rules specific to the application; for example, the feed 
types to which the application has permissions. An application may be constrained to certain 
marketplaces, and to specific L1 categories within those marketplaces. You can use this information 
to apply filters to the getFiles method when obtaining details on accessible downloadable files.

```php
use Rat\eBaySDK\API\FeedAPI\Access\GetAccess;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetAccess();
$response = $client->execute($request);
```

## FeedType

### GetFeedType <DocsBadge path="buy/feed/v1/resources/feed_type/methods/getFeedType" />

<ResourcePath method="GET">/feed_type/{feedTypeId}</ResourcePath>

Use the getFeedType method to obtain the details about a particular feed type to determine its 
applicability to your needs.

With the response, you can compare the eBay marketplaces and categories with the eBay marketplaces 
and categories that your application is enabled to access. By making these comparisons, you can 
avoid attempting to download feed files that you do not have access to.

```php
use Rat\eBaySDK\API\FeedAPI\FeedType\GetFeedType;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetFeedType(
    feedTypeId: (string) $feedTypeId
);
$response = $client->execute($request);
```

### GetFeedTypes <DocsBadge path="buy/feed/v1/resources/feed_type/methods/getFeedTypes" />

<ResourcePath method="GET">/feed_type</ResourcePath>

Use the getFeedTypes method to obtain the details about one or more feed types that are available to 
be downloaded. If no query parameters are used, all possible feed types are returned.

You can filter your search by adding feed_scope and/or marketplace_ids parameters to the URI.

```php
use Rat\eBaySDK\API\FeedAPI\FeedType\GetFeedTypes;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetFeedTypes(
    feedScope: (string) $feedScope = null,
    marketplaceIds: (string) $marketplaceIds = null,
    limit: (int) $limit = 20,
    continuationToken: (string) $continuationToken = null,
);
$response = $client->execute($request);
```

## File

### DownloadFile <DocsBadge path="buy/feed/v1/resources/file/methods/downloadFile" />

<ResourcePath method="GET">/file/{fileId}/download</ResourcePath>

Use the downloadFile method to download a selected feed file.

> [!NOTE]
> The downloaded file will be gzipped automatically, so there is no reason to supply 
> Accept-Encoding:gzip as a header. If this header is supplied, the downloaded file will be 
> compressed twice, and this has no extra benefit.

Use the getFiles methods to obtain the file_id of the specific feed file you require.

```php
use Rat\eBaySDK\API\FeedAPI\File\DownloadFile;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DownloadFile(
    marketplaceId: (string) $marketplaceId,
    fileId: (string) $fileId,
    range: (string) $range = null,
);
$response = $client->execute($request);
```

### GetFile <DocsBadge path="buy/feed/v1/resources/file/methods/getFile" />

<ResourcePath method="GET">/file/{fileId}</ResourcePath>

Use the getFile method to fetch the details of a feed file available to download, as specified by 
the file's file_id.

Details in the response include: the feed's file_id, the date it became available, eBay categories 
that support the feed, its frequency, the time span it covers, its feed type, its format, its size 
in bytes, the schema under which it was pulled, and the marketplaces it applies to.

```php
use Rat\eBaySDK\API\FeedAPI\File\GetFile;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetFile(
    marketplaceId: (string) $marketplaceId,
    fileId: (string) $fileId,
);
$response = $client->execute($request);
```

### GetFiles <DocsBadge path="buy/feed/v1/resources/file/methods/getFiles" />

<ResourcePath method="GET">/file</ResourcePath>

The getFiles method provides a list of the feed files available for download.

Details for each feed returned include the date the feed was generated, the frequency with which it 
is pulled, its feed type, its fileId, its format, the eBay marketplaces it applies to, the schema 
version under which it was generated, its size in bytes, and the time span it covers (in hours).

You can limit your search results by feed type, marketplace, scope, eBay L1 category, and how far 
back in time from the present the feed was made available. Set the look_back field to control 
exactly how many feeds from the past are retrieved.

```php
use Rat\eBaySDK\API\FeedAPI\File\GetFiles;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetFiles(
    marketplaceId: (string) $marketplaceId,
    feedTypeId: (string) $feedTypeId,
    feedScope: (string) $feedScope = null,
    categoryIds: (string) $categoryIds = null,
    lookBack: (string) $lookBack = null,
    limit: (int) $limit = 20,
    continuationToken: (string) $continuationToken = null,
);
$response = $client->execute($request);
```
