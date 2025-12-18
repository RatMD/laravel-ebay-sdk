---
outline: deep
---
# Traditional / User Account <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/UserAccountIndex.html" />

This Call Reference describes the elements and attributes for each eBay User Account call below.

## AddToWatchList <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/AddToWatchList.html" />

Adds one or more items to the user's My eBay watch list.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\AddToWatchList;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new AddToWatchList(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## ConfirmIdentity <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/ConfirmIdentity.html" />

Returns the ID of a user who has gone through an application's consent flow process for obtaining an 
authorization token.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\ConfirmIdentity;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new ConfirmIdentity(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## FetchToken <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/FetchToken.html" />

Retrieves an authentication token for a user.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\FetchToken;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new FetchToken(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetAccount <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetAccount.html" />

Returns a seller's invoice data for their eBay account, including the account's summary data.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\GetAccount;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetAccount(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetMyeBayBuying <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetMyeBayBuying.html" />

Returns items from the Buying section of the user's My eBay account, including items that the user 
is watching, bidding on, has won, has not won, and has made best offers on.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\GetMyeBayBuying;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetMyeBayBuying(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetMyeBaySelling <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetMyeBaySelling.html" />

Returns items from the Selling section of the user's My eBay account, including items that the user 
is currently selling (the Active list), items that have bids, sold items, and unsold items.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\GetMyeBaySelling;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetMyeBaySelling(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetNotificationPreferences <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetNotificationPreferences.html" />

Retrieves the requesting application's notification preferences.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\GetNotificationPreferences;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetNotificationPreferences(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetNotificationsUsage <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetNotificationsUsage.html" />

Retrieves usage information about platform notifications for a given application.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\GetNotificationsUsage;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetNotificationsUsage(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetSessionID <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetSessionID.html" />

Retrieves a session ID that identifies a user and your application when you make a FetchToken 
request.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\GetSessionID;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSessionID(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetShippingDiscountProfiles <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetShippingDiscountProfiles.html" />

Returns the shipping discount profiles defined by the user, along with other combined 
payment-related details such as packaging and handling costs.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\GetShippingDiscountProfiles;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetShippingDiscountProfiles(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetTaxTable <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetTaxTable.html" />

Retrieves the tax table for a user on a given site or retrieves the valid jurisdictions (if any) for 
a given site.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\GetTaxTable;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetTaxTable(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetTokenStatus <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetTokenStatus.html" />

Requests current status of user token.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\GetTokenStatus;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetTokenStatus(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetUser <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetUser.html" />

Retrieves data pertaining to a single eBay user.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\GetUser;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetUser(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetUserPreferences <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetUserPreferences.html" />

Retrieves the specified user preferences for the authenticated caller.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\GetUserPreferences;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetUserPreferences(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetVeROReasonCodeDetails <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetVeROReasonCodeDetails.html" />

Retrieves details about VeRO reason codes for a given site or all sites. You must be a member of the 
Verified Rights Owner (VeRO) Program to use this call.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\GetVeROReasonCodeDetails;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetVeROReasonCodeDetails(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetVeROReportStatus <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetVeROReportStatus.html" />

Retrieves status information about VeRO reported items. You must be a member of the Verified Rights 
Owner (VeRO) Program to use this call.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\GetVeROReportStatus;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetVeROReportStatus(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## RemoveFromWatchList <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/RemoveFromWatchList.html" />

Enables a user to remove one or more items from their My eBay watch list.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\RemoveFromWatchList;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new RemoveFromWatchList(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## RevokeToken <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/RevokeToken.html" />

Voluntarily revokes a token before it would otherwise expire.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\RevokeToken;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new RevokeToken(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## SetShippingDiscountProfiles <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/SetShippingDiscountProfiles.html" />

Enables a seller to define shipping cost discount profiles for things such as combined payments for 
shipping and handling costs.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\SetShippingDiscountProfiles;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SetShippingDiscountProfiles(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## SetTaxTable <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/SetTaxTable.html" />

Sets the tax table for a seller on a given site.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\SetTaxTable;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SetTaxTable(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## SetUserNotes <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/SetUserNotes.html" />

Enables users to add, replace, and delete My eBay notes for items that are being tracked in the My 
eBay All Selling and All Buying areas.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\SetUserNotes;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SetUserNotes(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## SetUserPreferences <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/SetUserPreferences.html" />

Type defining the SetUserPreferences request container.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\SetUserPreferences;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SetUserPreferences(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## VeROReportItems <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/VeROReportItems.html" />

Reports items that allegedly infringe your copyright, trademark, or other intellectual property 
rights. You must be a member of the Verified Rights Owner (VeRO) Program to use this call.

```php
use Rat\eBaySDK\API\TraditionalAPI\Account\VeROReportItems;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new VeROReportItems(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```
