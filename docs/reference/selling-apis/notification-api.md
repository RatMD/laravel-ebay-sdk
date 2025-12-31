---
outline: deep
---
# Notification API <Badge type="warning" style="margin-left:0.75rem;">v1.6.5</Badge> <DocsBadge path="sell/notification/overview.html" />

The eBay Notification API enables management of the entire end-to-end eBay notification experience 
by allowing users to: 

- Browse for supported notification topics and retrieve topic details
- Create, configure, and manage notification destination endpoints
- Configure, manage, and test notification subscriptions
- Process eBay notifications and verify the integrity of the message payload

## Config

### GetConfig <DocsBadge path="sell/notification/resources/config/methods/getConfig" />

<ResourcePath method="GET">/config</ResourcePath>

This method allows applications to retrieve a previously created configuration.

```php
use Rat\eBaySDK\API\NotificationAPI\Config\GetConfig;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetConfig();
$response = $client->execute($request);
```

### UpdateConfig <DocsBadge path="sell/notification/resources/config/methods/updateConfig" />

<ResourcePath method="PUT">/config</ResourcePath>

This method allows applications to create a new configuration or update an existing configuration. 
This app-level configuration allows developers to set up alerts.

```php
use Rat\eBaySDK\API\NotificationAPI\Config\UpdateConfig;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateConfig(
    payload: (array) $payload
);
$response = $client->execute($request);
```

## Destination

### CreateDestination <DocsBadge path="sell/notification/resources/destination/methods/createDestination" />

<ResourcePath method="POST">/destination</ResourcePath>

This method allows applications to create a destination. A destination is an endpoint that receives 
HTTP push notifications.

A single destination for all topics is valid, as is individual destinations for each topic.

To update a destination, use the updateDestination call.

The destination created will need to be referenced while creating or updating a subscription to a 
topic.

> [!NOTE]
> The destination should be created and ready to respond with the expected challengeResponse for 
> the endpoint to be registered successfully. Refer to the Notification API overview for more 
> information.

```php
use Rat\eBaySDK\API\NotificationAPI\Destination\CreateDestination;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateDestination(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### DeleteDestination <DocsBadge path="sell/notification/resources/destination/methods/deleteDestination" />

<ResourcePath method="DELETE">/destination/{destinationId}</ResourcePath>

This method provides applications a way to delete a destination.

The same destination ID can be used by many destinations.

Trying to delete an active destination results in an error. You can disable a subscription, and 
when the destination is no longer in use, you can delete it.

```php
use Rat\eBaySDK\API\NotificationAPI\Destination\DeleteDestination;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteDestination(
    destinationId: (string) $destinationId
);
$response = $client->execute($request);
```

### GetDestination <DocsBadge path="sell/notification/resources/destination/methods/getDestination" />

<ResourcePath method="GET">/destination/{destinationId}</ResourcePath>

This method allows applications to fetch the details for a destination. The details include the 
destination name, status, and configuration, including the endpoint and verification token.

```php
use Rat\eBaySDK\API\NotificationAPI\Destination\GetDestination;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetDestination(
    destinationId: (string) $destinationId
);
$response = $client->execute($request);
```

### GetDestinations <DocsBadge path="sell/notification/resources/destination/methods/getDestinations" />

<ResourcePath method="GET">/destination/{destinationId}</ResourcePath>

This method allows applications to retrieve a paginated collection of destination resources and 
related details. The details include the destination names, statuses, and configurations, including 
the endpoints and verification tokens.

```php
use Rat\eBaySDK\API\NotificationAPI\Destination\GetDestinations;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetDestinations(
    continuationToken: (string) $continuationToken = null,
    limit: (int) $limit = 10
);
$response = $client->execute($request);
```

### UpdateDestination <DocsBadge path="sell/notification/resources/destination/methods/updateDestination" />

<ResourcePath method="PUT">/destination/{destinationId}</ResourcePath>

This method allows applications to update a destination.

> [!NOTE]
> The destination should be created and ready to respond with the expected challengeResponse for the 
> endpoint to be registered successfully. Refer to the Notification API overview for more information.

```php
use Rat\eBaySDK\API\NotificationAPI\Destination\UpdateDestination;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateDestination(
    destinationId: (string) $destinationId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

## PublicKey

### GetPublicKey <DocsBadge path="sell/notification/resources/public_key/methods/getPublicKey" />

<ResourcePath method="GET">/public_key/{publicKeyId}</ResourcePath>

This method allows users to retrieve a public key using a specified key ID. The public key that is 
returned in the response payload is used to process and validate eBay notifications.

The public key ID, which is a required request parameter for this method, is retrieved from the 
Base64-encoded X-EBAY-SIGNATURE header that is included in the eBay notification.

> [!CAUTION]
> The retrieved public key value should be cached for a temporary — but reasonable — amount of time 
> (e.g., one-hour is recommended.) This key should not be requested for every notification since 
> doing so can result in exceeding API call limits if a large number of notification requests is 
> received.

```php
use Rat\eBaySDK\API\NotificationAPI\PublicKey\GetPublicKey;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPublicKey(
    publicKeyId: (string) $publicKeyId
);
$response = $client->execute($request);
```

## Subscription

### CreateSubscription <DocsBadge path="sell/notification/resources/subscription/methods/createSubscription" />

<ResourcePath method="POST">/subscription</ResourcePath>

This method allows applications to create a subscription for a topic and supported schema version. 
Subscriptions allow applications to express interest in notifications and keep receiving the 
information relevant to their business.

Each application and topic-schema pairing to a subscription should have a 1:1 cardinality.

You can create the subscription in disabled mode, test it (see the test method), and when everything 
is ready, you can enable the subscription (see the enableSubscription method).

> [!NOTE]
> If an application is not authorized to subscribe to a topic, for example, if your authorization 
> does not include the list of scopes required for the topic, an error code of 195011 is returned.

```php
use Rat\eBaySDK\API\NotificationAPI\Subscription\CreateSubscription;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateSubscription(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### CreateSubscriptionFilter <DocsBadge path="sell/notification/resources/subscription/methods/createSubscriptionFilter" />

<ResourcePath method="POST">/subscription/{subscriptionId}/filter</ResourcePath>

This method allows applications to create a filter for a subscription. Filters allow applications to 
only be sent notifications that match a provided criteria. Notifications that do not match this 
criteria will not be sent to the destination.

The filterSchema value must be a valid [JSON Schema Core document](https://json-schema.org/)
(version 2020-12 or later). The filterSchema provided must describe the subscription's notification 
payload such that it supplies valid criteria to filter the subscription's notifications. The user 
does not need to provide $schema and $id definitions.

When a filter is first created, it is not immediately active on the subscription. If the request has 
a valid JSON body, the successful call returns the HTTP status code 201 Created. Newly created 
filters are in PENDING status until they are reviewed. If a filter is valid, it will move from 
PENDING status to ENABLED status. You can find the status of a filter using the [getSubscriptionFilter](https://developer.ebay.com/api-docs/commerce/notification/resources/subscription/methods/getSubscriptionFilter) 
method. See [Creating a subscription filter](https://developer.ebay.com/api-docs/commerce/notification/overview.html#create-filter) 
for a topic for additional information.

> [!NOTE]
> Only one filter can be in ENABLED (which means active) status on a subscription at a time. If an 
> ENABLED filter is overwritten by a new call to CREATE a filter for the subscription, it stays in 
> ENABLED status until the new PENDING filter becomes the ENABLED filter, and the existing filter 
> then becomes DISABLED.

```php
use Rat\eBaySDK\API\NotificationAPI\Subscription\CreateSubscriptionFilter;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateSubscriptionFilter(
    subscriptionId: (string) $subscriptionId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### DeleteSubscription <DocsBadge path="sell/notification/resources/subscription/methods/deleteSubscription" />

<ResourcePath method="DELETE">/subscription/{subscriptionId}</ResourcePath>

This method allows applications to delete a subscription. Subscriptions can be deleted regardless 
of status.

```php
use Rat\eBaySDK\API\NotificationAPI\Subscription\DeleteSubscription;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteSubscription(
    subscriptionId: (string) $subscriptionId,
);
$response = $client->execute($request);
```

### DeleteSubscriptionFilter <DocsBadge path="sell/notification/resources/subscription/methods/deleteSubscriptionFilter" />

<ResourcePath method="DELETE">/subscription/{subscriptionId}/filter/{filterId}</ResourcePath>

This method allows applications to disable the active filter on a subscription, so that a new 
subscription filter may be added.

> [!NOTE]
> Subscription filters in PENDING status can not be disabled. However, a new filter can be created 
> instead with the createSubscriptionFilter method and this new filter will override the PENDING 
> filter.

```php
use Rat\eBaySDK\API\NotificationAPI\Subscription\DeleteSubscriptionFilter;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteSubscriptionFilter(
    subscriptionId: (string) $subscriptionId,
    filterId: (string) $filterId,
);
$response = $client->execute($request);
```

### DisableSubscription <DocsBadge path="sell/notification/resources/subscription/methods/disableSubscription" />

<ResourcePath method="POST">/subscription/{subscriptionId}/disable</ResourcePath>

This method disables a subscription, which prevents the subscription from providing notifications. 
To restart a subscription, call enableSubscription.

```php
use Rat\eBaySDK\API\NotificationAPI\Subscription\DisableSubscription;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DisableSubscription(
    subscriptionId: (string) $subscriptionId,
);
$response = $client->execute($request);
```

### EnableSubscription <DocsBadge path="sell/notification/resources/subscription/methods/enableSubscription" />

<ResourcePath method="POST">/subscription/{subscriptionId}/enable</ResourcePath>

This method allows applications to enable a disabled subscription. To pause (or disable) an enabled 
subscription, call disableSubscription.

```php
use Rat\eBaySDK\API\NotificationAPI\Subscription\EnableSubscription;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new EnableSubscription(
    subscriptionId: (string) $subscriptionId,
);
$response = $client->execute($request);
```

### GetSubscription <DocsBadge path="sell/notification/resources/subscription/methods/getSubscription" />

<ResourcePath method="GET">/subscription/{subscriptionId}</ResourcePath>

This method allows applications to retrieve subscription details for the specified subscription.

Specify the subscription to retrieve using the subscription_id. Use the getSubscriptions method to 
browse all subscriptions if you do not know the subscription_id.

Subscriptions allow applications to express interest in notifications and keep receiving the 
information relevant to their business.

```php
use Rat\eBaySDK\API\NotificationAPI\Subscription\GetSubscription;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSubscription(
    subscriptionId: (string) $subscriptionId,
);
$response = $client->execute($request);
```

### GetSubscriptionFilter <DocsBadge path="sell/notification/resources/subscription/methods/getSubscriptionFilter" />

<ResourcePath method="GET">/subscription/{subscriptionId}/filter/{filterId}</ResourcePath>

This method allows applications to retrieve the filter details for the specified subscription filter.

Specify the subscription filter to retrieve by using the subscription_id and the filter_id 
associated with the subscription filter. The filter_id can be found in the response body for the 
getSubscription method, if there is a filter applied on the subscription.

Filters allow applications to only be sent notifications that match a provided criteria. 
Notifications that do not match this criteria will not be sent to the destination.

```php
use Rat\eBaySDK\API\NotificationAPI\Subscription\GetSubscriptionFilter;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSubscriptionFilter(
    subscriptionId: (string) $subscriptionId,
    filterId: (string) $filterId,
);
$response = $client->execute($request);
```

### GetSubscriptions <DocsBadge path="sell/notification/resources/subscription/methods/getSubscriptions" />

<ResourcePath method="GET">/subscription</ResourcePath>

This method allows applications to retrieve a list of all subscriptions. The list returned is a 
paginated collection of subscription resources.

Subscriptions allow applications to express interest in notifications and keep receiving the 
information relevant to their business.

```php
use Rat\eBaySDK\API\NotificationAPI\Subscription\GetSubscriptions;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSubscriptions(
    continuationToken: (string) $continuationToken = null,
    limit: (int) $limit = 10
);
$response = $client->execute($request);
```

### TestSubscription <DocsBadge path="sell/notification/resources/subscription/methods/testSubscription" />

<ResourcePath method="POST">/subscription/{subscriptionId}/test</ResourcePath>

This method triggers a mocked test payload that includes a notification ID, publish date, and so on. 
Use this method to test your subscription end-to-end.

You can create the subscription in disabled mode, test it using this method, and when everything is
ready, you can enable the subscription (see the enableSubscription method).

> [!NOTE]
> Use the notificationId to tell the difference between a test payload and a real payload.

```php
use Rat\eBaySDK\API\NotificationAPI\Subscription\TestSubscription;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new TestSubscription(
    subscriptionId: (string) $subscriptionId,
);
$response = $client->execute($request);
```

### UpdateSubscription <DocsBadge path="sell/notification/resources/subscription/methods/updateSubscription" />

<ResourcePath method="PUT">/subscription/{subscriptionId}</ResourcePath>

This method allows applications to update a subscription. Subscriptions allow applications to 
express interest in notifications and keep receiving the information relevant to their business.

> [!NOTE]
> This call returns an error if an application is not authorized to subscribe to a topic.

You can pause and restart a subscription. See the disableSubscription and enableSubscription methods.

```php
use Rat\eBaySDK\API\NotificationAPI\Subscription\UpdateSubscription;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateSubscription(
    subscriptionId: (string) $subscriptionId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

## Topic

### GetTopic <DocsBadge path="sell/notification/resources/topic/methods/getTopic" />

<ResourcePath method="GET">/topic/{topicId}</ResourcePath>

This method allows applications to retrieve details for the specified topic. This information 
includes supported schema versions, formats, and other metadata for the topic.

Applications can subscribe to any of the topics for a supported schema version and format, limited 
by the authorization scopes required to subscribe to the topic.

A topic specifies the type of information to be received and the data types associated with an 
event. An event occurs in the eBay system, such as when a user requests deletion or revokes access 
for an application. An event is an instance of an event type (topic).

Specify the topic to retrieve using the topic_id URI parameter.

```php
use Rat\eBaySDK\API\NotificationAPI\Topic\GetTopic;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetTopic(
    topicId: (string) $topicId
);
$response = $client->execute($request);
```

### GetTopic <DocsBadge path="sell/notification/resources/topic/methods/getTopics" />

<ResourcePath method="GET">/topic</ResourcePath>

This method returns a paginated collection of all supported topics, along with the details for the 
topics. This information includes supported schema versions, formats, and other metadata for the 
topics.

Applications can subscribe to any of the topics for a supported schema version and format, limited 
by the authorization scopes required to subscribe to the topic.

A topic specifies the type of information to be received and the data types associated with an 
event. An event occurs in the eBay system, such as when a user requests deletion or revokes access 
for an application. An event is an instance of an event type (topic).

```php
use Rat\eBaySDK\API\NotificationAPI\Subscription\GetTopic;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetTopic(
    continuationToken: (string) $continuationToken = null,
    limit: (int) $limit = 10
);
$response = $client->execute($request);
```