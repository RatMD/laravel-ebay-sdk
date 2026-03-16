---
outline: deep
---
# Account API v2 <Badge type="warning" style="margin-left:0.75rem;">v2.2.0</Badge> <DocsBadge path="sell/account/v2/static/overview.html" />

The Account API v2 provides sellers with advanced methods for managing their shipping rate tables. 
Using these methods, sellers can:

- retrieve a shipping rate table specified by a rate table ID;
- quickly update shipping cost information for a shipping rate table specified by the rate table ID.

In addition to these methods, the Account API v2 also provides sellers in mainland China methods to 
configure split payouts between two separate payment instruments, such as between a bank account and 
Payoneer.

## CombinedShippingRules

### CreateCalculatedShippingRules <DocsBadge path="sell/account/v2/resources/combined_shipping_rules/methods/createCalculatedShippingRules" />

<ResourcePath method="POST">/combined_shipping_rules/create_calculated_shipping_rules</ResourcePath>

This method creates or registers calculated shipping rules that determine combined shipping costs 
based on weight, item count, or cost parameters for an authenticated seller.

This shipping rule will apply to eBay listings that use the calculated shipping model.

```php
use Rat\eBaySDK\API\AccountAPIv2\CombinedShippingRules\CreateCalculatedShippingRules;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateCalculatedShippingRules(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### CreateFlatShippingRules <DocsBadge path="sell/account/v2/resources/combined_shipping_rules/methods/createFlatShippingRules" />

<ResourcePath method="POST">/combined_shipping_rules/create_flat_shipping_rules</ResourcePath>

This method is used to create fixed-rate (flat) shipping rules that apply standard combined shipping 
costs for a seller’s listings.

```php
use Rat\eBaySDK\API\AccountAPIv2\CombinedShippingRules\CreateFlatShippingRules;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateFlatShippingRules(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### CreatePromotionalShippingRule <DocsBadge path="sell/account/v2/resources/combined_shipping_rules/methods/createPromotionalShippingRule" />

<ResourcePath method="POST">/combined_shipping_rules/create_promotional_shipping_rule</ResourcePath>

This method defines promotional shipping rules such as discounts or free-shipping thresholds, 
configurable by marketplace for the seller.

```php
use Rat\eBaySDK\API\AccountAPIv2\CombinedShippingRules\CreatePromotionalShippingRule;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreatePromotionalShippingRule(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetCombinedShippingRules <DocsBadge path="sell/account/v2/resources/combined_shipping_rules/methods/getCombinedShippingRules" />

<ResourcePath method="GET">/combined_shipping_rules</ResourcePath>

This method retrieves all existing combined shipping rule configurations defined by the 
authenticated seller, including calculated, flat, and promotional types.

```php
use Rat\eBaySDK\API\AccountAPIv2\CombinedShippingRules\GetCombinedShippingRules;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCombinedShippingRules(
    marketplaceId: (string) $marketplaceId,
);
$response = $client->execute($request);
```

### UpdateCalculatedShippingRules <DocsBadge path="sell/account/v2/resources/combined_shipping_rules/methods/updateCalculatedShippingRules" />

<ResourcePath method="POST">/combined_shipping_rules/update_calculated_shipping_rules</ResourcePath>

This method updates previously defined calculated shipping rules to modify discount percentages, 
weight offsets, or amount parameters for the seller.

```php
use Rat\eBaySDK\API\AccountAPIv2\CombinedShippingRules\UpdateCalculatedShippingRules;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateCalculatedShippingRules(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### UpdateCombinedPayments <DocsBadge path="sell/account/v2/resources/combined_shipping_rules/methods/updateCombinedPayments" />

<ResourcePath method="POST">/combined_shipping_rules/update_combined_payments</ResourcePath>

This method configures or modifies combined payment settings that determine how unpaid orders can be 
merged for a single invoice within a defined duration for the seller.

```php
use Rat\eBaySDK\API\AccountAPIv2\CombinedShippingRules\UpdateCombinedPayments;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateCombinedPayments(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### UpdateFlatShippingRules <DocsBadge path="sell/account/v2/resources/combined_shipping_rules/methods/updateFlatShippingRules" />

<ResourcePath method="POST">/combined_shipping_rules/update_flat_shipping_rules</ResourcePath>

This method updates existing shipping rules.

```php
use Rat\eBaySDK\API\AccountAPIv2\CombinedShippingRules\UpdateFlatShippingRules;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateFlatShippingRules(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### UpdatePromotionalShippingRule <DocsBadge path="sell/account/v2/resources/combined_shipping_rules/methods/updatePromotionalShippingRule" />

<ResourcePath method="POST">/combined_shipping_rules/update_promotional_shipping_rule</ResourcePath>

This method updates an existing promotional shipping rule to adjust discount thresholds, eligibility 
criteria, or duration for the seller.

```php
use Rat\eBaySDK\API\AccountAPIv2\CombinedShippingRules\UpdatePromotionalShippingRule;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdatePromotionalShippingRule(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

## PayoutSettings

> [!CAUTION] Important
> Split-payout functionality is only available to mainland China sellers, who can split 
> payouts between their Payoneer account and bank account. Card payouts are not currently available 
> for sellers in mainland China.

### GetPayoutSettings <DocsBadge path="sell/account/v2/resources/payout_settings/methods/getPayoutSettings" />

<ResourcePath method="GET">/payout_settings</ResourcePath>

This method returns details on two payment instruments defined on a seller's account, including the 
ID, type, status, nickname, last four digits of the account number, and payout percentage for the 
instruments.

Using the instrumentId returned with this method, sellers can makes changes to the payout split of 
the instruments with the **updatePayoutPercentage** method. Note that the instrumentStatus of a 
payment instrument, also returned using this method, must be ACTIVE in order to do split payouts on 
that payment instrument.

```php
use Rat\eBaySDK\API\AccountAPIv2\PayoutSettings\GetPayoutSettings;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPayoutSettings();
$response = $client->execute($request);
```

### UpdatePayoutPercentage <DocsBadge path="sell/account/v2/resources/payout_settings/methods/updatePayoutPercentage" />

<ResourcePath method="POST">/payout_settings/update_percentage</ResourcePath>

This method allows sellers in mainland China to configure the split-payout percentage for two payout 
instruments available for seller payouts. For example, a seller can split payouts to have 70% of the 
payout go to a bank account and 30% go to a Payoneer account.

> [!NOTE]
> The split-payout percentage must always add up to 100%. If the values do not equal 100, the call 
> will fail. Instruments cannot be added/removed using Finance and Account APIs.

Users can specify the payout instruments being updated by using the **instrumentId** associated with 
each payment instrument in the request payload. This value is returned by using the 
**getPayoutSettings** method. Users can specify the percentage of the payout allocated to each 
instrument using the payoutPercentage request field. This value must be a whole number and cannot 
exceed 100.

```php
use Rat\eBaySDK\API\AccountAPIv2\PayoutSettings\UpdatePayoutPercentage;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdatePayoutPercentage(
    payload: (array) $payload
);
$response = $client->execute($request);
```

## RateTable

### GetRateTables <DocsBadge path="sell/account/v2/resources/rate_table/methods/getRateTable" />

<ResourcePath method="GET">/rate_table/{rateTableId}</ResourcePath>

This method retrieves an existing rate table identified by the **rate_table_id** path parameter.

Shipping rate tables are currently supported by the following marketplaces: United States, Canada, 
United Kingdom, Germany, Australia, France, Italy, and Spain. A successful call returns detailed 
information for the specified shipping rate table.

```php
use Rat\eBaySDK\API\AccountAPIv2\RateTable\GetRateTables;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetRateTables(
    rateTableId: (string) $rateTableId
);
$response = $client->execute($request);
```

### UpdateShippingCost <DocsBadge path="sell/account/v2/resources/rate_table/methods/updateShippingCost" />

<ResourcePath method="GET">/rate_table/{rateTableId}/update_shipping_cost</ResourcePath>

This method allows sellers to update **shippingCost** and/or **additionalCost** information for an 
existing shipping rate table identified by the **rate_table_id** path parameter.

A successful call returns an HTTP status code of 204 No Content.

```php
use Rat\eBaySDK\API\AccountAPIv2\RateTable\UpdateShippingCost;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateShippingCost(
    rateTableId: (string) $rateTableId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

## UserPreferences

### GetUserPreferences <DocsBadge path="sell/account/v2/resources/user_preferences/methods/getUserPreferences" />

<ResourcePath method="GET">/user_preferences</ResourcePath>

This method retrieves the seller's preferences for a specific eBay marketplace, such as combined 
payment preferences, same-day shipping cutoff time, excluded shipping locations, and opt-in status 
for Business Policies and Out-of-Stock control. The **fieldgroups** query parameter specifies the 
type of seller preferences to retrieve. If `fieldgroups = ALL` or the parameter is omitted, all the 
supported seller preferences are returned. To retrieve only specific preferences, include the 
**fieldgroups** parameter with one or more supported values, delimited by commas.

```php
use Rat\eBaySDK\API\AccountAPIv2\UserPreferences\GetUserPreferences;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetUserPreferences(
    marketplaceId: (string) $marketplaceId,
    fieldgroups: (string) $fieldgroups
);
$response = $client->execute($request);
```

### SetUserPreferences <DocsBadge path="sell/account/v2/resources/user_preferences/methods/setUserPreferences" />

<ResourcePath method="PATCH">/user_preferences</ResourcePath>

This method is used to modify one or more preferences for a seller on a specific marketplace. The 
preferences that can be modified include combined payment preferences, same-day shipping cutoff time,
and opt-in status for Business Policies and Out-of-stock control. This is a PATCH operation, so you 
only need to include the fields that correspond to the preferences/settings that you are changing.

```php
use Rat\eBaySDK\API\AccountAPIv2\UserPreferences\SetUserPreferences;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SetUserPreferences(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload
);
$response = $client->execute($request);
```