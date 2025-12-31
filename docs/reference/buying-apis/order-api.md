---
outline: deep
---
# Order API <Badge type="warning" style="margin-left:0.75rem;">v2.1.2</Badge> <DocsBadge path="buy/order/static/overview.html" />

> [!NOTE]
> This is the v2 version of the Order API which supports guest checkout payment flows. If you need 
> to support member checkout payment flows, please use the v1_beta version of the Order API.

The Order API is part of the eBay Buy APIs. It is used to purchase items and track the purchase 
orders. The Order API supports the complete guest checkout process. Use the Order API with the other 
Buy APIs to create a buying application that lets guest users buy from eBay sellers without visiting 
the eBay site. The Buy APIs provide the ability to purchase eBay items from your app or website.

> [!NOTE]
> This is a [Limited Release](https://developer.ebay.com/api-docs/static/versioning.html#limited) 
> API available only to select developers approved by business units.

## GuestCheckoutSession

### ApplyGuestCoupon <DocsBadge path="buy/order/resources/guest_checkout_session/methods/applyGuestCoupon" />

<ResourcePath method="POST">/guest_checkout_session/{checkoutSessionId}/apply_coupon</ResourcePath>

This method adds a coupon to an eBay guest checkout session and applies it to all the eligible items 
in the order.

The checkoutSessionId is passed in as a URI parameter and is required. The redemption code of the 
coupon is in the payload and is also required.

```php
use Rat\eBaySDK\API\OrderAPI\GuestCheckoutSession\ApplyGuestCoupon;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new ApplyGuestCoupon(
    marketplaceId: (string) $marketplaceId,
    checkoutSessionId: (string) $checkoutSessionId,
    redemptionCode: (string) $redemptionCode,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

### GetGuestCheckoutSession <DocsBadge path="buy/order/resources/guest_checkout_session/methods/getGuestCheckoutSession" />

<ResourcePath method="GET">/guest_checkout_session/{checkoutSessionId}</ResourcePath>

This method returns the details of the specified guest checkout session. The checkoutSessionId is 
passed in as a URI parameter and is required. This method has no request payload.

```php
use Rat\eBaySDK\API\OrderAPI\GuestCheckoutSession\GetGuestCheckoutSession;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetGuestCheckoutSession(
    marketplaceId: (string) $marketplaceId,
    checkoutSessionId: (string) $checkoutSessionId,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

### InitiateGuestCheckoutSession <DocsBadge path="buy/order/resources/guest_checkout_session/methods/initiateGuestCheckoutSession" />

<ResourcePath method="POST">/guest_checkout_session/initiate</ResourcePath>

This method creates an eBay guest checkout session, which is the first step in performing a 
checkout. The method returns a checkoutSessionId that you use as a URI parameter in subsequent guest 
checkout methods.

```php
use Rat\eBaySDK\API\OrderAPI\GuestCheckoutSession\InitiateGuestCheckoutSession;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new InitiateGuestCheckoutSession(
    marketplaceId: (string) $marketplaceId,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

### RemoveGuestCoupon <DocsBadge path="buy/order/resources/guest_checkout_session/methods/removeGuestCoupon" />

<ResourcePath method="POST">/guest_checkout_session/{checkoutSessionId}/remove_coupon</ResourcePath>

This method removes a coupon from an eBay guest checkout session. The checkoutSessionId is passed in 
as a URI parameter and is required. The redemption code of the coupon is specified in the payload 
and is also required.

```php
use Rat\eBaySDK\API\OrderAPI\GuestCheckoutSession\RemoveGuestCoupon;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new RemoveGuestCoupon(
    marketplaceId: (string) $marketplaceId,
    checkoutSessionId: (string) $checkoutSessionId,
    redemptionCode: (string) $redemptionCode,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

### UpdateGuestQuantity <DocsBadge path="buy/order/resources/guest_checkout_session/methods/updateGuestQuantity" />

<ResourcePath method="POST">/guest_checkout_session/{checkoutSessionId}/update_quantity</ResourcePath>

This method changes the quantity of the specified line item in an eBay guest checkout session.

```php
use Rat\eBaySDK\API\OrderAPI\GuestCheckoutSession\UpdateGuestQuantity;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateGuestQuantity(
    marketplaceId: (string) $marketplaceId,
    checkoutSessionId: (string) $checkoutSessionId,
    payload: (array) $payload,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

### UpdateGuestShippingAddress <DocsBadge path="buy/order/resources/guest_checkout_session/methods/updateGuestShippingAddress" />

<ResourcePath method="POST">/guest_checkout_session/{checkoutSessionId}/update_shipping_address</ResourcePath>

This method changes the shipping address for the order in an eBay guest checkout session. All the 
line items in an order must be shipped to the same address, but the shipping method can be specific 
to the line item.

```php
use Rat\eBaySDK\API\OrderAPI\GuestCheckoutSession\UpdateGuestShippingAddress;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateGuestShippingAddress(
    marketplaceId: (string) $marketplaceId,
    checkoutSessionId: (string) $checkoutSessionId,
    payload: (array) $payload,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

### UpdateGuestShippingOption <DocsBadge path="buy/order/resources/guest_checkout_session/methods/updateGuestShippingOption" />

<ResourcePath method="POST">/guest_checkout_session/{checkoutSessionId}/update_shipping_option</ResourcePath>

This method changes the shipping method for the specified line item in an eBay guest checkout 
session. The shipping option can be set for each line item. This gives the shopper the ability 
choose the cost of shipping for each line item.

```php
use Rat\eBaySDK\API\OrderAPI\GuestCheckoutSession\UpdateGuestShippingOption;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateGuestShippingOption(
    marketplaceId: (string) $marketplaceId,
    checkoutSessionId: (string) $checkoutSessionId,
    payload: (array) $payload,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```

## GetGuestPurchaseOrder

### GetGuestPurchaseOrder <DocsBadge path="buy/order/resources/guest_purchase_order/methods/getGuestPurchaseOrder" />

<ResourcePath method="GET">/guest_purchase_order/{purchaseOrderId}</ResourcePath>

This method retrieves the details about a specific guest purchase order. It returns the line items, 
including purchase order status, dates created and modified, item quantity and listing data, payment 
and shipping information, and prices, taxes, discounts and credits.

The purchaseOrderId is passed in as a URI parameter and is required.

```php
use Rat\eBaySDK\API\OrderAPI\GuestPurchaseOrder\GetGuestPurchaseOrder;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetGuestPurchaseOrder(
    marketplaceId: (string) $marketplaceId,
    purchaseOrderId: (string) $purchaseOrderId,
    endUserCtx: (string) $endUserCtx = null,
);
$response = $client->execute($request);
```
