---
outline: deep
---
# Identity API <DocsBadge path="sell/identity/overview.html" />

> [!CAUTION]
> This API has not yet been implemented yet.

> [!NOTE]
> Not all the account related fields are returned for an authenticated user. The fields returned in 
> the response are controlled by the scopes and are available only to select developers approved by 
> business units.

The Identity API returns data for an authenticated user (user access token) based on the OAuth 
scopes provided. Non-confidential information, such as eBay userID is returned using the default 
scope. Confidential data for an individual, such as address, email, phone, etc. are returned based 
on the OAuth scope you use in the call. For business users, all the public business information is 
returned using the default OAuth scope.

The Identity API can be used to let users log into your app or site using eBay, which frees you 
from needing to store and protect user's PII (Personal Identifiable Information) data.

> [!NOTE]
> All scopes require explicit consent from the user.