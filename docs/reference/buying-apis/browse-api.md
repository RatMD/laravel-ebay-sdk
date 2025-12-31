---
outline: deep
---
# Browse API <Badge type="warning" style="margin-left:0.75rem;">v1.20.4</Badge> <DocsBadge path="buy/browse/static/overview.html" />

The Browse API allows users to search for eBay items by various criteria, such as keywords, 
categories, or even images, as well as retrieve the details of a specific item or items.

## Item

### CheckCompatibility <DocsBadge path="buy/browse/resources/item/methods/checkCompatibility" />

<ResourcePath method="POST">/item/{itemId}/check_compatibility</ResourcePath>

This method checks if a product is compatible with the specified item. You can use this method to 
check the compatibility of cars, trucks, and motorcycles with a specific part listed on eBay.

For example, to check the compatibility of a part, you pass in the item_id of the part as a URI 
parameter and specify all the attributes used to define a specific car within the 
compatibilityProperties container. If the call is successful, the response will be COMPATIBLE, 
NOT_COMPATIBLE, or UNDETERMINED. Refer to compatibilityStatus for details.

> [!NOTE]
> The only products supported are cars, trucks, and motorcycles.

To find the attributes and values for a specific marketplace, you can use the compatibility methods 
in the Taxonomy API. You can use this data to create menus to help buyers specify the product, such 
as their car.

```php
use Rat\eBaySDK\API\BrowseAPI\Item\CheckCompatibility;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CheckCompatibility(
    marketplaceId: (string) $marketplaceId,
    itemId: (string) $itemId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### GetItem <DocsBadge path="buy/browse/resources/item/methods/getItem" />

<ResourcePath method="GET">/item/{itemId}</ResourcePath>

This method retrieves the details of a specific item, such as description, price, category, all item 
aspects, condition, return policies, seller feedback and score, shipping options, shipping costs, 
estimated delivery, and other information the buyer needs to make a purchasing decision.

The Buy APIs are designed to let you create an eBay shopping experience in your app or website. This 
means you will need to know when something, such as the availability, quantity, etc., has changed in
any eBay item you are offering. This is easily achieved by setting the fieldgroups URI parameter to 
one of the following values:

- `COMPACT`  
  Reduces the response to only those fields necessary in order to determine if any item detail has 
  changed. This field group must be used alone.
- `PRODUCT`  
  Adds fields to the default response that return information about the product/item. This field 
  group may also be used in conjunction with ADDITIONAL_SELLER_DETAILS.
- `ADDITIONAL_SELLER_DETAILS`  
  Adds an additional field to the response that returns the seller's user ID. This field group may 
  also be used in conjunction with PRODUCT.
- `CHARITY_DETAILS`  
  Adds additional fields to the response that return charity information associated with the item, 
  if applicable.

```php
use Rat\eBaySDK\API\BrowseAPI\Item\GetItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItem(
    marketplaceId: (string) $marketplaceId,
    itemId: (string) $itemId,
    fieldGroups: (string) $fieldGroups = null,
    quantityForShippingEstimate: (int) $quantityForShippingEstimate = null,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

### GetItemByLegacyId <DocsBadge path="buy/browse/resources/item/methods/getItemByLegacyId" />

<ResourcePath method="GET">/item/get_item_by_legacy_id</ResourcePath>

This method is a bridge between the eBay legacy APIs, such as Shopping and Finding, and the eBay Buy 
APIs. There are differences between how legacy APIs and RESTful APIs return the identifier of an 
"item" and what the item ID represents. This method lets you use the legacy item ids retrieve the 
details of a specific item, such as description, price, and other information the buyer needs to 
make a purchasing decision. It also returns the RESTful item_id, which you can use with all the Buy 
API methods.

This method returns the item details and requires you to pass in either the item_id of a 
non-variation item or the item_id values for both the parent and child of an item group.

> [!NOTE] 
> An item group is an item that has various aspect differences, such as color, size, storage capacity, etc.

When an item group is created, one of the item variations, such as the red shirt size L, is chosen 
as the "parent". All other items in the group are the children, such as the blue shirt size L, red 
shirt size M, etc.

The fieldgroups URI parameter lets you control what is returned in the response:

- Setting fieldgroups to `PRODUCT` adds additional fields to the default response that return 
information about the product of the item.
- Setting the fieldgroups to `ADDITIONAL_SELLER_DETAILS` adds an additional field to the response 
that returns the seller's user ID.
- Setting the fieldgroups to `CHARITY_DETAILS` adds additional fields to the response that return 
charity information associated with the item, if applicable.

```php
use Rat\eBaySDK\API\BrowseAPI\Item\GetItemByLegacyId;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItemByLegacyId(
    marketplaceId: (string) $marketplaceId,
    legacyItemId: (string) $legacyItemId,
    legacyVariationId: (string) $legacyVariationId = null,
    legacyVariationSku: (string) $legacyVariationSku = null,
    fieldGroups: (string) $fieldGroups = null,
    quantityForShippingEstimate: (int) $quantityForShippingEstimate = null,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

### GetItems <DocsBadge path="buy/browse/resources/item/methods/getItems" />

<ResourcePath method="GET">/item</ResourcePath>

This method retrieves the details about specific items that buyers need to make a purchasing 
decision.

> [!NOTE]
> This is a [Limited Release](https://developer.ebay.com/api-docs/static/versioning.html#limited) 
> available only to select Partners.
>  
> For this method, only the following fields are returned: bidCount, currentBidPrice, 
> eligibleForInlineCheckout, enabledForGuestCheckout, estimatedAvailabilities, gtin, immediatePay, 
> itemAffiliateWebUrl, itemCreationDate, itemEndDate, itemId, itemWebUrl, legacyItemId, 
> minimumPriceToBid, price, priorityListing, reservePriceMet, sellerItemRevision, taxes, 
> topRatedBuyingExperience, and uniqueBidderCount.
>  
> The array shippingOptions, which comprises multiple fields, is also returned if the 
> `X-EBAY-C-ENDUSERCTX` header is supplied.

```php
use Rat\eBaySDK\API\BrowseAPI\Item\GetItems;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItems(
    marketplaceId: (string) $marketplaceId,
    itemIds: (string) $itemIds,
    itemGroupIds: (string) $itemGroupIds = null,
    quantityForShippingEstimate: (int) $quantityForShippingEstimate = null,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

### GetItemsByItemGroup <DocsBadge path="buy/browse/resources/item/methods/getItemsByItemGroup" />

<ResourcePath method="GET">/item/get_items_by_item_group</ResourcePath>

This method retrieves details about individual items in an item group. An item group is an item that 
has various aspect differences, such as color, size, storage capacity, etc.

You pass in the item_group_id as a URI parameter.

This method returns two main containers:
- **items**  
  This container has an array of containers with the details about each item in the group.
- **commonDescriptions**  
  This container has an array of containers for a description and the item_ids for all items that 
  have this exact description. Because items within an item group often have the same description, 
  this decreases the size of the response.
  
Setting the fieldgroup to `ADDITIONAL_SELLER_DETAILS` adds an additional field to the response that 
returns the seller's user ID. Setting the fieldgroup to `CHARITY_DETAILS` adds additional fields to 
the response that returns charity information associated with the item, if applicable. 

```php
use Rat\eBaySDK\API\BrowseAPI\Item\GetItemsByItemGroup;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItemsByItemGroup(
    marketplaceId: (string) $marketplaceId,
    itemGroupId: (string) $itemGroupId,
    fieldGroups: (string) $fieldGroups = null,
    quantityForShippingEstimate: (int) $quantityForShippingEstimate = null,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

## ItemSummary

### Search <DocsBadge path="buy/browse/resources/item_summary/methods/search" />

<ResourcePath method="GET">/item_summary/search</ResourcePath>

This method searches for eBay items by various query parameters and retrieves summaries of the items. 
You can search by keyword, category, eBay product ID (ePID), or GTIN, charity ID, or a combination 
of these.

> [!NOTE] 
> Only listings where FIXED_PRICE (Buy It Now) is a buying option are returned by default. To 
> retrieve listings that do not have FIXED_PRICE as a buying option, the buyingOptions filter can be 
> used to retrieve those listings.
>  
> Note that an auction listing enabled with the Buy it Now feature will initially show `AUCTION` and 
> `FIXED_PRICE` as buying options, but if/when that auction listing receives a qualifying bid, only 
> `AUCTION` remains as a buying option. If this happens, the buyingOptions filter would need to be `
> used to retrieve that auction listing.

This method also supports the following:

- Filtering by the value of one or multiple fields, such as listing format, item condition, price 
range, location, and more. For the fields supported by this method, refer to the filter parameter.
- Retrieving the refinements (metadata) of an item, such as item aspects (color, brand) condition, 
category, etc. using the fieldgroups parameter.
- Filtering by item aspects and other refinements using the aspect_filter parameter.
- Filtering for items that are compatible with a specific product, using the compatibility_filter 
parameter.
- Creating aspects histograms, which enables shoppers to drill down in each refinement narrowing the 
search results.

```php
use Rat\eBaySDK\API\BrowseAPI\ItemSummary\Search;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new Search(
    marketplaceId: (string) $marketplaceId,
    q: (string) $q = null,
    gtin: (string) $gtin = null,
    charityIds: (string) $charityIds = null,
    epid: (string) $epid = null,
    categoryIds: (string) $categoryIds = null,
    autoCorrect: (string) $autoCorrect = null,
    fieldGroups: (string) $fieldGroups = null,
    aspectFilter: (string) $aspectFilter = null,
    compatibilityFilter: (string) $compatibilityFilter = null,
    filter: (string) $filter = null,
    sort: (string) $sort = null,
    limit: (int) $limit = 50,
    offset: (int) $offset = 0,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

### SearchByImage <DocsBadge path="buy/browse/resources/item_summary/methods/searchByImage" />

<ResourcePath method="POST">/item_summary/search_by_image</ResourcePath>

This method searches for eBay items based on a image and retrieves summaries of the items. You pass 
in a Base64 image in the request payload and can refine the search by category, or with other 
available filters.

To get the Base64 image string, you can use sites such as https://codebeautify.org/image-to-base64-converter.

This method also supports the following:

- Filtering by the value of one or multiple fields, such as listing format, item condition, price 
range, location, and more. For the fields supported by this method, refer to the filter parameter.
- Filtering by item aspects using the aspect_filter parameter.

```php
use Rat\eBaySDK\API\BrowseAPI\ItemSummary\SearchByImage;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SearchByImage(
    marketplaceId: (string) $marketplaceId,
    base64Image: (string) $base64Image,
    charityIds: (string) $charityIds = null,
    categoryIds: (string) $categoryIds = null,
    fieldGroups: (string) $fieldGroups = null,
    aspectFilter: (string) $aspectFilter = null,
    filter: (string) $filter = null,
    sort: (string) $sort = null,
    limit: (int) $limit = 50,
    offset: (int) $offset = 0,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```
