---
outline: deep
---
# Account API v2 <Badge type="warning" style="margin-left:0.75rem;">v2.1.0</Badge> <DocsBadge path="sell/account/v2/static/overview.html" />

The Account API v2 provides sellers with advanced methods for managing their shipping rate tables. 
Using these methods, sellers can:

- retrieve a shipping rate table specified by a rate table ID;
- quickly update shipping cost information for a shipping rate table specified by the rate table ID.

In addition to these methods, the Account API v2 also provides sellers in mainland China methods to 
configure split payouts between two separate payment instruments, such as between a bank account and 
Payoneer.

## PayoutSettings

### GetPayoutSettings <DocsBadge path="sell/account/v2/resources/payout_settings/methods/getPayoutSettings" />

<ResourcePath method="GET">/payout_settings</ResourcePath>

> [!CAUTION] Important
> Split-payout functionality is only available to mainland China sellers, who can split 
> payouts between their Payoneer account and bank account. Card payouts are not currently available 
> for sellers in mainland China.

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

> [!CAUTION] Important
> Split-payout functionality is only available to mainland China sellers, who can split 
> payouts between their Payoneer account and bank account. Card payouts are not currently available 
> for sellers in mainland China.

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
