---
outline: deep
---
# Feedback API <DocsBadge path="commerce/feedback/overview.html" />

The Feedback API includes resources for retrieving items awaiting feedback, retrieving and 
submitting feedback entries, providing feedback rating summaries, and responding to feedback. 
These methods allow users to manage feedback across buying and selling activities.

## AwaitingFeedback

### GetItemsAwaitingFeedback <DocsBadge path="commerce/feedback/resources/awaiting_feedback/methods/getItemsAwaitingFeedback" />

<ResourcePath method="GET">/awaiting_feedback</ResourcePath>

This method retrieves line items awaiting feedback from the user's order partner. You can refine the 
results using optional filter query parameters, such as item ID, user name, or user role in the
transaction. Sorting and pagination features help organize and navigate returned items efficiently.

For sellers, only sold items that have not yet received feedback are included. For buyers, only 
purchased items for which feedback is still pending are included. If the user is both a buyer and a 
seller, this API returns items awaiting feedback for transactions where the user acted as either. 
Applying filters can limit results to either buyer-only or seller-only transactions.

The response provides an overview of feedback yet to be left for completed transactions (as 
filtered), with counts for both the buyer and seller roles. It includes an array of line items, each 
containing the listing ID, title, price (with currency and value). For each line item, the response 
offers feedback templates specifying which ratings are available.

> [!NOTE]
> Detailed seller ratings are for sellers only, and are created from buyer feedback.

```php
use Rat\eBaySDK\API\FeedbackAPI\AwaitingFeedback\GetItemsAwaitingFeedback;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItemsAwaitingFeedback(
    filter: (string) $filter = null,
    sort: (string) $sort = null,
    limit: (string) $limit = 25,
    offset: (string) $offset = 0,
);
$response = $client->execute($request);
```

## Feedback

### GetFeedback <DocsBadge path="commerce/feedback/resources/feedback/methods/getFeedback" />

<ResourcePath method="GET">/feedback</ResourcePath>

This method enables users to retrieve feedback for any specified user ID and feedback type (sent or 
received). You can refine the results using optional query parameters such as its feedback ID, 
listing ID, or order line item ID, or applying one or more filters.

Applying filters can narrow results using criteria such as comment type, photos, or topics 
identified through AI-based analysis. When filtering for feedback with photos (filterImage:true), 
only entries with images (entries that include image URLs) are returned. Additionally, feedback can 
be refined for the number of days to look back, the role of the user providing the feedback, and 
whether to include automated feedback entries left by eBay.

Sorting and pagination features help organize and navigate returned items efficiently.

Returned data includes feedback details (such as comment text and type), feedback ratings (covering 
criteria like overall experience, and for sellers item description, shipping time, and 
communication), role and attributes of the feedback giver, line item and transaction summaries, 
images, and any available topics. See filter for additional information. Privacy is safeguarded by 
restricting the amount of detail visible to users, depending on their context. When accessing 
another user's feedback without logging in, buyer names are masked and seller names are shown. 
Logged-in users viewing their own feedback see all names, while those viewing other users' feedback 
will encounter some masking.

```php
use Rat\eBaySDK\API\FeedbackAPI\Feedback\GetFeedback;
use Rat\eBaySDK\Enums\FeedbackType;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetFeedback(
    feedbackType: FeedbackType::FEEDBACK_RECEIVED,
    userId: (string) $userId,
    feedbackId: (string) $feedbackId = null,
    listingId: (string) $listingId = null,
    transactionId: (string) $transactionId = null,
    orderLineItemId: (string) $orderLineItemId = null,
    filter: (string) $filter = null,
    sort: (string) $sort = null,
    limit: (string) $limit = 25,
    offset: (string) $offset = 0,
);
$response = $client->execute($request);
```

### LeaveFeedback <DocsBadge path="commerce/feedback/resources/feedback/methods/leaveFeedback" />

<ResourcePath method="POST">/feedback</ResourcePath>

This method creates and submits feedback to the user's order partner for a line item in the order. 
For each order, the order partner is the other participant in the transaction, either the buyer or 
seller, depending on the eBay user associated with the user token. This method allows users to 
provide detailed information about the transaction, including the feedback rating, comments, and 
seller delivery. You can also add images to your feedback.

> [!NOTE]
> A seller can only provide a comment for a buyer, but a buyer can provide a comment plus provides 
> ratings on a number of metrics for a seller.

> [!NOTE]
> The feedback must adhere to community guidelines and be relevant to the transaction.

When leaving feedback, keep the following in mind:

- Your feedback score is not affected when you leave feedback
- Feedback can only be revised once after it is submitted

For additional information on leaving feedback, see the following:

- [Leaving feedback for sellers](https://www.ebay.com/help/buying/leaving-feedback-sellers/leaving-feedback-sellers?id=4007)
- [Leaving feedback for buyers](https://www.ebay.com/help/selling/leaving-feedback-buyers/leaving-feedback-buyers?id=4078)

```php
use Rat\eBaySDK\API\FeedbackAPI\Feedback\LeaveFeedback;
use Rat\eBaySDK\Enums\FeedbackType;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new LeaveFeedback(
    payload: (string) $payload,
);
$response = $client->execute($request);
```

## FeedbackRatingSummary

### GetFeedbackRatingSummary <DocsBadge path="commerce/feedback/resources/feedback_rating_summary/methods/getFeedbackRatingSummary" />

<ResourcePath method="GET">/feedback_rating_summary</ResourcePath>

This method provides a detailed overview of feedback ratings associated with a user in the eBay 
marketplace. Specify a user ID and apply filters to retrieve summarized feedback data categorized by 
rating types and user roles. These returned metrics are aggregated, which offers insight into user 
experiences and performance.

> [!TIP]
> You can use this method to help sellers and buyers understand their marketplace reputation and 
> identify areas for improvement.

Returned data provides a summary of feedback ratings for a user by rating type (such as overall 
experience, communication, or delivery timeliness) for both buyer and seller roles. Each type of 
rating includes aggregated metrics like averages, counts, unique feedback givers, and the percentage 
of positive ratings (excluding neutrals). The response also details the distribution of specific 
rating values, their frequency, and time period (with period units like days or months) over which 
these metrics were calculated.

```php
use Rat\eBaySDK\API\FeedbackAPI\FeedbackRatingSummary\GetFeedbackRatingSummary;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetFeedbackRatingSummary(
    userId: (string) $userId,
    filter: (string) $filter,
);
$response = $client->execute($request);
```

## RespondToFeedback

### RespondToFeedback <DocsBadge path="commerce/feedback/resources/respond_to_feedback/methods/respondToFeedback" />

<ResourcePath method="POST">/respond_to_feedback</ResourcePath>

This method allows users to respond to feedback provided by the order partner for a specific line 
item in an order. For each order, the order partner is the other participant in the transaction, 
either the buyer or seller, depending on the eBay user associated with the user token. This method 
allows the user to provide additional context or address the order partner's feedback.

> [!NOTE] 
> The feedback response must adhere to community guidelines and be relevant to the transaction.

You can only use this method if feedback has been provided by the order partner and you have not yet 
responded to it.

When responding to feedback, your feedback score is not affected when you respond to feedback.

For additional information on leaving feedback, see the following:

- [Leaving feedback for sellers](https://www.ebay.com/help/buying/leaving-feedback-sellers/leaving-feedback-sellers?id=4007)
- [Leaving feedback for buyers](https://www.ebay.com/help/selling/leaving-feedback-buyers/leaving-feedback-buyers?id=4078)

```php
use Rat\eBaySDK\API\FeedbackAPI\RespondToFeedback\RespondToFeedback;
use Rat\eBaySDK\Enums\FeedbackType;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new RespondToFeedback(
    payload: (string) $payload,
);
$response = $client->execute($request);
```