---
outline: deep
---
# Compliance API <DocsBadge path="sell/compliance/static/overview.html" />

The Compliance API helps sellers keep their listings in compliance with eBay’s policies. Use this 
API to identify for a given seller all listings that have violations. A listing violation can cause 
a bad buyer experience and may also prevent sellers from updating the listing until the violation 
has been corrected. The Compliance API is used to retrieve listing violations for different 
compliance types. Once listing violations are discovered in active listings for the seller, it is 
up to the seller to make revisions to these listings to correct the listing violations. The listing 
compliance types are summarized below:

- **Aspects Adoption**: this compliance type is used to see if a seller's listings are violating 
eBay's policy for aspects (item specifics). For each category, eBay maintains list of required and 
recommended aspects. When checking ASPECTS_ADOPTION, the response will include listings for which 
either a required or recommended aspect is missing or has an invalid value.
- **HTTPS protocol**: this compliance type is used to see if any listings are violating eBay's 
policy of using HTTP links in the listing description instead of HTTPS links. This requirement 
includes links to externally-hosted listing images. If the server hosting the listing images does 
not support the HTTPS protocol, this server cannot be used to host listing images. In the API 
interface, the enumeration value for this compliance type is HTTPS.
- **Non-eBay Links**: this compliance type is used to see if any listings are violating eBay's 
policy of not allowing links in the listing description to sites outside of eBay. The seller 
including a personal email address and/or a phone number in the listing description is also a 
violation of this policy. All communication between seller and buyers should be handled through 
eBay's communication system. The only exceptions to this outside links rule are links to product 
videos, information on freight shipping services, or any legally required information. In the API 
interface, the enumeration value for this compliance type is OUTSIDE_EBAY_BUYING_AND_SELLING.
- **Product Adoption**: Product Adoption is not enforced at this time.
- **Product Adoption Conformance**: Product Adoption is not enforced at this time.
- **Return Policy**: this compliance type is used to see if any listings have return periods that 
are no longer supported. Recently, many eBay sites (including US) deprecated the 14-day return 
period, so the minimum return period is now 30 days for many eBay sites. In the API interface, the 
enumeration value for this compliance type is RETURNS_POLICY.

The Compliance API has the following two calls:

- **getListingViolationsSummary**: this call returns the number of active listings that are 
currently violating one or more compliance types. Results are grouped by each unique eBay 
marketplace and compliance type combination.
- **getListingViolations**: this call returns data on each listing violation in the seller's active 
listings. Results are grouped by listing, so if one eBay listing has multiple listing violations for 
a specific compliance type, these violations will be shown together. Only one compliance type can be 
used per call.

## ListingViolation

### GetListingViolations <DocsBadge path="sell/compliance/resources/listing_violation/methods/getListingViolations" />

<ResourcePath method="GET">/listing_violation</ResourcePath>

This call returns specific listing violations for the supported listing compliance types. Only one 
compliance type can be passed in per call, and the response will include all the listing violations 
for this compliance type, and listing violations are grouped together by eBay listing ID. 

> [!NOTE]
> A maximum of 2000 listing violations will be returned in a result set. If the seller has more than 
> 2000 listing violations, some/all of those listing violations must be corrected before additional 
> listing violations will be retrieved. The user should pay attention to the total value in the 
> response. If this value is '2000', it is possible that the seller has more than 2000 listing 
> violations, but this field maxes out at 2000.

> [!NOTE]
> In a future release of this API, the seller will be able to pass in a specific eBay listing ID as 
> a query parameter to see if this specific listing has any violations.

> [!NOTE]
> Only mocked non-compliant listing data will be returned for this call in the Sandbox environment, 
> and not specific to the seller. However, the user can still use this mock data to experiment with 
> the compliance type filters and pagination control.

```php
use Rat\eBaySDK\API\ComplianceAPI\ListingViolation\GetListingViolations;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetListingViolations(
    marketplaceId: (string) $marketplaceId,
    complianceType: (string) $complianceType,
    listingId: (string) $listingId = null,
    filter: (string) $filter = null,
    limit: (string) $limit = 100,
    offset: (string) $offset = 0,
);
$response = $client->execute($request);
```

## ListingViolationSummary

### GetListingViolationsSummary <DocsBadge path="sell/compliance/resources/listing_violation_summary/methods/getListingViolationsSummary" />

<ResourcePath method="GET">/listing_violation</ResourcePath>

This call returns listing violation counts for a seller. A user can pass in one or more compliance 
types through the compliance_type query parameter. 

> [!NOTE]
> Only a canned response, with counts for all listing compliance types, is returned in the Sandbox 
> environment. Due to this limitation, the compliance_type query parameter (if used) will not have 
> an effect on the response.

```php
use Rat\eBaySDK\API\ComplianceAPI\ListingViolationSummary\GetListingViolationsSummary;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetListingViolationsSummary(
    marketplaceId: (string) $marketplaceId,
    complianceType: (string) $complianceType,
);
$response = $client->execute($request);
```
