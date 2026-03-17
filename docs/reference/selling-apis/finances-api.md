---
outline: deep
---

# Finances API <Badge type="warning" style="margin-left:0.75rem;">v1.19.0</Badge> <DocsBadge path="sell/finances/static/overview.html" />

> [!CAUTION]
> Due to EU & UK Payments regulatory requirements, an additional security verification via Digital 
> Signatures is required for certain API calls that are made on behalf of EU/UK sellers, including 
> all Finances API methods. Please refer to Digital Signatures for APIs to learn more on the 
> impacted APIs and the process to create signatures to be included in the HTTP payload.

> [!NOTE]
> The Finances API does not support Team Access. Financial information, such as payouts or 
> transactions, is only returned for the user that makes the call. You cannot use any of the methods 
> in this API to return financial information for another user.

The Finances API is used by sellers to review/track financial information for their eBay account, 
such payouts to their bank account, loans/repayments, shipping costs, etc.

The information returned is similar to that available under the Payments tab of the Seller Hub in 
My eBay.

## BillingActivity

### BillingActivity <DocsBadge path="sell/finances/resources/billing_activity/methods/getBillingActivities" />

<ResourcePath method="GET">/billing_activity</ResourcePath>

This method retrieves filtered billing activities of the seller. Returned results are filtered 
through query parameters such as date range, activity ID, listing ID, or order ID. Sorting and 
pagination features help organize and navigate returned activities efficiently.

```php
use Rat\eBaySDK\API\FinancesAPI\BillingActivity\GetBillingActivities;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetBillingActivities(
    filter: (string) $filter = null,
    sort: (string) $sort = null,
    limit: (int) $limit = 100,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

## OrderEarnings

> [!NOTE]
> Expenses include fees, shipping labels, and donations. Refunds include gross refunds, gross claims, 
> and gross payment disputes.

> [!NOTE]
> Only charges and credits tied to the order are shown, and they appear in near real time for order
> created within the selected order creation time window.

> [!NOTE] 
> Access to the **order_earnings** resource is currently limited to only US, China, or Hong Kong 
> sellers who meet the following criteria and also request access:
> 
> - US sellers with the country of residence set to US and having a payout currency in USD.
> 
> - Hong Kong or China sellers having the country of residence set to HK or CN and the payout 
> currency set to USD have access.
> 
> To request access, submit an application growth check to have the required OAuth scope added to 
> your app. After submission, you can use the same growth check link to track the status of the 
> request.
> 
> eBay plans on expanding this to other markets in the future.

### GetOrderEarnings <DocsBadge path="sell/finances/resources/order_earnings/methods/getOrderEarnings" />

<ResourcePath method="GET">/order_earnings</ResourcePath>

This method returns detailed order-level financial data for each order associated with a seller 
account. The returned order-level financial data includes order earnings, gross amount, expenses, 
and refunds. Order earnings includes earnings after deducting expenses and refunds from the gross 
amount.

The financial data for orders will be returned as filtered based on the order's creation date.

Pagination is supported through the `limit` and `offset` parameters. These parameters can be used to 
control the number of records returned in a single response and to retrieve subsequent pages of 
results when the result set spans multiple pages.

The response can be filtered by using the filter parameter. This parameter allows consumers to 
restrict the results returned by the method based on supported filtering criteria.

```php
use Rat\eBaySDK\API\FinancesAPI\OrderEarnings\GetOrderEarnings;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetOrderEarnings(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null,
    sort: (string) $sort = null,
    limit: (int) $limit = 20,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### GetOrderEarningsById <DocsBadge path="sell/finances/resources/order_earnings/methods/getOrderEarningsById" />

<ResourcePath method="GET">/order_earnings/{orderId}</ResourcePath>

This method returns detailed order-level financial data including order earnings, gross amount, 
expenses, and refunds. Order earnings includes earnings after deducting expenses and refunds from 
the gross amount.

The response returns earnings information only for the order identified by the order_id path 
parameter.

```php
use Rat\eBaySDK\API\FinancesAPI\OrderEarnings\GetOrderEarningsById;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetOrderEarningsById(
    marketplaceId: (string) $marketplaceId,
    orderId: (string) $orderId,
);
$response = $client->execute($request);
```

### GetOrderEarningsSummary <DocsBadge path="sell/finances/resources/order_earnings/methods/getOrderEarningsSummary" />

<ResourcePath method="GET">/order_earnings_summary</ResourcePath>

This method returns a summarized view of order earnings information for one or more orders 
associated with a seller account. The method retrieves aggregated data for order earnings after 
deducting expenses and refunds from the gross amount. You can use this method for high-level 
financial reporting workflows.

The response can be filtered by using the `filter` parameter. This parameter allows consumers to 
restrict the summary results returned by the method based on supported filtering criteria.

```php
use Rat\eBaySDK\API\FinancesAPI\OrderEarnings\GetOrderEarningsSummary;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetOrderEarningsSummary(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null,
);
$response = $client->execute($request);
```

## Payout

### GetPayout <DocsBadge path="sell/finances/resources/payout/methods/getPayout" />

<ResourcePath method="GET">/payout/{payoutId}</ResourcePath>

This method retrieves details on a specific seller payout. The unique identifier of the payout is 
passed in as a path parameter at the end of the call URI.

The getPayouts method can be used to retrieve the unique identifier of a payout, or the user can 
check Seller Hub.

For split-payout cases, which are only available to sellers in mainland China, this method will 
return the payoutPercentage for the specified payout. This value indicates the current payout 
percentage allocated to a payment instrument. This method will also return the convertedToCurrency 
and convertedToValue response fields in CNY value.

```php
use Rat\eBaySDK\API\FinancesAPI\Payout\GetPayout;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPayout(
    marketplaceId: (string) $marketplaceId,
    payoutId: (string) $payoutId,
);
$response = $client->execute($request);
```

### GetPayouts <DocsBadge path="sell/finances/resources/payout/methods/GetPayouts" />

<ResourcePath method="GET">/payout</ResourcePath>

This method is used to retrieve the details of one or more seller payouts. By using the filter query 
parameter, users can retrieve payouts processed within a specific date range, and/or they can 
retrieve payouts in a specific state.

There are also pagination and sort query parameters that allow users to control the payouts that are 
returned in the response.

If no payouts match the input criteria, an empty payload is returned.

For split-payout cases, which are only available to sellers in mainland China, this method will 
return the payoutPercentage for the specified payout. This value indicates the current payout 
percentage allocated to a payout instrument. This method will also return the convertedToCurrency 
and convertedTo response fields set to CNY value and the payoutReference, the unique identifier 
reference (not true payout).

By using the filter query parameter, users can retrieve the two true(actual) payouts associated with 
a payoutReference.

```php
use Rat\eBaySDK\API\FinancesAPI\Payout\GetPayouts;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPayouts(
    marketplaceId: (string) $marketplaceId,
    payoutId: (string) $payoutId,
    limit: (int) $limit = 20,
    offset: (int) $offset = 0,
    filter: (string) $filter = null,
    sort: (string) $sort = null,
);
$response = $client->execute($request);
```

### GetPaymentSummary <DocsBadge path="sell/finances/resources/payout/methods/getPayoutSummary" />

<ResourcePath method="GET">/payout_summary</ResourcePath>

This method is used to retrieve cumulative values for payouts in a particular state, or all states. 
The metadata in the response includes total payouts, the total number of monetary transactions 
(sales, refunds, credits) associated with those payouts, and the total dollar value of all payouts.

If the filter query parameter is used to filter by payout status, only one payout status value may 
be used. If the filter query parameter is not used to filter by a specific payout status, cumulative 
values for payouts in all states are returned.

The user can also use the filter query parameter to specify a date range, and then only payouts that 
were processed within that date range are considered.

```php
use Rat\eBaySDK\API\FinancesAPI\Payout\GetPaymentSummary;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPaymentSummary(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

## SellerFundsSummary

### GetSellerFundsSummary <DocsBadge path="sell/finances/resources/seller_funds_summary/methods/getSellerFundsSummary" />

<ResourcePath method="GET">/seller_funds_summary</ResourcePath>

This method retrieves all pending funds that have not yet been distibuted through a seller payout.

There are no input parameters for this method. The response payload includes available funds, funds 
being processed, funds on hold, and also an aggregate count of all three of these categories.

If there are no funds that are pending, on hold, or being processed for the seller's account, no 
response payload is returned, and an http status code of 204 - No Content is returned instead.

```php
use Rat\eBaySDK\API\FinancesAPI\SellerFundsSummary\GetSellerFundsSummary;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSellerFundsSummary(
    marketplaceId: (string) $marketplaceId,
);
$response = $client->execute($request);
```

## Transaction

### GetTransactions <DocsBadge path="sell/finances/resources/transaction/methods/getTransactions" />

<ResourcePath method="GET">/transaction</ResourcePath>

The getTransactions method allows a seller to retrieve information about one or more of their 
monetary transactions.

```php
use Rat\eBaySDK\API\FinancesAPI\Transaction\GetTransactions;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetTransactions(
    marketplaceId: (string) $marketplaceId,
    limit: (int) $limit = 20,
    offset: (int) $offset = 0,
    filter: (string) $filter = null,
    sort: (string) $sort = null,
);
$response = $client->execute($request);
```

### GetTransactionSummary <DocsBadge path="sell/finances/resources/transaction/methods/getTransactionSummary" />

<ResourcePath method="GET">/transaction_summary</ResourcePath>

The getTransactionSummary method retrieves cumulative information for monetary transactions. If 
applicable, the number of payments with a transactionStatus equal to FUNDS_ON_HOLD and the total 
monetary amount of these on-hold payments are also returned.

```php
use Rat\eBaySDK\API\FinancesAPI\Transaction\GetTransactionSummary;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetTransactionSummary(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null,
);
$response = $client->execute($request);
```

## Transfer 

### GetTransfer <DocsBadge path="sell/finances/resources/transfer/methods/getTransfer" />

<ResourcePath method="GET">/transfer/{transferId}</ResourcePath>

This method retrieves detailed information regarding a TRANSFER transaction type. A TRANSFER is a 
monetary transaction type that involves a seller transferring money to eBay for reimbursement of 
one or more charges. For example, when a seller reimburses eBay for a buyer refund.

If an ID is passed into the URI that is an identifier for another transaction type, this call will 
return an http status code of 404 Not found.

```php
use Rat\eBaySDK\API\FinancesAPI\Transfer\GetTransfer;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetTransfer(
    marketplaceId: (string) $marketplaceId,
    transferId: (string) $transferId,
);
$response = $client->execute($request);
```