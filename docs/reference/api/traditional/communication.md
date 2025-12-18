---
outline: deep
---
# Traditional / Buyer/Seller Communication <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/CommunicationIndex.html" />

This Call Reference describes the elements and attributes for each Buyer/Seller Communication call 
below.

## AddMemberMessageAAQToPartner <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/AddMemberMessageAAQToPartner.html" />

Enables a buyer and seller in an order relationship to send messages to each other's My Messages 
Inboxes.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\AddMemberMessageAAQToPartner;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new AddMemberMessageAAQToPartner(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## AddMemberMessageRTQ <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/AddMemberMessageRTQ.html" />

Enables a seller to reply to a question about an active item listing.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\AddMemberMessageRTQ;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new AddMemberMessageRTQ(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## AddMemberMessagesAAQToBidder <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/AddMemberMessagesAAQToBidder.html" />

Enables a seller to send up to 10 messages to bidders, or to users who have made offers via Best 
Offer, regarding an active item listing.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\AddMemberMessagesAAQToBidder;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new AddMemberMessagesAAQToBidder(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## DeleteMyMessages <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/DeleteMyMessages.html" />

Removes selected messages for a given user.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\DeleteMyMessages;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteMyMessages(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetFeedback <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetFeedback.html" />

Retrieves the accumulated feedback left for a specified user or the summary feedback data for a 
specific order line item or item listing. Also for Half.com.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\GetFeedback;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetFeedback(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetItemsAwaitingFeedback <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetItemsAwaitingFeedback.html" />

Returns orders in which the user was involved and for which feedback is still needed from either the 
buyer or seller.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\GetItemsAwaitingFeedback;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItemsAwaitingFeedback(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetMemberMessages <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetMemberMessages.html" />

Retrieves a list of the messages buyers have posted about your active item listings.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\GetMemberMessages;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetMemberMessages(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetMessagePreferences <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetMessagePreferences.html" />

Returns a seller's Ask Seller a Question (ASQ) subjects, each in its own Subject node.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\GetMessagePreferences;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetMessagePreferences(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetMyMessages <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetMyMessages.html" />

Retrieves information about the messages sent to a user.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\GetMyMessages;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetMyMessages(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetUserContactDetails <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetUserContactDetails.html" />

Returns contact information for a specified user, given that a bidding relationship (as either a 
buyer or seller) exists between the caller and the user.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\GetUserContactDetails;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetUserContactDetails(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## LeaveFeedback <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/LeaveFeedback.html" />

Enables a buyer and seller to leave feedback for their order partner at the conclusion of a 
successful order.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\LeaveFeedback;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new LeaveFeedback(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## RespondToFeedback <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/RespondToFeedback.html" />

Used to reply to feedback that has been left for a user, or to post a follow-up comment to a 
feedback comment the user has left for someone else.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\RespondToFeedback;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new RespondToFeedback(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## ReviseMyMessages <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/ReviseMyMessages.html" />

Sets the read state for messages, sets the flagged state of messages, and moves messages into and 
out of folders.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\ReviseMyMessages;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new ReviseMyMessages(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## ReviseMyMessagesFolders <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/ReviseMyMessagesFolders.html" />

Renames, removes, or restores the specified My Messages folders for a given user.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\ReviseMyMessagesFolders;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new ReviseMyMessagesFolders(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## SetMessagePreferences <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/SetMessagePreferences.html" />

Enables a seller to add custom Ask Seller a Question (ASQ) subjects to their Ask a Question page, 
or to reset any custom subjects to their default values.

```php
use Rat\eBaySDK\API\TraditionalAPI\Communication\SetMessagePreferences;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SetMessagePreferences(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```
