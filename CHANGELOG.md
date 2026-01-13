rat.md/laravel-ebay-sdk / Changelog
===================================

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
