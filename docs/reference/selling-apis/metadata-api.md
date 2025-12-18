---
outline: deep
---
# Metadata API <DocsBadge path="sell/metadata/static/overview.html" />

The Metadata API lets you retrieve metadata on eBay category policies, information on sales tax 
jurisdictions, and available hazardous material related label information.

Category policies are the eBay policies and guidelines for how you must list certain items in 
specific categories across the different eBay marketplaces. For example, if you are listing items 
with variations, you'll want to know which categories support multiple-variation listings. Another 
example is that you may want to know which item conditions are supported for different eBay 
categories. See Retrieve the eBay listing policies for an eBay marketplace and category ID for more 
information.

Several countries have sales tax jurisdictions where the tax rates across the different 
jurisdictions may vary. You can use the Metadata API to retrieve the lists of tax jurisdictions 
which you can then use to set up sales tax tables. See Retrieve sales tax jurisdictions for more 
information.

Sellers have the ability to add hazardous material related label information to their listings. See 
Retrieve hazardous material labels information for selling flows for more information.

## Compatibilities

### GetCompatibilitiesBySpecification <DocsBadge path="sell/metadata/resources/compatibilities/methods/getCompatibilitiesBySpecification" />

<ResourcePath method="POST">/compatibilities/get_compatibilities_by_specification</ResourcePath>

This method is used to retrieve all compatible application name-value pairs for a part based on the 
provided specification(s).

The part's relevant dimensions and/or characteristics can be provided through the specifications 
container. For example, when retrieving compatible application name-value pairs for a tire, the 
tire's dimensions (such as the section width or rim diameter) should be provided.

By default, all compatible application name-value pairs for the specifications are returned. You can 
limit the size of the result set by using the compatibilityPropertyFilters array to specify the 
properties (such as make, model, year, or trim) you wish to be included in the response.

```php
use Rat\eBaySDK\API\MetadataAPI\Compatibilities\GetCompatibilitiesBySpecification;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCompatibilitiesBySpecification(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetCompatibilityPropertyNames <DocsBadge path="sell/metadata/resources/compatibilities/methods/getCompatibilityPropertyNames" />

<ResourcePath method="POST">/compatibilities/get_compatibility_property_names</ResourcePath>

This method is used to retrieve product compatibility property names for the specified 
compatibility-enabled category.

Compatibility property names can be used alongside the corresponding compatibility property value 
(retrieved using the getCompatibilityPropertyValues method) to describe the assembly for which an 
item is compatible.

The categoryId of the compatibility-enabled category for which to retrieve compatibility property 
names is required in the request body.

By default, all property names within the compatibility category of the specified 
compatibility-enable category are returned. You can limit the size of the result set by using the 
dataset array to specify the types of properties you want returned.

```php
use Rat\eBaySDK\API\MetadataAPI\Compatibilities\GetCompatibilityPropertyNames;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCompatibilityPropertyNames(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetCompatibilityPropertyValues <DocsBadge path="sell/metadata/resources/compatibilities/methods/getCompatibilityPropertyValues" />

<ResourcePath method="POST">/compatibilities/get_compatibility_property_values</ResourcePath>

This method is used to retrieve product compatibility property values associated with a single 
property name, in the specified category.

Compatibility property values can be used alongside the corresponding compatibility property name 
(retrieved using the getCompatibilityPropertyNames method) to describe the assembly for which an 
item is compatible.

The categoryId of the compatibility-enabled category for which to retrieve compatibility property 
values is required in the request body, as well as the propertyName for which you wish to retrieve 
associated values.

By default, all property values associated with the specified propertyName are returned. You can 
limit the size of the result set by using the propertyFilter array. Only property values associated 
with the specified name-value pairs will be returned.

```php
use Rat\eBaySDK\API\MetadataAPI\Compatibilities\GetCompatibilityPropertyValues;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCompatibilityPropertyValues(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetMultiCompatibilityPropertyValues <DocsBadge path="sell/metadata/resources/compatibilities/methods/getMultiCompatibilityPropertyValues" />

<ResourcePath method="POST">/compatibilities/get_multi_compatibility_property_values</ResourcePath>

This method is used to retrieve product compatibility property values associated with multiple 
property names, in the specified category.

Compatibility property values can be used alongside the corresponding compatibility property name 
(retrieved using the getCompatibilityPropertyNames method) to describe the assembly for which an 
item is compatible.

The categoryId of the compatibility-enabled category for which to retrieve compatibility property 
values is required in the request body, as well as the propertyNames for which you wish to retrieve 
associated property values. The propertyFilter array is also required to constrain the output. Only 
property values associated with the specified name-value pairs will be returned.

```php
use Rat\eBaySDK\API\MetadataAPI\Compatibilities\GetMultiCompatibilityPropertyValues;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetMultiCompatibilityPropertyValues(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetProductCompatibilities <DocsBadge path="sell/metadata/resources/compatibilities/methods/getProductCompatibilities" />

<ResourcePath method="POST">/compatibilities/get_product_compatibilities</ResourcePath>

This method is used to retrieve all available item compatibility details for the specified product.

Item compatibility details can be used to see the properties for which an item is compatible. For 
example, if you are searching for a part for a specific vehicle, you can use this method to see the 
years, engine, and/or trim for which the part is compatible. Item compatibility details are returned 
as name-value pairs.

The product for which to retrieve item compatibility details must be provided through the 
productIdentifier field. This value can be either an eBay specific identifier (such as an ePID) or 
an external identifier (such as a UPC).

By default, all available item compatibility details for the specified product are returned. You can 
limit the size of the result set using the dataset or datasetPropertyName fields to specify the 
types of properties you want returned in the response. The applicationPropertyFilter array can also 
be used so that only parts compatible with the specified name-value pairs are returned.

```php
use Rat\eBaySDK\API\MetadataAPI\Compatibilities\GetProductCompatibilities;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetProductCompatibilities(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

## Country

### GetProductCompatibilities <DocsBadge path="sell/metadata/resources/country/methods/getSalesTaxJurisdictions" />

<ResourcePath method="GET">/country/{countryCode}/sales_tax_jurisdiction</ResourcePath>

This method retrieves all sales-tax jurisdictions for the country specified in the countryCode path 
parameter. Countries with valid sales-tax jurisdictions are Canada and the US.

The response from this call tells you the jurisdictions for which a seller can configure tax tables. 
Although setting up tax tables is optional, you can use the createOrReplaceSalesTax method in the 
Account API call to configure the tax tables for the jurisdictions into which you sell.

> [!NOTE]
> Sales-tax tables are only available for the US (EBAY_US) and Canada (EBAY_CA) marketplaces.

> [!CAUTION]
> In the US, eBay now calculates, collects, and remits sales tax to the proper taxing authorities 
> in all 50 states and Washington, DC. Sellers can no longer specify sales-tax rates for these 
> jurisdictions using a tax table.
> 
> However, sellers may continue to use a sales-tax table to set rates for the following US 
> territories:
> 
> - American Samoa (AS)
> - Guam (GU)
> - Northern Mariana Islands (MP)
> - Palau (PW)
> - US Virgin Islands (VI)
>
> For additional information, refer to [Taxes and import charges](https://www.ebay.com/help/selling/fees-credits-invoices/taxes-import-charges?id=4121).

```php
use Rat\eBaySDK\API\MetadataAPI\Country\GetSalesTaxJurisdictions;
use Rat\eBaySDK\Enums\CountryCode;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSalesTaxJurisdictions(
    countryCode: CountryCode::AT,
);
$response = $client->execute($request);
```

## Marketplace

### GetAutomotivePartsCompatibilityPolicies <DocsBadge path="sell/metadata/resources/marketplace/methods/getAutomotivePartsCompatibilityPolicies" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_automotive_parts_compatibility_policies</ResourcePath>

This method returns the eBay policies that define how to list automotive parts compatibility items 
in the categories of the specified marketplace.

By default, this method returns all categories that support parts compatibility. You can limit the 
size of the result set by using the filter query parameter to specify only the category IDs you want 
to review.

> [!NOTE]
> To return policy information for the eBay US marketplace, specify EBAY_MOTORS_US as the path 
> parameter for marketplace_id.

> [!TIP]
> This method can potentially return a very large response payload. eBay recommends that the 
> response payload be compressed by passing in the Accept-Encoding request header and setting the 
> value to gzip.

If you specify a valid marketplace ID but that marketplace does not contain policy information, or 
if you filter out all results, a 204 No content status code is returned with an empty response body.

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetAutomotivePartsCompatibilityPolicies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetAutomotivePartsCompatibilityPolicies(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

### GetCategoryPolicies <DocsBadge path="sell/metadata/resources/marketplace/methods/getCategoryPolicies" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_category_policies</ResourcePath>

This method returns eBay category policy metadata for all leaf categories on the specified 
marketplace.

By default, this method returns metadata on all leaf categories. You can limit the size of the 
result set by using the filter query parameter to specify only the leaf category IDs you want to 
review.

If you specify a valid marketplace ID but that marketplace does not contain policy information, or 
if you filter out all results, a successful call returns a 204 No content status code with an empty 
response body.

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetCategoryPolicies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCategoryPolicies(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

### GetClassifiedAdPolicies <DocsBadge path="sell/metadata/resources/marketplace/methods/getClassifiedAdPolicies" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_classified_ad_policies</ResourcePath>

This method returns eBay classified ad policy metadata for all leaf categories on the specified 
marketplace.

By default, this method returns metadata on all leaf categories. You can limit the size of the 
result set by using the filter query parameter to specify only the leaf category IDs you want to 
review.

If you specify a valid marketplace ID but that marketplace does not contain policy information, or 
if you filter out all results, a successful call returns a 204 No content status code with an empty 
response body.

> [!NOTE]
> This method does not support classified ads for eBay US Motors categories (EBAY_MOTORS_US). For 
> eBay Motors Pro users, use [getMotorsListingPolicies](https://developer.ebay.com/api-docs/sell/metadata/resources/marketplace/methods/getMotorsListingPolicies).

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetClassifiedAdPolicies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetClassifiedAdPolicies(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

### GetCurrencies <DocsBadge path="sell/metadata/resources/marketplace/methods/getCurrencies" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_currencies</ResourcePath>

This method returns the default currency used by the eBay marketplace specified in the request. 
This is the currency that the seller should use when providing price data for this marketplace 
through listing APIs.

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetCurrencies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCurrencies(
    marketplaceId: (string) $marketplaceId,
);
$response = $client->execute($request);
```

### GetExtendedProducerResponsibilityPolicies <DocsBadge path="sell/metadata/resources/marketplace/methods/getExtendedProducerResponsibilityPolicies" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_extended_producer_responsibility_policies</ResourcePath>

This method returns the Extended Producer Responsibility policies for one, multiple, or all eBay 
categories in an eBay marketplace.

The identifier of the eBay marketplace is passed in as a path parameter, and unless one or more eBay 
category IDs are passed in through the filter query parameter, this method will return metadata on 
every applicable category for the specified marketplace.

> [!NOTE] 
> Currently, the Extended Producer Responsibility policies are only applicable to a limited number 
> of categories.

> [!NOTE] 
> Extended Producer Responsibility IDs are no longer set at the listing level so category-level 
> metadata is no longer returned. Instead, sellers will provide/manage these IDs at the account 
> level by going to Account Settings.

> [!TIP] 
> This method can potentially return a very large response payload. eBay recommends that the
> response payload be compressed by passing in the Accept-Encoding request header and setting the 
> value to gzip.

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetExtendedProducerResponsibilityPolicies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetExtendedProducerResponsibilityPolicies(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

### GetHazardousMaterialsLabels <DocsBadge path="sell/metadata/resources/marketplace/methods/getHazardousMaterialsLabels" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_hazardous_materials_labels</ResourcePath>

This method returns hazardous materials label information for the specified eBay marketplace. The 
information includes IDs, descriptions, and URLs (as applicable) for the available signal words, 
statements, and pictograms. The returned statements are localized for the default language of the 
marketplace. If a marketplace does not support hazardous materials label information, no response 
payload is returned, but only a 204 No content status code.

This information is used by the seller to add hazardous materials label related information to their 
listings (see [Specifying hazardous material related information](https://developer.ebay.com/api-docs/sell/static/metadata/feature-regulatorhazmatcontainer.html)).

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetHazardousMaterialsLabels;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetHazardousMaterialsLabels(
    marketplaceId: (string) $marketplaceId,
);
$response = $client->execute($request);
```

### GetItemConditionPolicies <DocsBadge path="sell/metadata/resources/marketplace/methods/getItemConditionPolicies" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_item_condition_policies</ResourcePath>

This method returns item condition metadata on one, multiple, or all eBay categories on an eBay 
marketplace. This metadata consists of the different item conditions (with IDs) that an eBay 
category supports, and a boolean to indicate if an eBay category requires an item condition.

If applicable, this metadata also shows the different condition descriptors (with IDs) that an eBay 
category supports.

> [!NOTE] 
> Currently, condition grading is only applicable to the following trading card categories:
> - Non-Sport Trading Card Singles
> - CCG Individual Cards
> - Sports Trading Cards Singles

The identifier of the eBay marketplace is passed in as a path parameter, and unless one or more 
eBay category IDs are passed in through the filter query parameter, this method will return metadata 
on every single category for the specified marketplace. If you only want to view item condition 
metadata for one eBay category or a select group of eBay categories, you can pass in up to 50 eBay 
category ID through the filter query parameter.

> [!NOTE]
> Certified - Refurbished-eligible sellers, and sellers who are eligible to list with the new values 
> (EXCELLENT_REFURBISHED, VERY_GOOD_REFURBISHED, and GOOD_REFURBISHED) must use an OAuth token 
> created with the authorization code grant flow and 
> https://api.ebay.com/oauth/api_scope/sell.inventory scope in order to retrieve the refurbished 
> conditions for the relevant categories.
>
> Refurbished item conditions are only supported in the Australia, Canada, French Canada, Germany, 
> France, Italy, UK, and US marketplaces. See the eBay Refurbished Program page in help center for 
> the categories that support refurbished conditions.
> 
> These restricted item conditions will not be returned if an OAuth token created with the client 
> credentials grant flow and https://api.ebay.com/oauth/api_scope scope is used, or if any seller is 
> not eligible to list with that item condition.
>
> See the Specifying OAuth scopes topic for more information about specifying scopes.

> [!TIP] 
> This method can potentially return a very large response payload. eBay recommends that the 
> response payload be compressed by passing in the Accept-Encoding request header and setting the 
> value to gzip.

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetItemConditionPolicies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItemConditionPolicies(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

### GetListingStructurePolicies <DocsBadge path="sell/metadata/resources/marketplace/methods/getListingStructurePolicies" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_listing_structure_policies</ResourcePath>

This method returns the eBay policies that define the allowed listing structures for the categories 
of a specific marketplace. The listing-structure policies currently pertain to whether or not you 
can list items with variations.

By default, this method returns the entire category tree for the specified marketplace. You can 
limit the size of the result set by using the filter query parameter to specify only the category 
IDs you want to review.

> [!TIP]
> This method can potentially return a very large response payload. eBay recommends that the 
> response payload be compressed by passing in the Accept-Encoding request header and setting the 
> value to gzip.

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetListingStructurePolicies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetListingStructurePolicies(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

### GetListingTypePolicies <DocsBadge path="sell/metadata/resources/marketplace/methods/getListingTypePolicies" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_listing_type_policies</ResourcePath>

This method returns eBay listing type policy metadata for all leaf categories on the specified 
marketplace.

By default, this method returns metadata on all leaf categories. You can limit the size of the 
result set by using the filter query parameter to specify only the leaf category IDs you want to 
review.

If you specify a valid marketplace ID but that marketplace does not contain policy information, or 
if you filter out all results, a successful call returns a 204 No content status code with an empty 
response body.


```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetListingTypePolicies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetListingTypePolicies(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

### GetMotorsListingPolicies <DocsBadge path="sell/metadata/resources/marketplace/methods/getMotorsListingPolicies" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_motors_listing_policies</ResourcePath>

This method returns eBay Motors policy metadata for all leaf categories on the specified marketplace.

By default, this method returns metadata on all leaf categories. You can limit the size of the 
result set by using the filter query parameter to specify only the leaf category IDs you want to 
review.

If you specify a valid marketplace ID but that marketplace does not contain policy information, or 
if you filter out all results, a successful call returns a 204 No content status code with an empty 
response body.

> [!NOTE]
> To return policy information for eBay US Motors categories, specify marketplace_id as 
> EBAY_MOTORS_US.

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetMotorsListingPolicies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetMotorsListingPolicies(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

### GetNegotiatedPricePolicies <DocsBadge path="sell/metadata/resources/marketplace/methods/getNegotiatedPricePolicies" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_negotiated_price_policies</ResourcePath>

This method returns the eBay policies that define the supported negotiated price features (like 
"best offer") for the categories of a specific marketplace.

By default, this method returns the entire category tree for the specified marketplace. You can 
limit the size of the result set by using the filter query parameter to specify only the category 
IDs you want to review.

> [!TIP]
> This method can potentially return a very large response payload. eBay recommends that the 
> response payload be compressed by passing in the Accept-Encoding request header and setting the 
> value to gzip.

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetNegotiatedPricePolicies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetNegotiatedPricePolicies(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

### GetProductSafetyLabels <DocsBadge path="sell/metadata/resources/marketplace/methods/getProductSafetyLabels" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_product_safety_labels</ResourcePath>

This method returns product safety label information for the specified eBay marketplace. The 
information includes IDs, descriptions, and URLs (as applicable) for the available statements and 
pictograms. The returned statements are localized for the default language of the marketplace. If a 
marketplace does not support product safety label information, no response payload is returned, but 
only a 204 No content status code.

This information is used by the seller to add product safety label related information to their 
listings. The getRegulatoryPolicies method can be used to see which categories recommend or require 
product safety labels.

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetProductSafetyLabels;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetProductSafetyLabels(
    marketplaceId: (string) $marketplaceId,
);
$response = $client->execute($request);
```

### GetRegulatoryPolicies <DocsBadge path="sell/metadata/resources/marketplace/methods/getRegulatoryPolicies" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_regulatory_policies</ResourcePath>

This method returns regulatory policies for one, multiple, or all eBay categories in an eBay 
marketplace. The identifier of the eBay marketplace is passed in as a path parameter, and unless 
one or more eBay category IDs are passed in through the filter query parameter, this method will 
return metadata for every listing category in the specified marketplace.

> [!TIP]
> This method can potentially return a very large response payload. eBay recommends that the 
> response payload be compressed by passing in the Accept-Encoding request header and setting the 
> value to gzip.

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetRegulatoryPolicies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetRegulatoryPolicies(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

### GetReturnPolicies <DocsBadge path="sell/metadata/resources/marketplace/methods/getReturnPolicies" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_return_policies</ResourcePath>

This method returns the eBay policies that define whether or not you must include a return policy 
for the items you list in the categories of a specific marketplace, plus the guidelines for creating
domestic and international return policies in the different eBay categories.

By default, this method returns the entire category tree for the specified marketplace. You can 
limit the size of the result set by using the filter query parameter to specify only the category 
IDs you want to review.

> [!TIP]
> This method can potentially return a very large response payload. eBay recommends that the 
> response payload be compressed by passing in the Accept-Encoding request header and setting the 
> value to gzip.

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetReturnPolicies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetReturnPolicies(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

### GetShippingPolicies <DocsBadge path="sell/metadata/resources/marketplace/methods/getShippingPolicies" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_shipping_policies</ResourcePath>

This method returns eBay shipping policy metadata for all leaf categories on the specified 
marketplace.

By default, this method returns metadata on all leaf categories. You can limit the size of the 
result set by using the filter query parameter to specify only the leaf category IDs you want to 
review.

If you specify a valid marketplace ID but that marketplace does not contain policy information, or 
if you filter out all results, a successful call returns a 204 No content status code with an empty 
response body.

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetShippingPolicies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetShippingPolicies(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

### GetSiteVisibilityPolicies <DocsBadge path="sell/metadata/resources/marketplace/methods/getSiteVisibilityPolicies" />

<ResourcePath method="GET">/marketplace/{marketplaceId}/get_site_visibility_policies</ResourcePath>

This method returns eBay international site visibility policy metadata for all leaf categories on 
the specified marketplace.

By default, this method returns metadata on all leaf categories. You can limit the size of the 
result set by using the filter query parameter to specify only the leaf category IDs you want to 
review.

If you specify a valid marketplace ID but that marketplace does not contain policy information, or 
if you filter out all results, a successful call returns a 204 No content status code with an empty 
response body.

```php
use Rat\eBaySDK\API\MetadataAPI\Marketplace\GetSiteVisibilityPolicies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSiteVisibilityPolicies(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

## ShippingMarketplace

### GetExcludeShippingLocations <DocsBadge path="sell/metadata/resources/shipping:marketplace/methods/getExcludeShippingLocations" />

<ResourcePath method="GET">/marketplace/shipping/{marketplaceId}/get_exclude_shipping_locations</ResourcePath>

This method retrieves a list of locations that the seller can use as excluded shipping locations 
within their listings or in their fulfillment business policies for the specified marketplace. These 
are locations that a seller designates as areas where they will not ship items.

Excluded shipping locations and ship-to locations are used in tandem at the listing level and in 
fulfillment business policies. Excluded shipping locations and ship-to locations share a lot of the 
same values and they should not contradict each other.

Manage excluded shipping locations using business policies through the fulfillment_policy resource 
of the Account v1 API.

```php
use Rat\eBaySDK\API\MetadataAPI\ShippingMarketplace\GetExcludeShippingLocations;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetExcludeShippingLocations(
    marketplaceId: (string) $marketplaceId,
);
$response = $client->execute($request);
```

### GetHandlingTimes <DocsBadge path="sell/metadata/resources/shipping:marketplace/methods/getHandlingTimes" />

<ResourcePath method="GET">/marketplace/shipping/{marketplaceId}/get_handling_times</ResourcePath>

This method retrieves a list of supported handling times for the specified marketplace. The handling 
time returned specifies the maximum number of business days the eBay site allows for shipping an 
item to domestic buyers after receiving a cleared payment. Handling times apply to both domestic and 
international orders. If the handling time is 1 day, the seller commits to dropping the item off for 
shipment one business day after payment clears.

Manage handing times using business policies through the fulfillment_policy resource of the Account 
v1 API.

```php
use Rat\eBaySDK\API\MetadataAPI\ShippingMarketplace\GetHandlingTimes;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetHandlingTimes(
    marketplaceId: (string) $marketplaceId,
);
$response = $client->execute($request);
```

### GetShippingCarriers <DocsBadge path="sell/metadata/resources/shipping:marketplace/methods/getShippingCarriers" />

<ResourcePath method="GET">/marketplace/shipping/{marketplaceId}/get_shipping_carriers</ResourcePath>

This method retrieves a list of supported shipping carriers for the specified marketplace. It 
provides essential information for sellers to understand which shipping carriers are available for 
use when listing items on that eBay marketplace. Knowing the supported carriers can help sellers 
optimize their shipping options and ensure efficient delivery to buyers.

The value returned in the shippingCarrier field is the enumerated value required when providing 
shipment tracking information for that carrier.

> [!TIP]
> Use the getShippingServices method to explore available shipping services for each carrier.

Manage shipping carriers using business policies through the fulfillment_policy resource of the 
Account v1 API.

```php
use Rat\eBaySDK\API\MetadataAPI\ShippingMarketplace\GetShippingCarriers;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetShippingCarriers(
    marketplaceId: (string) $marketplaceId,
);
$response = $client->execute($request);
```

### GetShippingLocations <DocsBadge path="sell/metadata/resources/shipping:marketplace/methods/getShippingLocations" />

<ResourcePath method="GET">/marketplace/shipping/{marketplaceId}/get_shipping_locations</ResourcePath>

This method retrieves a list of supported shipping locations for the specified marketplace. It 
provides sellers with information on where they can ship their items. Sellers can use this 
information to configure their shipping settings.

> [!TIP]
> Use the getExcludeShippingLocations method to return locations where the seller does not ship.

Manage shipping locations using business policies through the fulfillment_policy resource of the 
Account v1 API.

```php
use Rat\eBaySDK\API\MetadataAPI\ShippingMarketplace\GetShippingLocations;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetShippingLocations(
    marketplaceId: (string) $marketplaceId,
);
$response = $client->execute($request);
```

### GetShippingServices <DocsBadge path="sell/metadata/resources/shipping:marketplace/methods/getShippingServices" />

<ResourcePath method="GET">/marketplace/shipping/{marketplaceId}/get_shipping_services</ResourcePath>

This method retrieves a list of shipping services supported for the specified marketplace, including 
valid shipping services, shipping times, and package constraints such as size and weight.

Manage shipping services using business policies through the fulfillment_policy resource of the 
Account v1 API.

```php
use Rat\eBaySDK\API\MetadataAPI\ShippingMarketplace\GetShippingServices;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetShippingServices(
    marketplaceId: (string) $marketplaceId,
);
$response = $client->execute($request);
```