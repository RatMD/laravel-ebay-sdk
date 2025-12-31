---
outline: deep
---
# Inventory API <Badge type="warning" style="margin-left:0.75rem;">v1.18.4</Badge> <DocsBadge path="sell/inventory/static/overview.html" />

The Inventory API is used to create and manage inventory item records, and then convert these 
inventory items into product offers on eBay marketplaces. The Inventory API has the following 
entities:

- **Location**: a seller must have at least one store or warehouse inventory location set up before 
that seller can start creating and publishing offers with the Inventory API. Every inventory 
location must also have a seller-defined merchant location key value.
- **Inventory Item**: before a product can be sold in an offer on an eBay marketplace, an inventory 
item record must exist for that product. An inventory item record contains such things as product 
details, item condition, quantity available. Every Inventory Item must also have a seller-defined 
SKU value, and this value must be unique across the seller's inventory.
- **Offer**: an offer is what becomes a live eBay listing. An offer is first created, and then it is 
published with the Inventory API. Each offer must be associated with an eBay marketplace, an 
inventory item, an inventory location, and a category ID. The offer will contain quantity available 
for the offer, the listing description, and an offer price. Every offer must also reference a 
payment, a fulfillment, and a return business policy, so the seller must be opted in, and have 
business policies available to apply against the offers.
- **Inventory Item Group**: an inventory item group is necessary if the seller would like to create 
and manage multiple-variation listings through the Inventory API. An inventory item group is a 
collection of similar inventory items that might vary on a couple of aspects like color and size.
- **Compatible Products**: the product compatibility calls allow the seller to create a compatible 
vehicle list, or vehicles that are compatible with a motor vehicle part or accessory.

> [!CAUTION] IMPORTANT
> Publish offer note: Fields may be optional or conditionally required when calling a method, but 
> become required when publishing the offer to create an active listing. For details, see Required 
> fields for publishing an offer.

> [!NOTE]
> Please note that any eBay listing created using the Inventory API cannot be revised or relisted 
> using the Trading API calls.

> [!NOTE]
> Each listing can be revised up to 250 times in one calendar day. If this revision threshold is 
> reached, the seller will be blocked from revising the item until the next calendar day.

## InventoryItem

### BulkCreateOrReplaceInventoryItem <DocsBadge path="sell/inventory/resources/inventory_item/methods/bulkCreateOrReplaceInventoryItem" />

<ResourcePath method="POST">/bulk_create_or_replace_inventory_item</ResourcePath>

This call can be used to create and/or update up to 25 new inventory item records. It is up to 
sellers whether they want to create a complete inventory item records right from the start, or 
sellers can provide only some information with the initial bulkCreateOrReplaceInventoryItem call, 
and then make one or more additional bulkCreateOrReplaceInventoryItem calls to complete all required 
fields for the inventory item records and prepare for publishing. Upon first creating inventory 
item records, only the SKU values are required.

> [!IMPORTANT]
> Publish offer note: Fields may be optional or conditionally required when calling this method, but 
> become required when publishing the offer to create an active listing. For this method, see 
> Inventory item fields for a list of fields required to publish an offer.

> [!NOTE]
> In addition to the authorization header, which is required for all eBay REST API calls, this call 
> also requires the Content-Language and Content-Type headers. See the HTTP request headers section 
> for more information.

In the case of updating existing inventory item records, the bulkCreateOrReplaceInventoryItem call 
will do a complete replacement of the existing inventory item records, so all fields that are 
currently defined for the inventory item record are required in that update action, regardless of 
whether their values changed. So, when replacing/updating an inventory item record, it is advised 
that the seller run a 'Get' call to retrieve the full details of the inventory item records and see 
all of its current values/settings before attempting to update the records. Any changes that are 
made to inventory item records that are part of one or more active eBay listings, a successful call 
will automatically update these active listings.

The key information that is set with the bulkCreateOrReplaceInventoryItem call include:

- Seller-defined SKU value for the product. Each seller product, including products within an item 
inventory group, must have their own SKU value.
- Condition of the item
- Product details, including any product identifier(s), such as a UPC, ISBN, EAN, or 
Brand/Manufacturer Part Number pair, a product description, a product title, product/item aspects, 
and links to images. eBay will use any supplied eBay Product ID (ePID) or a GTIN (UPC, ISBN, or EAN) 
and attempt to match those identifiers to a product in the eBay Catalog, and if a product match is 
found, the product details for the inventory item will automatically be populated.
- Quantity of the inventory item that is available for purchase
- Package weight and dimensions, which is required if the seller will be offering calculated 
shipping options. The package weight will also be required if the seller will be providing flat-rate 
shipping services, but charging a weight surcharge.

For those who prefer to create or update a single inventory item record, the 
createOrReplaceInventoryItem method can be used.

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItem\BulkCreateOrReplaceInventoryItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkCreateOrReplaceInventoryItem(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### BulkGetInventoryItem <DocsBadge path="sell/inventory/resources/inventory_item/methods/bulkGetInventoryItem" />

<ResourcePath method="POST">/bulk_get_inventory_item</ResourcePath>

This call retrieves up to 25 inventory item records. The SKU value of each inventory item record to 
retrieve is specified in the request payload.

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItem\BulkGetInventoryItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkGetInventoryItem(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### BulkUpdatePriceQuantity <DocsBadge path="sell/inventory/resources/inventory_item/methods/bulkUpdatePriceQuantity" />

<ResourcePath method="POST">/bulk_update_price_quantity</ResourcePath>

This call is used by the seller to update the total ship-to-home quantity of one inventory item, 
and/or to update the price and/or quantity of one or more offers associated with one inventory item. 
Up to 25 offers associated with an inventory item may be updated with one bulkUpdatePriceQuantity 
call. Only one SKU (one product) can be updated per call.

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItem\BulkUpdatePriceQuantity;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkUpdatePriceQuantity(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### CreateOrReplaceInventoryItem <DocsBadge path="sell/inventory/resources/inventory_item/methods/createOrReplaceInventoryItem" />

<ResourcePath method="PUT">/inventory_item/{sku}</ResourcePath>

This call creates a new inventory item record or replaces an existing inventory item record. It is 
up to sellers whether they want to create a complete inventory item record right from the start, or 
sellers can provide only some information with the initial createOrReplaceInventoryItem call, and 
then make one or more additional createOrReplaceInventoryItem calls to complete all required fields 
for the inventory item record and prepare it for publishing. Upon first creating an inventory item 
record, only the SKU value in the call path is required.

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItem\CreateOrReplaceInventoryItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateOrReplaceInventoryItem(
    sku: (string) $sku,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### DeleteInventoryItem <DocsBadge path="sell/inventory/resources/inventory_item/methods/deleteInventoryItem" />

<ResourcePath method="DELETE">/inventory_item/{sku}</ResourcePath>

This call is used to delete an inventory item record associated with a specified SKU. A successful 
call will not only delete that inventory item record, but will also have the following effects:

- Delete any and all unpublished offers associated with that SKU;
- Delete any and all single-variation eBay listings associated with that SKU;
- Automatically remove that SKU from a multiple-variation listing and remove that SKU from any and 
all inventory item groups in which that SKU was a member.

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItem\DeleteInventoryItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteInventoryItem(
    sku: (string) $sku,
);
$response = $client->execute($request);
```

### GetInventoryItem <DocsBadge path="sell/inventory/resources/inventory_item/methods/getInventoryItem" />

<ResourcePath method="GET">/inventory_item/{sku}</ResourcePath>

This call retrieves the inventory item record for a given SKU. The SKU value is passed in at the end 
of the call URI. There is no request payload for this call.

The authorization header is the only required HTTP header for this call, and it is required for all 
Inventory API calls. See the HTTP request headers section for more information.

For those who prefer to retrieve numerous inventory item records by SKU value with one call (up to 
25 at a time), the bulkGetInventoryItem method can be used. To retrieve all inventory item records 
defined on the seller's account, the getInventoryItems method can be used (with pagination control 
if desired).

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItem\GetInventoryItem;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetInventoryItem(
    sku: (string) $sku,
);
$response = $client->execute($request);
```

### GetInventoryItems <DocsBadge path="sell/inventory/resources/inventory_item/methods/getInventoryItem" />

<ResourcePath method="GET">/inventory_item</ResourcePath>

This call retrieves all inventory item records defined for the seller's account. The limit query 
parameter allows the seller to control how many records are returned per page, and the offset query 
parameter is used to retrieve a specific page of records. The seller can make multiple calls to scan 
through multiple pages of records. There is no request payload for this call.

The authorization header is the only required HTTP header for this call, and it is required for all 
Inventory API calls. See the HTTP request headers section for more information.

For those who prefer to retrieve numerous inventory item records by SKU value with one call (up to 
25 at a time), the bulkGetInventoryItem method can be used.

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItem\GetInventoryItems;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetInventoryItems(
    limit: (int) $limit = 25,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### ProductCompatibility

#### CreateOrReplaceProductCompatibility <DocsBadge path="sell/inventory/resources/inventory_item/product_compatibility/methods/createOrReplaceProductCompatibility" />

<ResourcePath method="PUT">/inventory_item/{sku}/product_compatibility</ResourcePath>

This call is used by the seller to create or replace a list of products that are compatible with the 
inventory item. The inventory item is identified with a SKU value in the URI. Product compatibility 
is currently only applicable to motor vehicle parts and accessory categories, but more categories 
may be supported in the future.

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItem\ProductCompatibility\CreateOrReplaceProductCompatibility;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateOrReplaceProductCompatibility(
    sku: (string) $sku,
    payload: (array) $payload
);
$response = $client->execute($request);
```

#### DeleteProductCompatibility <DocsBadge path="sell/inventory/resources/inventory_item/product_compatibility/methods/deleteProductCompatibility" />

<ResourcePath method="DELETE">/inventory_item/{sku}/product_compatibility</ResourcePath>

This call is used by the seller to delete the list of products that are compatible with the 
inventory item that is associated with the compatible product list. The inventory item is identified 
with a SKU value in the URI. Product compatibility is currently only applicable to motor vehicle 
parts and accessory categories, but more categories may be supported in the future.

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItem\ProductCompatibility\DeleteProductCompatibility;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteProductCompatibility(
    sku: (string) $sku,
);
$response = $client->execute($request);
```

#### GetProductCompatibility <DocsBadge path="sell/inventory/resources/inventory_item/product_compatibility/methods/deleteProductCompatibility" />

<ResourcePath method="GET">/inventory_item/{sku}/product_compatibility</ResourcePath>

This call is used by the seller to retrieve the list of products that are compatible with the 
inventory item. The SKU value for the inventory item is passed into the call URI, and a successful 
call with return the compatible vehicle list associated with this inventory item. Product 
compatibility is currently only applicable to motor vehicle parts and accessory categories, but 
more categories may be supported in the future.

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItem\ProductCompatibility\GetProductCompatibility;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetProductCompatibility(
    sku: (string) $sku,
);
$response = $client->execute($request);
```

## InventoryItemGroup

### CreateOrReplaceInventoryItemGroup <DocsBadge path="sell/inventory/resources/inventory_item_group/methods/createOrReplaceInventoryItemGroup" />

This call creates a new inventory item group or updates an existing inventory item group. It is up 
to sellers whether they want to create a complete inventory item group record right from the start, 
or sellers can provide only some information with the initial createOrReplaceInventoryItemGroup call, 
and then make one or more additional createOrReplaceInventoryItemGroup calls to complete the 
inventory item group record. Upon first creating an inventory item group record, the only required 
elements are the inventoryItemGroupKey identifier in the call URI, and the members of the inventory 
item group specified through the variantSKUs array in the request payload.

<ResourcePath method="PUT">/inventory_item_group/{groupKey}</ResourcePath>

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItemGroup\CreateOrReplaceInventoryItemGroup;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateOrReplaceInventoryItemGroup(
    groupKey: (string) $groupKey,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### DeleteInventoryItemGroup <DocsBadge path="sell/inventory/resources/inventory_item_group/methods/deleteInventoryItemGroup" />

<ResourcePath method="DELETE">/inventory_item_group/{groupKey}</ResourcePath>

This call deletes the inventory item group for a given inventoryItemGroupKey value.

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItemGroup\DeleteInventoryItemGroup;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteInventoryItemGroup(
    groupKey: (string) $groupKey,
);
$response = $client->execute($request);
```

### GetInventoryItemGroup <DocsBadge path="sell/inventory/resources/inventory_item_group/methods/getInventoryItemGroup" />

<ResourcePath method="GET">/inventory_item_group/{groupKey}</ResourcePath>

This call retrieves the inventory item group for a given inventoryItemGroupKey value. The 
inventoryItemGroupKey value is passed in at the end of the call URI.

```php
use Rat\eBaySDK\API\InventoryAPI\InventoryItemGroup\GetInventoryItemGroup;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetInventoryItemGroup(
    groupKey: (string) $groupKey,
);
$response = $client->execute($request);
```

## Listing 

### BulkMigrateListing <DocsBadge path="sell/inventory/resources/listing/methods/bulkMigrateListing" />

<ResourcePath method="POST">/bulk_migrate_listing</ResourcePath>

This call is used to convert existing eBay Listings to the corresponding Inventory API objects. If 
an eBay listing is successfully migrated to the Inventory API model, new Inventory Location, 
Inventory Item, and Offer objects are created. For a multiple-variation listing that is successfully 
migrated, in addition to the three new Inventory API objects just mentioned, an Inventory Item 
Group object will also be created. If the eBay listing is a motor vehicle part or accessory listing 
with a compatible vehicle list (ItemCompatibilityList container in Trading API's 
Add/Revise/Relist/Verify calls), a Product Compatibility object will be created.

```php
use Rat\eBaySDK\API\InventoryAPI\Listing\BulkMigrateListing;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkMigrateListing(
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### CreateOrReplaceSkuLocationMapping <DocsBadge path="sell/inventory/resources/listing/methods/createOrReplaceSkuLocationMapping" />

<ResourcePath method="PUT">/listing/{listingId}/sku/{sku}/locations</ResourcePath>

This method allows sellers to map multiple fulfillment center locations to single-SKU listing, or 
to a single SKU within a multiple-variation listing. This allows eBay to leverage the location 
metadata associated with a seller’s fulfillment centers to calculate more accurate estimated 
delivery dates on their listing.

```php
use Rat\eBaySDK\API\InventoryAPI\Listing\CreateOrReplaceSkuLocationMapping;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateOrReplaceSkuLocationMapping(
    listingId: (string) $listingId,
    sku: (string) $sku,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### DeleteSkuLocationMapping <DocsBadge path="sell/inventory/resources/listing/methods/deleteSkuLocationMapping" />

<ResourcePath method="DELETE">/listing/{listingId}/sku/{sku}/locations</ResourcePath>

This method allows sellers to remove all location mappings associated with a specific SKU within a 
listing. The listingId and sku of the listing are passed in as path parameters.

```php
use Rat\eBaySDK\API\InventoryAPI\Listing\DeleteSkuLocationMapping;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteSkuLocationMapping(
    listingId: (string) $listingId,
    sku: (string) $sku,
);
$response = $client->execute($request);
```

### GetSkuLocationMapping <DocsBadge path="sell/inventory/resources/listing/methods/getSkuLocationMapping" />

<ResourcePath method="GET">/listing/{listingId}/sku/{sku}/locations</ResourcePath>

This method allows sellers to retrieve the locations mapped to a specific SKU within a listing.

The listingId and sku of the listing are passed in as path parameters. This method only retrieves 
location mappings for a single SKU value; if a seller wishes to retrieve the location mappings for 
all items in a multiple-variation listing, this method must be called for each variation in the 
listing.

If there are fulfillment center locations mapped to the SKU, they will be returned in the locations 
array. If no locations are mapped to the SKU, status code 404 Not Found will be returned.

```php
use Rat\eBaySDK\API\InventoryAPI\Listing\GetSkuLocationMapping;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSkuLocationMapping(
    listingId: (string) $listingId,
    sku: (string) $sku,
);
$response = $client->execute($request);
```

## Location

### CreateInventoryLocation <DocsBadge path="sell/inventory/resources/location/methods/createInventoryLocation" />

<ResourcePath method="POST">/location/{merchantLocationKey}</ResourcePath>

Use this call to create a new inventory location. In order to create and publish an offer (and 
create an eBay listing), a seller must have at least one location, as every offer must be associated 
with at least one location.

Upon first creating an inventory location, only a seller-defined location identifier and a physical 
location is required, and once set, these values can not be changed. The unique identifier value 
(merchantLocationKey) is passed in at the end of the call URI. This merchantLocationKey value will 
be used in other Inventory Location calls to identify the location to perform an action against.

When creating an inventory location, the locationTypes can be specified to define the function of a 
location. At this time, the following locationTypes are supported:

- **Fulfillment** center** locations are used by sellers selling products through the 
Multi-warehouse program to get improved estimated delivery dates on their listings. A full address 
is required when creating a fulfillment center location, as well as the 
fulfillmentCenterSpecifications of the location. For more information on using the fulfillment 
center location type to get improved delivery dates, see Multi-warehouse program.
- **Warehouse** locations are used for traditional shipping. A full street address is not needed, 
but the postalCode and country OR city, stateOrProvince, and country of the location must be 
provided.
- **Store** locations are generally used by merchants selling product through the In-Store Pickup 
program. A full address is required when creating a store location.

Note that all inventory locations are "enabled" by default when they are created, and you must 
specifically disable them (by passing in a value of DISABLED in the merchantLocationStatus field) 
if you want them to be set to the disabled state. The seller's inventory cannot be loaded to 
inventory locations in the disabled state.

Unless one or more errors and/or warnings occur with the call, there is no response payload for this 
call. A successful call will return an HTTP status value of 204 No Content.

```php
use Rat\eBaySDK\API\InventoryAPI\Location\CreateInventoryLocation;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateInventoryLocation(
    merchantLocationKey: (string) $merchantLocationKey,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### DeleteInventoryLocation <DocsBadge path="sell/inventory/resources/location/methods/deleteInventoryLocation" />

<ResourcePath method="DELETE">/location/{merchantLocationKey}</ResourcePath>

his call deletes the inventory location that is specified in the merchantLocationKey path parameter. 
Note that deleting a location will not affect any active eBay listings associated with the deleted 
location, but the seller will not be able modify the offers associated with the location once it is 
deleted.

```php
use Rat\eBaySDK\API\InventoryAPI\Location\DeleteInventoryLocation;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteInventoryLocation(
    merchantLocationKey: (string) $merchantLocationKey,
);
$response = $client->execute($request);
```

### DisableInventoryLocation <DocsBadge path="sell/inventory/resources/location/methods/disableInventoryLocation" />

<ResourcePath method="POST">/location/{merchantLocationKey}/disable</ResourcePath>

This call disables the inventory location that is specified in the merchantLocationKey path 
parameter. Sellers can not load/modify inventory to disabled locations. Note that disabling a 
location will not affect any active eBay listings associated with the disabled location, but the 
seller will not be able modify the offers associated with a disabled location.

A successful call will return an HTTP status value of 200 OK.

```php
use Rat\eBaySDK\API\InventoryAPI\Location\DisableInventoryLocation;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DisableInventoryLocation(
    merchantLocationKey: (string) $merchantLocationKey,
);
$response = $client->execute($request);
```

### EnableInventoryLocation <DocsBadge path="sell/inventory/resources/location/methods/enableInventoryLocation" />

<ResourcePath method="POST">/location/{merchantLocationKey}/enable</ResourcePath>

This call enables a disabled inventory location that is specified in the merchantLocationKey path 
parameter. Once a disabled location is enabled, sellers can start loading/modifying inventory to 
that location.

```php
use Rat\eBaySDK\API\InventoryAPI\Location\EnableInventoryLocation;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new EnableInventoryLocation(
    merchantLocationKey: (string) $merchantLocationKey,
);
$response = $client->execute($request);
```

### GetInventoryLocation <DocsBadge path="sell/inventory/resources/location/methods/getInventoryLocation" />

<ResourcePath method="GET">/location/{merchantLocationKey}</ResourcePath>

This call retrieves all defined details of the inventory location that is specified by the 
merchantLocationKey path parameter.

```php
use Rat\eBaySDK\API\InventoryAPI\Location\GetInventoryLocation;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetInventoryLocation(
    merchantLocationKey: (string) $merchantLocationKey,
);
$response = $client->execute($request);
```

### GetInventoryLocations <DocsBadge path="sell/inventory/resources/location/methods/getInventoryLocations" />

<ResourcePath method="GET">/location</ResourcePath>

This call retrieves all defined details for every inventory location associated with the seller's 
account. There are no required parameters for this call and no request payload. However, there are 
two optional query parameters, limit and offset. The limit query parameter sets the maximum number 
of locations returned on one page of data, and the offset query parameter specifies the page of data 
to return. These query parameters are discussed more in the URI parameters table below.

```php
use Rat\eBaySDK\API\InventoryAPI\Location\GetInventoryLocations;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetInventoryLocations(
    limit: (int) $limit = 25,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### UpdateInventoryLocation <DocsBadge path="sell/inventory/resources/location/methods/updateInventoryLocation" />

<ResourcePath method="PUT">/location/{merchantLocationKey}/update_location_details</ResourcePath>

Use this call to update location details for an existing inventory location. Specify the inventory 
location you want to update using the merchantLocationKey path parameter.

You can update the following text-based fields: name, phone, timeZoneId, geoCoordinates, 
fulfillmentCenterSpecifications, locationTypes, locationWebUrl, locationInstructions and 
locationAdditionalInformation any number of times for any location type.

For warehouse and store inventory locations, address fields can be updated any number of times. 
Address fields cannot be updated for fulfillment center locations. However, if any address fields 
were omitted during the createInventoryLocation call, they can be added through this method.

> [!NOTE]
> When updating a warehouse location to a fulfillment center, sellers can update any of the address 
> fields a single time during the same call used to make this update. After this, they can no longer 
> be updated.

For store locations, the operating hours and/or the special hours can also be updated.

Whatever text is passed in for these fields in an updateInventoryLocation call will replace the 
current text strings defined for these fields.

Unless one or more errors and/or warnings occurs with the call, there is no response payload for 
this call. A successful call will return an HTTP status value of 204 No Content.

```php
use Rat\eBaySDK\API\InventoryAPI\Location\UpdateInventoryLocation;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateInventoryLocation(
    merchantLocationKey: (string) $merchantLocationKey,
    payload: (array) $payload
);
$response = $client->execute($request);
```

## Offer

### BulkCreateOffer <DocsBadge path="sell/inventory/resources/offer/methods/bulkCreateOffer" />

<ResourcePath method="POST">/bulk_create_offer</ResourcePath>

This call creates multiple offers (up to 25) for specific inventory items on a specific eBay 
marketplace. Although it is not a requirement for the seller to create complete offers (with all 
necessary details) right from the start, eBay recommends that the seller provide all necessary 
details with this call since there is currently no bulk operation available to update multiple 
offers with one call. The following fields are always required in the request payload: sku, 
marketplaceId, and (listing) format.

Other information that will be required before a offer can be published are highlighted below:
- Inventory location
- Offer price
- Available quantity
- eBay listing category
- Referenced listing policy profiles to set payment, return, and fulfillment values/settings

> [!NOTE]
> Though the includeCatalogProductDetails parameter is not required to be submitted in the request, 
> the parameter defaults to true if omitted.

If the call is successful, unique offerId values are returned in the response for each successfully 
created offer. The offerId value will be required for many other offer-related calls. Note that this 
call only stages an offer for publishing. The seller must run either the publishOffer, 
bulkPublishOffer, or publishOfferByInventoryItemGroup call to convert offer(s) into an active 
single- or multiple-variation listing.

For those who prefer to create a single offer per call, the createOffer method can be used instead.

```php
use Rat\eBaySDK\API\InventoryAPI\Offer\BulkCreateOffer;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkCreateOffer(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### BulkPublishOffer <DocsBadge path="sell/inventory/resources/offer/methods/bulkPublishOffer" />

<ResourcePath method="POST">/bulk_publish_offer</ResourcePath>

This call is used to convert unpublished offers (up to 25) into published offers, or live eBay 
listings. The unique identifier (offerId) of each offer to publish is passed into the request 
payload. It is possible that some unpublished offers will be successfully created into eBay listings, 
but others may fail. The response payload will show the results for each offerId value that is 
passed into the request payload. The errors and warnings containers will be returned for an offer 
that had one or more issues being published.

For those who prefer to publish one offer per call, the publishOffer method can be used instead. In 
the case of a multiple-variation listing, the publishOfferByInventoryItemGroup call should be used 
instead, as this call will convert all unpublished offers associated with an inventory item group 
into a multiple-variation listing.

```php
use Rat\eBaySDK\API\InventoryAPI\Offer\BulkPublishOffer;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkPublishOffer(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### CreateOffer <DocsBadge path="sell/inventory/resources/offer/methods/createOffer" />

<ResourcePath method="POST">/offer</ResourcePath>

This call creates an offer for a specific inventory item on a specific eBay marketplace. It is up 
to the sellers whether they want to create a complete offer (with all necessary details) right from 
the start, or sellers can provide only some information with the initial createOffer call, and then 
make one or more subsequent updateOffer calls to complete the offer and prepare to publish the offer. 
Upon first creating an offer, the following fields are required in the request payload: sku, 
marketplaceId, and (listing) format.

Other information that will be required before an offer can be published are highlighted below. 
These settings are either set with createOffer, or they can be set with a subsequent updateOffer 
call:

- Inventory location
- Offer price
- Available quantity
- eBay listing category
- Referenced listing policy profiles to set payment, return, and fulfillment values/settings

> [!NOTE]
> Though the includeCatalogProductDetails parameter is not required to be submitted in the request, 
> the parameter defaults to true if omitted.

If the call is successful, a unique offerId value is returned in the response. This value will be 
required for many other offer-related calls. Note that this call only stages an offer for publishing. 
The seller must run the publishOffer call to convert the offer to an active eBay listing.

For those who prefer to create multiple offers (up to 25 at a time) with one call, the 
bulkCreateOffer method can be used.

```php
use Rat\eBaySDK\API\InventoryAPI\Offer\CreateOffer;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateOffer(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### DeleteOffer <DocsBadge path="sell/inventory/resources/offer/methods/deleteOffer" />

<ResourcePath method="DELETE">/offer/{offerId}</ResourcePath>

If used against an unpublished offer, this call will permanently delete that offer. In the case of a 
published offer (or live eBay listing), a successful call will either end the single-variation 
listing associated with the offer, or it will remove that product variation from the eBay listing 
and also automatically remove that product variation from the inventory item group. In the case of 
a multiple-variation listing, the deleteOffer will not remove the product variation from the listing 
if that variation has one or more sales. If that product variation has one or more sales, the seller 
can alternately just set the available quantity of that product variation to 0, so it is not 
available in the eBay search or View Item page, and then the seller can remove that product 
variation from the inventory item group at a later time.

```php
use Rat\eBaySDK\API\InventoryAPI\Offer\DeleteOffer;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteOffer(
    offerId: (string) $offerId
);
$response = $client->execute($request);
```

### GetListingFees <DocsBadge path="sell/inventory/resources/offer/methods/getListingFees" />

<ResourcePath method="POST">/offer/get_listing_fees</ResourcePath>

This call is used to retrieve the expected listing fees for up to 250 unpublished offers. An array 
of one or more offerId values are passed in under the offers container.

In the response payload, all listing fees are grouped by eBay marketplace, and listing fees per 
offer are not shown. A fees container will be returned for each eBay marketplace where the seller is 
selling the products associated with the specified offers.

Errors will occur if the seller passes in offerIds that represent published offers, so this call 
should be made before the seller publishes offers with the publishOffer.

```php
use Rat\eBaySDK\API\InventoryAPI\Offer\GetListingFees;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetListingFees(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetOffer <DocsBadge path="sell/inventory/resources/offer/methods/getOffer" />

<ResourcePath method="GET">/offer/{offerId}</ResourcePath>

This call retrieves a specific published or unpublished offer. The unique identifier of the offer 
(offerId) is passed in at the end of the call URI.

```php
use Rat\eBaySDK\API\InventoryAPI\Offer\GetOffer;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetOffer(
    offerId: (string) $offerId
);
$response = $client->execute($request);
```

### GetOffers <DocsBadge path="sell/inventory/resources/offer/methods/getOffers" />

<ResourcePath method="GET">/offer</ResourcePath>

This call retrieves all existing offers for the specified SKU value. The seller has the option of 
limiting the offers that are retrieved to a specific eBay marketplace, or to a listing format.

> [!NOTE]
> At this time, the same SKU value can not be offered across multiple eBay marketplaces, so the 
> marketplace_id query parameter currently does not have any practical use for this call.

> [!NOTE]
> The same SKU can be offered through an auction and a fixed-price listing concurrently. If this is 
> the case, getOffers will return two offers. Otherwise, only one offer will be returned.

```php
use Rat\eBaySDK\API\InventoryAPI\Offer\GetOffers;
use Rat\eBaySDK\Enums\FormatType;
use Rat\eBaySDK\Enums\Marketplace;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetOffers(
    marketplaceId: Marketplace::EBAY_US,
    format: FormatType::FIXED_PRICE,
    limit: (int) $limit = 25,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### PublishOffer <DocsBadge path="sell/inventory/resources/offer/methods/publishOffer" />

<ResourcePath method="POST">/offer/{offerId}/publish</ResourcePath>

This call is used to convert an unpublished offer into a published offer, or live eBay listing. The 
unique identifier of the offer (offerId) is passed in at the end of the call URI.

For those who prefer to publish multiple offers (up to 25 at a time) with one call, the 
bulkPublishOffer method can be used. In the case of a multiple-variation listing, the 
publishOfferByInventoryItemGroup call should be used instead, as this call will convert all 
unpublished offers associated with an inventory item group into a multiple-variation listing.

```php
use Rat\eBaySDK\API\InventoryAPI\Offer\PublishOffer;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new PublishOffer(
    offerId: (string) $offerId
);
$response = $client->execute($request);
```

### PublishOfferByInventoryItemGroup <DocsBadge path="sell/inventory/resources/offer/methods/publishOfferByInventoryItemGroup" />

<ResourcePath method="POST">/offer/publish_by_inventory_item_group</ResourcePath>

This call is used to convert all unpublished offers associated with an inventory item group into an 
active, multiple-variation listing.

The unique identifier of the inventory item group (inventoryItemGroupKey) is passed in the request 
payload. All inventory items and their corresponding offers in the inventory item group must be 
valid (meet all requirements) for the publishOfferByInventoryItemGroup call to be completely 
successful. For any inventory items in the group that are missing required data or have no 
corresponding offers, the publishOfferByInventoryItemGroup will create a new multiple-variation 
listing, but any inventory items with missing required data/offers will not be in the newly-created 
listing. If any inventory items in the group to be published have invalid data, or one or more of 
the inventory items have conflicting data with one another, the publishOfferByInventoryItemGroup 
call will fail. Be sure to check for any error or warning messages in the call response for any 
applicable information about one or more inventory items/offers having issues.

```php
use Rat\eBaySDK\API\InventoryAPI\Offer\PublishOfferByInventoryItemGroup;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new PublishOfferByInventoryItemGroup(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### UpdateOffer <DocsBadge path="sell/inventory/resources/offer/methods/updateOffer" />

<ResourcePath method="PUT">/offer/{offerId}/publish</ResourcePath>

This call updates an existing offer. An existing offer may be in published state (active eBay 
listing), or in an unpublished state and yet to be published with the publishOffer call. The unique
identifier (offerId) for the offer to update is passed in at the end of the call URI.

The updateOffer call does a complete replacement of the existing offer object, so all fields that 
make up the current offer object are required, regardless of whether their values changed.

Other information that is required before an unpublished offer can be published or before a 
published offer can be revised include:

- Inventory location
- Offer price
- Available quantity
- eBay listing category
- Referenced listing policy profiles to set payment, return, and fulfillment values/settings

> [!NOTE]
> Though the includeCatalogProductDetails parameter is not required to be submitted in the request, 
> the parameter defaults to true if omitted from both the updateOffer and the createOffer calls. If 
> a value is specified in the updateOffer call, this value will be used.

For published offers, the listingDescription field is also required to update the offer/eBay 
listing. For unpublished offers, this field is not necessarily required unless it is already set for 
the unpublished offer.

```php
use Rat\eBaySDK\API\InventoryAPI\Offer\UpdateOffer;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateOffer(
    offerId: (string) $offerId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### WithdrawOffer <DocsBadge path="sell/inventory/resources/offer/methods/withdrawOffer" />

<ResourcePath method="POST">/offer/{offerId}/withdraw</ResourcePath>

This call is used to end a single-variation listing that is associated with the specified offer. 
This call is used in place of the deleteOffer call if the seller only wants to end the listing 
associated with the offer but does not want to delete the offer object. With this call, the offer 
object remains, but it goes into the unpublished state, and will require a publishOffer call to 
relist the offer.

To end a multiple-variation listing that is associated with an inventory item group, the 
withdrawOfferByInventoryItemGroup method can be used. This call only ends the multiple-variation 
listing associated with an inventory item group but does not delete the inventory item group object, 
nor does it delete any of the offers associated with the inventory item group, but instead all of 
these offers go into the unpublished state.

```php
use Rat\eBaySDK\API\InventoryAPI\Offer\WithdrawOffer;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new WithdrawOffer(
    offerId: (string) $offerId,
);
$response = $client->execute($request);
```

### WithdrawOfferByInventoryItemGroup <DocsBadge path="sell/inventory/resources/offer/methods/withdrawOfferByInventoryItemGroup" />

<ResourcePath method="POST">/offer/withdraw_by_inventory_item_group</ResourcePath>

This call is used to end a multiple-variation eBay listing that is associated with the specified 
inventory item group. This call only ends multiple-variation eBay listing associated with the 
inventory item group but does not delete the inventory item group object. Similarly, this call also 
does not delete any of the offers associated with the inventory item group, but instead all of these 
offers go into the unpublished state. If the seller wanted to relist the multiple-variation eBay 
listing, they could use the publishOfferByInventoryItemGroup method.

```php
use Rat\eBaySDK\API\InventoryAPI\Offer\WithdrawOfferByInventoryItemGroup;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new WithdrawOfferByInventoryItemGroup(
    payload: (string) $payload,
);
$response = $client->execute($request);
```