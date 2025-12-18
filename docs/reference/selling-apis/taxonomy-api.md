---
outline: deep
---
# Taxonomy API <DocsBadge path="sell/taxonomy/overview.html" />

The Taxonomy API enables you to assist both sellers and buyers:

- It helps sellers to determine the best eBay category under which to offer each inventory item for 
sale in a selected eBay marketplace. It helps sellers to select the categories of items to include 
in a campaign or promotion. It also provides information about the aspects to include when defining 
an inventory item in a given category. For more information, see the Selling Integration Guide.
- It helps buyers to determine the appropriate categories in which to browse or search for the items 
they're looking to purchase in a particular eBay marketplace. For more information, see the Buying 
Integration Guide.

For more information about using RESTful APIs, see Using eBay Restful APIs.

## CategoryTree

### FetchItemAspects <DocsBadge path="sell/taxonomy/resources/category_tree/methods/fetchItemAspects" />

<ResourcePath method="GET">/category_tree/{categoryTreeId}/fetch_item_aspects</ResourcePath>

This method returns a complete list of aspects for all of the leaf categories that belong to an eBay 
marketplace. The eBay marketplace is specified through the category_tree_id URI parameter.

> [!NOTE]
> A successful call returns a payload as a gzipped JSON file sent as a binary file using the 
> content-type:application/octet-stream in the response. This file may be large (over 100 MB, 
> compressed). Extract the JSON file from the compressed file with a utility that handles .gz or 
> .gzip. The open source Taxonomy SDK can be used to compare the aspect metadata that is returned in 
> this response. The Taxonomy SDK uses this call to surface changes (new, modified, and removed 
> entities) between an updated version of a bulk downloaded file relative to a previous version.

```php
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\FetchItemAspects;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new FetchItemAspects(
    categoryTreeId: (int) $categoryTreeId,
);
$response = $client->execute($request);
```

### GetCategorySubtree <DocsBadge path="sell/taxonomy/resources/category_tree/methods/getCategorySubtree" />

<ResourcePath method="GET">/category_tree/{categoryTreeId}/get_category_subtree</ResourcePath>

This call retrieves the details of all nodes of the category tree hierarchy (the subtree) below a 
specified category of a category tree. You identify the tree using the category_tree_id parameter, 
which was returned by the getDefaultCategoryTreeId call in the categoryTreeId field.

```php
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCategorySubtree;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCategorySubtree(
    categoryTreeId: (int) $categoryTreeId,
    categoryId: (int) $categoryId,
);
$response = $client->execute($request);
```

### GetCategorySuggestions <DocsBadge path="sell/taxonomy/resources/category_tree/methods/getCategorySuggestions" />

<ResourcePath method="GET">/category_tree/{categoryTreeId}/get_category_suggestions</ResourcePath>

This call returns an array of category tree leaf nodes in the specified category tree that are 
considered by eBay to most closely correspond to the query string q. Returned with each suggested 
node is a localized name for that category (based on the Accept-Language header specified for the 
call), and details about each of the category's ancestor nodes, extending from its immediate parent 
up to the root of the category tree.

You identify the tree using the category_tree_id parameter, which was returned by the 
getDefaultCategoryTreeId call in the categoryTreeId field.

> [!NOTE]
> This call is not supported in the Sandbox environment. It will return a response payload in which 
> the categoryName fields contain random or boilerplate text regardless of the query submitted.

```php
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCategorySuggestions;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCategorySuggestions(
    categoryTreeId: (int) $categoryTreeId,
    q: (string) $q,
);
$response = $client->execute($request);
```

### GetCategoryTree <DocsBadge path="sell/taxonomy/resources/category_tree/methods/getCategoryTree" />

<ResourcePath method="GET">/category_tree/{categoryTreeId}</ResourcePath>

This method retrieves the complete category tree that is identified by the category_tree_id 
parameter. The value of category_tree_id was returned by the getDefaultCategoryTreeId method in the 
categoryTreeId field. The response contains details of all nodes of the specified eBay category 
tree, as well as the eBay marketplaces that use this category tree.

```php
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCategoryTree;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCategoryTree(
    categoryTreeId: (int) $categoryTreeId,
);
$response = $client->execute($request);
```

### GetCompatibilityProperties <DocsBadge path="sell/taxonomy/resources/category_tree/methods/getCompatibilityProperties" />

<ResourcePath method="GET">/category_tree/{categoryTreeId}/get_compatibility_properties</ResourcePath>

This call retrieves the compatible vehicle aspects that are used to define a motor vehicle that is 
compatible with a motor vehicle part or accessory. The values that are retrieved here might include 
motor vehicle aspects such as 'Make', 'Model', 'Year', 'Engine', and 'Trim', and each of these 
aspects are localized for the eBay marketplace.

The category_tree_id value is passed in as a path parameter, and this value identifies the eBay 
category tree. The category_id value is passed in as a query parameter, as this parameter is also 
required. The specified category must be a category that supports parts compatibility.

At this time, this operation only supports parts and accessories listings for cars, trucks, and 
motorcycles (not boats, power sports, or any other vehicle types). Only the following eBay 
marketplaces support parts compatibility:

- eBay US (Motors and non-Motors categories)
- eBay Canada (Motors and non-Motors categories)
- eBay UK
- eBay Germany
- eBay Australia
- eBay France
- eBay Italy
- eBay Spain

```php
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCompatibilityProperties;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCompatibilityProperties(
    categoryTreeId: (int) $categoryTreeId,
    categoryId: (int) $categoryId,
);
$response = $client->execute($request);
```

### GetCompatibilityPropertyValues <DocsBadge path="sell/taxonomy/resources/category_tree/methods/getCompatibilityPropertyValues" />

<ResourcePath method="GET">/category_tree/{categoryTreeId}/get_compatibility_property_values</ResourcePath>

This call retrieves applicable compatible vehicle property values based on the specified eBay 
marketplace, specified eBay category, and filters used in the request. Compatible vehicle properties 
are returned in the compatibilityProperties.name field of a getCompatibilityProperties response.

One compatible vehicle property applicable to the specified eBay marketplace and eBay category is 
specified through the required compatibility_property filter. Then, the user has the option of 
further restricting the compatible vehicle property values that are returned in the response by 
specifying one or more compatible vehicle property name/value pairs through the filter query 
parameter.

See the documentation in URI parameters section for more information on using the 
compatibility_property and filter query parameters together to customize the data that is retrieved.

```php
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCompatibilityPropertyValues;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCompatibilityPropertyValues(
    categoryTreeId: (int) $categoryTreeId,
    categoryId: (int) $categoryId,
    compatibilityProperty: (string) $compatibilityProperty,
    filter: (string) $filter = null,
);
$response = $client->execute($request);
```

### GetDefaultCategoryTreeId <DocsBadge path="sell/taxonomy/resources/category_tree/methods/getDefaultCategoryTreeId" />

<ResourcePath method="GET">/get_default_category_tree_id</ResourcePath>

A given eBay marketplace might use multiple category trees, but one of those trees is considered to 
be the default for that marketplace. This call retrieves a reference to the default category tree
associated with the specified eBay marketplace ID. The response includes only the tree's unique 
identifier and version, which you can use to retrieve more details about the tree, its structure, 
and its individual category nodes.

```php
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetDefaultCategoryTreeId;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetDefaultCategoryTreeId(
    marketplaceId: (string) $marketplaceId,
);
$response = $client->execute($request);
```

### GetExpiredCategories <DocsBadge path="sell/taxonomy/resources/category_tree/methods/getExpiredCategories" />

<ResourcePath method="GET">/category_tree/{categoryTreeId}/get_expired_categories</ResourcePath>

This method retrieves the mappings of expired leaf categories in the specified category tree to 
their corresponding active leaf categories. Note that in some cases, several expired categories are 
mapped to a single active category.

> [!NOTE]
> This method only returns information about categories that have been mapped (i.e., combined 
> categories and split categories). It does not return information about expired categories that 
> have no corresponding active categories. When a category expires in this manner, any completed 
> items that were listed in the expired category can still be found, but new listings cannot be 
> created in the category.

```php
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetExpiredCategories;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetExpiredCategories(
    categoryTreeId: (int) $categoryTreeId,
);
$response = $client->execute($request);
```

### GetItemAspectsForCategory <DocsBadge path="sell/taxonomy/resources/category_tree/methods/getItemAspectsForCategory" />

<ResourcePath method="GET">/category_tree/{categoryTreeId}/get_item_aspects_for_category</ResourcePath>

This call returns a list of aspects that are appropriate or necessary for accurately describing 
items in the specified leaf category. Each aspect identifies an item attribute (for example, color) 
for which the seller will be required or encouraged to provide a value (or variation values) when 
offering an item in that category on eBay.

For each aspect, getItemAspectsForCategory provides complete metadata, including:

- The aspect's data type, format, and entry mode
- Whether the aspect is required in listings
- Whether the aspect can be used for item variations
- Whether the aspect accepts multiple values for an item
- Allowed values for the aspect

Use this information to construct an interface through which sellers can enter or select the 
appropriate values for their items or item variations. Once you collect those values, include them 
as product aspects when creating inventory items using the Inventory API.

```php
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetItemAspectsForCategory;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItemAspectsForCategory(
    categoryTreeId: (int) $categoryTreeId,
    categoryId: (int) $categoryId,
);
$response = $client->execute($request);
```