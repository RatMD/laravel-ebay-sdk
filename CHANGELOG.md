rat.md/laravel-ebay-sdk / Changelog
===================================

## Version 0.2.0 (Alpha)
- Add: New Marketplace Deletion Service / Controller and routes.
- Add: New `MarketplaceAccountDeletionReceived` event to handle Marketplace Deletions.
- Add: New `ebay:marketplace-token` / `GenerateMarketplaceDeletionTokenCommand` command to generate a verification token.
- Add: New `CombinedShippingRules\CreateCalculatedShippingRules` resource as of AccountAPI v2.2.0.
- Add: New `CombinedShippingRules\CreateFlatShippingRules` resource as of AccountAPI v2.2.0.
- Add: New `CombinedShippingRules\CreatePromotionalShippingRule` resource as of AccountAPI v2.2.0.
- Add: New `CombinedShippingRules\GetCombinedShippingRules` resource as of AccountAPI v2.2.0.
- Add: New `CombinedShippingRules\UpdateCalculatedShippingRules` resource as of AccountAPI v2.2.0.
- Add: New `CombinedShippingRules\UpdateCombinedPayments` resource as of AccountAPI v2.2.0.
- Add: New `CombinedShippingRules\UpdateFlatShippingRules` resource as of AccountAPI v2.2.0.
- Add: New `CombinedShippingRules\UpdatePromotionalShippingRule` resource as of AccountAPI v2.2.0.
- Add: New `UserPreferences\GetUserPreferences` resource as of AccountAPI v2.2.0.
- Add: New `UserPreferences\SetUserPreferences` resource as of AccountAPI v2.2.0.
- Add: New `BillingActivity\GetBillingActivities` resource as of FinancesAPI v1.18.0.
- Add: New `Marketplace\GetMinimumListingPricePolicies` resource as of MetadataAPI v1.13.0.
- Update: Remove `Dispatchable` / `InteractsWithSockets` stub remaining from notifications / events.
- Fix: Deprecated / Wrong `OAuthAuthentication` instance on `AuthorizeCommand`.

## Version 0.1.8 (Alpha)
- Fix: Wrong baseUrl used on `FulfillmentAPI\Order\*` APIs.
- Fix: Wrong PATHs used on `FulfillmentAPI\*` APIs.

## Version 0.1.7 (Alpha)
- Fix: page number never increase on `SyncListingsService` payload.

## Version 0.1.6 (Alpha)
- Add: New `timeout(int $seconds, bool $failOnTimeout)` method to control the timeout handling on the passed job.
- Add: New `onFailed(?Throwable $exception, SyncListingsContext $context)` method on `SyncListingsHandler`.
- Update: `try {} catch {}` wrapper around primary `SyncListingsHandler` callbacks.
- Fix: `onFinish` callback on `SyncListingsHandler` has never been called.

## Version 0.1.5 (Alpha)
- Fix: Ensure `int` typing on `TraditionalAPIRequest::siteId`.

## Version 0.1.4 (Alpha)
- Fix: Typo `sideId()` on `TraditionalAPIRequest` method name.
- Fix: Access to protected properties on `TraditionalAPIRequest`.

## Version 0.1.3 (Alpha)
- Fix: Set `"default"` queue name, when not set. 

## Version 0.1.2 (Alpha)
- Fix: `Environment` namespace.

## Version 0.1.1 (Alpha)
- Fix: `Environment` namespace.

## Version 0.1.0 (Alpha)
- Initial Release.
