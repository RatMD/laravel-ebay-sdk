---
outline: deep
---
# Message API <DocsBadge path="commerce/message/overview.html" />

The eBay Message API allows users to send messages, retrieve conversations, and modify the status of 
conversations.

## Conversation

### BulkUpdateConversation <DocsBadge path="commerce/message/resources/conversation/methods/bulkUpdateConversation" />

<ResourcePath method="POST">/bulk_update_conversation</ResourcePath>

This method can be used to update the conversationStatus of up to 10 conversations.

The conversationId, existing conversationType, and updated conversationStatus for each conversation 
to modify are required in the conversations array.

> [!CAUTION]
> Though it cannot be updated, the conversationType field is required for each conversation being 
> updated.

If the updates were successful, the conversationId of each conversation will be returned with an 
associated updateStatus value of SUCCESSFUL.

```php
use Rat\eBaySDK\API\MessageAPI\Conversation\BulkUpdateConversation;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkUpdateConversation(
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### GetConversation <DocsBadge path="commerce/message/resources/conversation/methods/getConversation" />

<ResourcePath method="GET">/conversation/{conversationId}</ResourcePath>

This method can be used to retrieve messages within a specific conversation.

The conversation_id of the conversation for which to retrieve messages is required as path 
parameters, and the and conversation_type of the conversation is required as a query parameter.

```php
use Rat\eBaySDK\API\MessageAPI\Conversation\GetConversation;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetConversation(
    conversationId: (string) $conversationId,
    conversationType: (string) $conversationType,
    limit: (int) $limit = 25,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### GetConversations <DocsBadge path="commerce/message/resources/conversation/methods/getConversations" />

<ResourcePath method="GET">/conversation</ResourcePath>

This method can be used to retrieve one or more conversations associated with a user.

The conversation_type query parameter is required when using this method to specify if the retrieved 
conversations are from eBay or from members.

The result set can also optionally be filtered by conversation status, reference, username, and/or 
time range. The limit and offset path parameters can be used to paginate the result set and control 
how many conversations are returned in the response.

```php
use Rat\eBaySDK\API\MessageAPI\Conversation\GetConversations;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetConversations(
    conversationType: (string) $conversationType,
    referenceId: (string) $referenceId = null,
    referenceType: (string) $referenceType = null,
    startTime: (string) $startTime = null,
    endTime: (string) $endTime = null,
    otherPartyUsername: (string) $otherPartyUsername = null,
    limit: (int) $limit = 25,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### SendMessage <DocsBadge path="commerce/message/resources/conversation/methods/sendMessage" />

<ResourcePath method="POST">/send_message</ResourcePath>

This method can be used to start a conversation with another user or send a message in an existing 
conversation with another user based on the information provided in the request.

To send a message, one of the conversationId or otherPartyUsername request fields are required. The 
conversationId must be used when sending a message in an existing conversation and specifies the 
conversation for which to send the message. For a new conversation, the otherPartyUsername field 
must be used to send the message to a specific user. In addition, the messageText field is required 
as it contains the body text of the message.

Optionally, media (such as images or documents) can be attached to the message using the 
messageMedia container. The reference container can also be used to associate a message with a 
listing.

```php
use Rat\eBaySDK\API\MessageAPI\Conversation\SendMessage;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SendMessage(
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### UpdateConversation <DocsBadge path="commerce/message/resources/conversation/methods/updateConversation" />

<ResourcePath method="POST">/update_conversation</ResourcePath>

This method can be used to update the conversationStatus or the read status of a specified 
conversation.

> [!NOTE]
> Only one of these statuses can be updated at a time using this method. If both fields are 
> included, only the read status of the specified conversation will be updated and the 
> conversationStatus field will be ignored.

The conversationId of the conversation to modify, as well as the existing conversationType of the 
specified conversation are required as part of the request payload.

> [!CAUTION]
> Though it cannot be updated, the existing conversationType of the specified conversation to be 
> updated is required in the request payload. If this value is not provided, an error will occur.

To update a conversation's status (for example, updating an ACTIVE conversation to ARCHIVE), include 
the conversationStatus field in the request with the updated value. To update a conversation's read 
status (for example, updating an UNREAD conversation to READ), include the read boolean in the 
request with the updated value.

```php
use Rat\eBaySDK\API\MessageAPI\Conversation\UpdateConversation;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateConversation(
    payload: (array) $payload,
);
$response = $client->execute($request);
```