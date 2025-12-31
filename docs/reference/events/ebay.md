---
outline: deep
---
# eBay Notification Events <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html" />

The SDK exposes eBay push notifications as Laravel events, provided the webhook is configured 
correctly as described [here](/guide/webhook).

## AskSellerQuestion
This is a seller-facing notification that is sent when an eBay user has used the Ask a Question feature on the seller's
active listing. An eBay user does not have to be an active bidder on an auction listing to ask a seller a question.

This notification will appear in the GetMemberMessages call response. See AskSellerQuestion for additional information
about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\AskSellerQuestion;

class YourEventListener
{
    public function handle(AskSellerQuestion $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## AuctionCheckoutComplete
This seller-facing notification is sent when the winning bidder or buyer has paid for the auction or fixed-price item
and completed the checkout process. For multiple line item orders, an AuctionCheckoutComplete notification is only
generated for one of the line items in the order.

This notification will appear in the GetItemTransactions call response. See AuctionCheckoutComplete for additional
information about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\AuctionCheckoutComplete;

class YourEventListener
{
    public function handle(AuctionCheckoutComplete $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## BestOffer
This seller-facing notification is sent if a potential buyer has made a Best Offer on a Best Offer-enabled listing.

This notification will appear in the GetBestOffers call response. See BestOffer for additional information about this
notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\BestOffer;

class YourEventListener
{
    public function handle(BestOffer $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## BestOfferDeclined
This buyer-facing notification is sent when a seller declines the buyer's Best Offer on an item.

This notification will appear in the GetBestOffers call response. See BestOfferDeclined for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\BestOfferDeclined;

class YourEventListener
{
    public function handle(BestOfferDeclined $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## BestOfferPlaced
This buyer-facing notification is sent each time a prospective buyer places a Best Offer on an item.

This notification will appear in the GetBestOffer call response. See BestOfferPlaced for additional information.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\BestOfferPlaced;

class YourEventListener
{
    public function handle(BestOfferPlaced $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## BidItemEndingSoon
This notification is sent to a subscribed buyer when the listing of the auction item where the buyer has an active bid
is about to end. This event has a TimeLeft property that defines the 'ending soon' threshold value.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\BidItemEndingSoon;

class YourEventListener
{
    public function handle(BidItemEndingSoon $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## BidPlaced
This buyer-facing notification is sent when the buyer places a bid for an auction item.

This notification will appear in the GetItem call response. See BidPlaced for additional information about this
notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\BidPlaced;

class YourEventListener
{
    public function handle(BidPlaced $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## BidReceived
This seller-facing notification is sent each time a prospective buyer places a bid for the seller's auction item.

This notification will appear in the GetItem call response. See BidReceived for additional information about this
notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\BidReceived;

class YourEventListener
{
    public function handle(BidReceived $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## BuyerCancelRequested
This notification is sent to a subscribed seller when a buyer has requested an order cancellation.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\BuyerCancelRequested;

class YourEventListener
{
    public function handle(BuyerCancelRequested $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## CheckoutBuyerRequestsTotal
This seller-facing notification is sent when a buyer/winning bidder is requesting a total price before paying for the
item. This notification is applicable for auction listings and for fixed-price listings that do not require immediate
payment.

This notification will appear in the GetItemTransactions call response. See CheckoutBuyerRequestsTotal for additional
information about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\CheckoutBuyerRequestsTotal;

class YourEventListener
{
    public function handle(CheckoutBuyerRequestsTotal $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## CounterOfferReceived
This buyer-facing notification is sent when a seller makes a counter offer to the buyer's Best Offer on an item.

This notification will appear in the GetBestOffers call response. See CounterOfferReceived for additional information
about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\CounterOfferReceived;

class YourEventListener
{
    public function handle(CounterOfferReceived $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## CustomCode
Reserved for future use.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\CustomCode;

class YourEventListener
{
    public function handle(CustomCode $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## EBPAppealedCase
This notification is applicable to both buyers and sellers and is sent when the decision of an eBay Money Back Guarantee
case is appealed.

This notification will appear in the getEBPCaseDetail call response. See EBPAppealedCase for additional information
about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\EBPAppealedCase;

class YourEventListener
{
    public function handle(EBPAppealedCase $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## EBPClosedAppeal
This notification is applicable to both buyers and sellers and is sent when an appeal of an eBay Money Back Guarantee
case decision has been closed.

This notification will appear in the getEBPCaseDetail call response. See EBPClosedAppeal for additional information
about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\EBPClosedAppeal;

class YourEventListener
{
    public function handle(EBPClosedAppeal $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## EBPClosedCase
This notification is is applicable to both buyers and sellers and is sent when an eBay Money Back Guarantee case has
been closed.

This notification can also be sent to the subscribed seller when the buyer has closed either of the following:
an Item Not Received inquiry against an order line item
an Item Not Received case opened by that buyer
This notification will appear in the getEBPCaseDetail call response. See EBPClosedCase for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\EBPClosedCase;

class YourEventListener
{
    public function handle(EBPClosedCase $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## EBPEscalatedCase
This notification is applicable to both buyers an sellers and is sent when an eBay Money Back Guarantee case is
escalated to eBay customer support. This notification is also sent to a subscribed seller when an Item Not Received
inquiry against an order line item has been escalated to an eBay Money Back Guarantee case.

This notification will appear in the getEBPCaseDetail call response. See EBPEscalatedCase for additional information
about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\EBPEscalatedCase;

class YourEventListener
{
    public function handle(EBPEscalatedCase $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## EBPMyPaymentDue
This seller-facing notification is sent when payment (to eBay or buyer) related to the outcome of an eBay Money Back
Guarantee case is due.

This notification will appear in the getEBPCaseDetail call response. See EBPMyPaymentDue for additional information
about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\EBPMyPaymentDue;

class YourEventListener
{
    public function handle(EBPMyPaymentDue $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## EBPMyResponseDue
This notification is applicable to both buyers and sellers and is sent when a response to the eBay Money Back Guarantee
case is due from that user. When an eBay Money Back Guarantee case is opened, this notification is only sent to the
seller involved in the case and not the buyer.

This notification is also sent to a subscribed seller when the buyer has opened up either of the following:
an Item Not Received inquiry against an order line item
an Item Not Received case against that seller.
This notification will appear in the getEBPCaseDetail call response. See EBPMyResponseDue for additional information
about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\EBPMyResponseDue;

class YourEventListener
{
    public function handle(EBPMyResponseDue $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## EBPOnHoldCase
This notification is is applicable to both buyers and sellers and is sent when an eBay Money Back Guarantee case has
been put on hold by eBay customer support.

This notification will appear in the getEBPCaseDetail call response. See EBPOnHoldCase for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\EBPOnHoldCase;

class YourEventListener
{
    public function handle(EBPOnHoldCase $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## EBPOtherPartyResponseDue
This notification is applicable to both buyers and sellers and is sent when a response to the eBay Money Back Guarantee
case is due from the other party in the case.

This notification will appear in the getEBPCaseDetail call response. See EBPOtherPartyResponseDue for additional
information about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\EBPOtherPartyResponseDue;

class YourEventListener
{
    public function handle(EBPOtherPartyResponseDue $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## EBPPaymentDone
This seller-facing notification is sent when payment (to eBay or buyer) related to the outcome of an eBay Money Back
Guarantee case is processed.

This notification will appear in the getEBPCaseDetail call response. See EBPPaymentDone for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\EBPPaymentDone;

class YourEventListener
{
    public function handle(EBPPaymentDone $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## EndOfAuction
This notification is applicable to both buyers and sellers and is sent as soon as an auction listing ends with or
without a winning bidder. This notification will also be sent if the auction ends as a result of a buyer using the
auction listing's Buy It Now feature. This notification is only applicable for auction listings.

This notification will appear in the GetItemTransactions call response. See EndOfAuction for additional information
about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\EndOfAuction;

class YourEventListener
{
    public function handle(EndOfAuction $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## Feedback
This notification is applicable to both buyers and sellers and is sent when that buyer or seller has left Feedback for
the other party in the order, or has received Feedback from the other party in the order. Feedback is given at the order
line item level.

This notification will appear in the GetFeedback call response. See Feedback for additional information about this
notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\Feedback;

class YourEventListener
{
    public function handle(Feedback $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## FeedbackLeft
This notification is applicable to both buyers and sellers and is sent when that user leaves feedback for an order
partner.

This notification will appear in the GetFeedback call response. See FeedbackLeft for additional information about this
notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\FeedbackLeft;

class YourEventListener
{
    public function handle(FeedbackLeft $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## FeedbackReceived
This notification is applicable to both buyers and sellers and is sent when that user receives feedback from an order
partner.

This notification will appear in the GetFeedback call response. See FeedbackReceived for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\FeedbackReceived;

class YourEventListener
{
    public function handle(FeedbackReceived $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## FeedbackStarChanged
This notification is applicable to both buyers and sellers and is sent when that user's Feedback star has changed. Sent
to a subscribing third party when a user's Feedback star level changes.

This notification will appear in the GetUser call response. See FeedbackStarChanged for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\FeedbackStarChanged;

class YourEventListener
{
    public function handle(FeedbackStarChanged $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## FixedPriceTransaction
This seller-facing notification is sent each time a buyer purchases an item in a single or multiple-quantity,
fixed-price listing. This notification is only applicable for fixed-price listings.

This notification will appear in the GetFeedback call response. See GetItemTransactions for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\FixedPriceTransaction;

class YourEventListener
{
    public function handle(FixedPriceTransaction $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## INRBuyerRespondedToDispute
This notification is sent to a subscribed seller when a buyer responds to an Item Not Received case opened by that
buyer.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\INRBuyerRespondedToDispute;

class YourEventListener
{
    public function handle(INRBuyerRespondedToDispute $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemAddedToWatchList
This buyer-facing notification is sent when that buyer adds an item to the Watch List.

This notification will appear in the GetItem call response. See ItemAddedToWatchList for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemAddedToWatchList;

class YourEventListener
{
    public function handle(ItemAddedToWatchList $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemClosed
This notification is applicable to both buyers and sellers and is sent when a listing ends. This notification can be
triggered by an ItemWon, an ItemSold, or an ItemUnsold event.

This notification will appear in the GetItem call response. See ItemClosed for additional information about this
notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemClosed;

class YourEventListener
{
    public function handle(ItemClosed $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemExtended
This notification is sent to a subscribed seller when the duration of an eBay listing has been extended.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemExtended;

class YourEventListener
{
    public function handle(ItemExtended $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemListed
This seller-facing notification is sent each time one of the subscribed seller's items is listed or relisted. This
notification is also triggered when the Unpaid Item preferences relists an item for the seller.

This notification will appear in the GetItem call response. See ItemListed for additional information about this
notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemListed;

class YourEventListener
{
    public function handle(ItemListed $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemLost
This buyer-facing notification is sent if that buyer did not end up as the highest bidder for an auction item.

This notification will appear in the GetItem call response. See ItemLost for additional information about this
notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemLost;

class YourEventListener
{
    public function handle(ItemLost $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemMarkedPaid
This notification is sent to a subscribed buyer and seller when that seller has marked an order as 'paid'.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemMarkedPaid;

class YourEventListener
{
    public function handle(ItemMarkedPaid $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemMarkedShipped
This notification is sent to a subscribed buyer and seller when that seller has marked an item as 'shipped'.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemMarkedShipped;

class YourEventListener
{
    public function handle(ItemMarkedShipped $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemOutOfStock
This notification is sent to a subscribed seller when the quantity of a multiple-quantity, Good 'Til Cancelled,
fixed-price listing has reached '0'. This notification will only be sent if the seller has the out-of-stock feature
turned on in My eBay Preferences.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemOutOfStock;

class YourEventListener
{
    public function handle(ItemOutOfStock $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemReadyForPickup
This notification is sent to a subscribed buyer when an In-Store Pickup or Click and Collect order is ready to be picked
up at the merchant's store.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemReadyForPickup;

class YourEventListener
{
    public function handle(ItemReadyForPickup $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemRemovedFromWatchList
This buyer-facing notification is sent when that buyer removes an item from the Watch List.

This notification will appear in the GetItem call response. See ItemRemovedFromWatchList for additional information
about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemRemovedFromWatchList;

class YourEventListener
{
    public function handle(ItemRemovedFromWatchList $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemRevised
This seller-facing notification is sent when one of the subscribed seller's items is revised.

This notification will appear in the GetItem call response. See ItemRevised for additional information about this
notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemRevised;

class YourEventListener
{
    public function handle(ItemRevised $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemRevisedAddCharity
This notification is sent to a subscribed seller when the seller has revised a listing and added a nonprofit
organization to receive a percentage (10 percent up to 100 percent) of the proceeds.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemRevisedAddCharity;

class YourEventListener
{
    public function handle(ItemRevisedAddCharity $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemSold
This seller-facing notification is sent when an eBay listing ends in a sale.

This notification will appear in the GetItem call response. See ItemSold for additional information about this
notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemSold;

class YourEventListener
{
    public function handle(ItemSold $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemSuspended
This notification is sent to a subscribed buyer or seller when a listing is administratively taken down by eBay.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemSuspended;

class YourEventListener
{
    public function handle(ItemSuspended $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemUnsold
This seller-facing notification is sent when an auction listing ends with no winning bidder or when a fixed-price
listing ends with no sale(s).

This notification will appear in the GetItem call response. See ItemUnsold for additional information about this
notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemUnsold;

class YourEventListener
{
    public function handle(ItemUnsold $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ItemWon
This buyer-facing notification is sent if the buyer is the winner of an auction item.

This notification will appear in the GetItem call response. See ItemWon for additional information about this
notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ItemWon;

class YourEventListener
{
    public function handle(ItemWon $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## M2MMessageStatusChange
This notification is sent to a subscribed buyer or seller if the status of a member-to-member message has changed.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\M2MMessageStatusChange;

class YourEventListener
{
    public function handle(M2MMessageStatusChange $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## MyMessageseBayMessage
This notification is sent to a subscribed buyer or seller when eBay sends a message to that user's InBox.

If subscribed to by a buyer or seller, and when applicable, this notification will appear in the GetMyMessages call
response. For this notification to be returned in GetMyMessages, the DetailLevel value in the GetMyMessages request must
be set to ReturnMessages.

MyMessageseBayMessageHeader and MyMessageseBayMessage cannot be subscribed to at the same time or specified in the same
call.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\MyMessageseBayMessage;

class YourEventListener
{
    public function handle(MyMessageseBayMessage $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## MyMessageseBayMessageHeader
This notification is sent to a subscribed buyer or seller when eBay sends a message to that user's InBox.

If subscribed to by a buyer or seller, and when applicable, this notification will appear in the GetMyMessages call
response. For this notification to be returned in GetMyMessages, the DetailLevel value in the GetMyMessages request must
be set to ReturnHeaders.

MyMessageseBayMessageHeader and MyMessageseBayMessage cannot be subscribed to at the same time or specified in the same
call.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\MyMessageseBayMessageHeader;

class YourEventListener
{
    public function handle(MyMessageseBayMessageHeader $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## MyMessagesHighPriorityMessage
This notification is sent to a subscribed buyer or seller when that user receives a high-priority message in InBox.

If subscribed to by a buyer or seller, and when applicable, this notification will appear in the GetMyMessages call
response. For this notification to be returned in GetMyMessages, the DetailLevel value in the GetMyMessages request must
be set to ReturnMessages.

MyMessagesHighPriorityMessage, MyMessagesM2MMessage, and MyMessagesHighPriorityMessageHeader cannot be subscribed to at
the same time or specified in the same call.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\MyMessagesHighPriorityMessage;

class YourEventListener
{
    public function handle(MyMessagesHighPriorityMessage $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## MyMessagesHighPriorityMessageHeader
This notification is sent to a subscribed buyer or seller when that user receives a high-priority message in InBox.

If subscribed to by a buyer or seller, and when applicable, this notification will appear in the GetMyMessages call
response. For this notification to be returned in GetMyMessages, the DetailLevel value in the GetMyMessages request must
be set to ReturnHeaders.

MyMessagesHighPriorityMessage, MyMessagesM2MMessage, and MyMessagesHighPriorityMessageHeader cannot be subscribed to at
the same time or specified in the same call.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\MyMessagesHighPriorityMessageHeader;

class YourEventListener
{
    public function handle(MyMessagesHighPriorityMessageHeader $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## MyMessagesM2MMessage
This notification is sent to a subscribed buyer or seller when another eBay user sends a message to that user's InBox.

If subscribed to by a buyer or seller, and when applicable, this notification will appear in the GetMyMessages call
response. For this notification to be returned in GetMyMessages, the DetailLevel value in the GetMyMessages request must
be set to ReturnMessages.

MyMessagesM2MMessageHeader and MyMessagesM2MMessage cannot be subscribed to at the same time or specified in the same
call.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\MyMessagesM2MMessage;

class YourEventListener
{
    public function handle(MyMessagesM2MMessage $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## MyMessagesM2MMessageHeader
This notification is sent to a subscribed buyer or seller when another eBay user sends a message to that user's InBox.

If subscribed to by a buyer or seller, and when applicable, this notification will appear in the GetMyMessages call
response. For this notification to be returned in GetMyMessages, the DetailLevel value in the GetMyMessages request must
be set to ReturnHeaders.

MyMessagesM2MMessageHeader and MyMessagesM2MMessage cannot be subscribed to at the same time or specified in the same
call.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\MyMessagesM2MMessageHeader;

class YourEventListener
{
    public function handle(MyMessagesM2MMessageHeader $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## OrderInquiryReminderForEscalation
This notification is sent to a subscribed seller alerting the seller that the buyer will soon be eligible to escalate an
Item Not Received inquiry into an eBay Money Back Guarantee case.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\OrderInquiryReminderForEscalation;

class YourEventListener
{
    public function handle(OrderInquiryReminderForEscalation $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## OutBid
This buyer-facing notification is sent when another buyer has outbid (placed a higher bid) the subscribed buyer on an
auction listing, and the subscribed buyer is no longer the current high bidder. This notification is only applicable for
auction listings.

This notification will appear in the GetItem call response. See OutBid for additional information about this
notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\OutBid;

class YourEventListener
{
    public function handle(OutBid $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## PaymentReminder
This notification is sent to a subscribed buyer if payment is still due for an order.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\PaymentReminder;

class YourEventListener
{
    public function handle(PaymentReminder $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ReturnClosed
This notification is applicable to both buyers and sellers and is sent when a return request is closed.

This notification will appear in the getReturnDetail call response. See ReturnClosed for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ReturnClosed;

class YourEventListener
{
    public function handle(ReturnClosed $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ReturnCreated
This notification is applicable to both buyers and sellers and is sent when a return request involving those users is
created.

This notification will appear in the getReturnDetail call response. See ReturnCreated for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ReturnCreated;

class YourEventListener
{
    public function handle(ReturnCreated $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ReturnDelivered
This notification is applicable to both buyers and sellers and is sent when a return item is received by the seller.

This notification will appear in the getReturnDetail call response. See ReturnDelivered for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ReturnDelivered;

class YourEventListener
{
    public function handle(ReturnDelivered $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ReturnEscalated
This notification is applicable to both buyers and sellers and is sent when a return request is escalated into a eBay
Money Back Guarantee case.

This notification will appear in the getReturnDetail call response. See ReturnEscalated for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ReturnEscalated;

class YourEventListener
{
    public function handle(ReturnEscalated $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ReturnRefundOverdue
This notification is applicable to both buyers and sellers and is sent when a refund to the buyer is overdue on a
return.

This notification will appear in the getReturnDetail call response. See ReturnRefundOverdue for additional information
about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ReturnRefundOverdue;

class YourEventListener
{
    public function handle(ReturnRefundOverdue $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ReturnSellerInfoOverdue
This notification is applicable to both buyers and sellers and is sent when information from the seller (e.g. a Return
Merchandise Authorization number) is overdue.

This notification will appear in the getReturnDetail call response. See ReturnSellerInfoOverdue for additional
information about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ReturnSellerInfoOverdue;

class YourEventListener
{
    public function handle(ReturnSellerInfoOverdue $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ReturnShipped
This notification is applicable to both buyers and sellers and is sent when the buyer has shipped a return item back to
the seller.

This notification will appear in the getReturnDetail call response. See ReturnShipped for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ReturnShipped;

class YourEventListener
{
    public function handle(ReturnShipped $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ReturnWaitingForSellerInfo
This seller-facing notification is sent when a return request is waiting for information from the seller, like a Return
Merchandise Authorization (RMA) number or a correct return address.

IThis notification will appear in the getReturnDetail call response. See ReturnWaitingForSellerInfo for additional
information about this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ReturnWaitingForSellerInfo;

class YourEventListener
{
    public function handle(ReturnWaitingForSellerInfo $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## SecondChanceOffer
This buyer-facing notification is sent when the buyer is offered a Second Chance Offer from the seller, after that buyer
failed to win the original auction of the item.

This notification will appear in the GetItem call response. See SecondChanceOffer for additional information about this
notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\SecondChanceOffer;

class YourEventListener
{
    public function handle(SecondChanceOffer $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## ShoppingCartItemEndingSoon
This notification is sent to a subscribed buyer when an item in the buyer's shopping cart is about to end. This event
has a TimeLeft property that defines the 'ending soon' threshold value.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\ShoppingCartItemEndingSoon;

class YourEventListener
{
    public function handle(ShoppingCartItemEndingSoon $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## TokenRevocation
This notification is applicable to both buyers and sellers and is sent if that user's authentication token is revoked.

This notification will appear in the GetTokenStatus call response. See TokenRevocation for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\TokenRevocation;

class YourEventListener
{
    public function handle(TokenRevocation $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```

## WatchedItemEndingSoon
This buyer-facing notification is sent when a listing that the buyer is watching is ending soon. This event has a
TimeLeft property that defines the 'ending soon' threshold value.

This notification will appear in the GetItem call response. See WatchedItemEndingSoon for additional information about
this notification.

```php
namespace App\Listeners;

use Rat\eBaySDK\Notifications\WatchedItemEndingSoon;

class YourEventListener
{
    public function handle(WatchedItemEndingSoon $event): void
    {
		(array) $event->headers;  // Request Headers
		(array) $event->payload;  // Parsed XML Body
    }
}
```
