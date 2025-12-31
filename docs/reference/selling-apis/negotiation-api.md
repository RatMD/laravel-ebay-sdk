---
outline: deep
---
# Negotiation API <Badge type="warning" style="margin-left:0.75rem;">v1.1.2</Badge> <DocsBadge path="sell/negotiation/static/overview.html" />

The Negotiation API gives sellers the ability to engage in sales negotiations with buyers.

The API currently supports only the ability for sellers to extend offers to buyers who have shown 
an interest in their listings. The ability to partake in more detailed negotiations will increase 
as the functionality of the API is expanded.

## Offer

### FindEligibleItems <DocsBadge path="sell/negotiation/resources/offer/methods/findEligibleItems" />

<ResourcePath method="GET">/find_eligible_items</ResourcePath>

This method evaluates a seller's current listings and returns the set of IDs that are eligible for a
seller-initiated discount offer to a buyer.

A listing ID is returned only when one or more buyers have shown an "interest" in the listing.

If any buyers have shown interest in a listing, the seller can initiate a "negotiation" with them by 
calling sendOfferToInterestedBuyers, which sends all interested buyers a message that offers the 
listing at a discount.

For details about how to create seller offers to buyers, see
[Sending offers to buyers](https://developer.ebay.com/api-docs/sell/static/marketing/offers-to-buyers.html).

```php
use Rat\eBaySDK\API\NegotiationAPI\Offer\FindEligibleItems;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new FindEligibleItems(
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### SendOfferToInterestedBuyers <DocsBadge path="sell/negotiation/resources/offer/methods/sendOfferToInterestedBuyers" />

<ResourcePath method="POST">/send_offer_to_interested_buyers</ResourcePath>

This method sends eligible buyers offers to purchase items in a listing at a discount.

When a buyer has shown interest in a listing, they become "eligible" to receive a seller-initiated 
offer to purchase the item(s).

Sellers use findEligibleItems to get the set of listings that have interested buyers. If a listing 
has interested buyers, sellers can use this method (sendOfferToInterestedBuyers) to send an offer to 
the buyers who are interested in the listing. The offer gives buyers the ability to purchase the 
associated listings at a discounted price.

For details about how to create seller offers to buyers, see 
[Sending offers to buyers](https://developer.ebay.com/api-docs/sell/static/marketing/offers-to-buyers.html).

```php
use Rat\eBaySDK\API\NegotiationAPI\Offer\SendOfferToInterestedBuyers;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SendOfferToInterestedBuyers(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```