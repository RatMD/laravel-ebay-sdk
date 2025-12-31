---
outline: deep
---
# Offer API <Badge type="warning" style="margin-left:0.75rem;">v1_beta.0.1</Badge> <DocsBadge path="buy/offer/static/overview.html" />

The Offer API provides the ability to place and retract a proxy bid for a buyer and to retrieve all 
the auctions where the buyer is bidding.

> [!NOTE]
> This is a [Limited Release](https://developer.ebay.com/api-docs/static/versioning.html#limited) 
> API available only to select developers approved by business units.

## Bidding

### GetBidding <DocsBadge path="buy/offer/resources/bidding/methods/getBidding" />

<ResourcePath method="GET">/bidding/{itemId}</ResourcePath>

This method retrieves the bidding details that are specific to the buyer of the specified auction. 
This must be an auction where the buyer has already placed a bid.

To retrieve the bidding information you use a user access token and pass in the item ID of the 
auction. You can also retrieve general bidding details about the auction, such as minimum bid price 
and the count of unique bidders, using the Browse API getItems method.

```php
use Rat\eBaySDK\API\OfferAPI\Bidding\GetBidding;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetBidding(
    marketplaceId: (string) $marketplaceId,
    itemId: (string) $itemId,
);
$response = $client->execute($request);
```

### PlaceProxyBid <DocsBadge path="buy/offer/resources/bidding/methods/placeProxyBid" />

<ResourcePath method="POST">/bidding/{itemId}/place_proxy_bid</ResourcePath>

This method uses a user access token to place a proxy bid for the buyer on a specific auction item. 
The item must offer AUCTION as one of the buyingOptions.

To place a bid, you pass in the item ID of the auction as a URI parameter and the buyer's maximum 
bid amount (maxAmount ) in the payload. By placing a proxy bid, the buyer is agreeing to purchase 
the item if they win the auction.

After this bid is placed, if someone else outbids the buyer a bid, eBay automatically bids again for 
the buyer up to the amount of their maximum bid. When the bid exceeds the buyer's maximum bid, eBay 
will notify them that they have been outbid.

```php
use Rat\eBaySDK\API\OfferAPI\Bidding\PlaceProxyBid;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new PlaceProxyBid(
    marketplaceId: (string) $marketplaceId,
    itemId: (string) $itemId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```