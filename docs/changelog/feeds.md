# Atom/JSON/RSS Release Notes Feeds

All eBay API release notes published on this site are also available as machine-readable feeds. 
These feeds typically reflect updates earlier and more promptly than the documentation pages, 
making them the most reliable way to track new or updated release notes as soon as they are published.

The following feed formats are supported:
- Atom
- RSS
- JSON Feed

Each format provides the same content and differs only in structure, allowing you to choose the one 
best supported by your feed reader or tooling.

## Aggregated Feeds

To subscribe to **all eBay API release notes**, use one of the aggregated feed URLs below:

```http
https://ebay-api-monitor.rat.md/feed/feed.atom.xml
https://ebay-api-monitor.rat.md/feed/feed.rss.xml
https://ebay-api-monitor.rat.md/feed/feed.json
```

These feeds contain release notes for all available eBay APIs, sorted by release date in descending 
order.

## Filtering by API category

If you are only interested in specific areas of the eBay API platform, you can filter the feed by 
API category using the category query parameter. The supported categories:

- `buy`
- `developer`
- `sell`

Multiple categories can be combined using a comma-separated list:

```http
https://ebay-api-monitor.rat.md/feed/feed.[:format]
        ?category=buy,developer,sell
```

This will return a feed containing release notes from the selected categories only.

## Filtering by specific APIs

You may also subscribe to release notes for specific APIs. Since API identifiers are only unique 
within their category, each API must be referenced using the following format:

```
<category>/<api-slug>
```

**Example**

```http
https://ebay-api-monitor.rat.md/feed/feed.[:format]
        ?api=developer/analytics-api,sell/analytics-api
```

## Subscribing to the feeds

All release note feeds are automatically linked from this documentation site and can be discovered 
by compatible browsers and feed readers.

**Direct Links:**
- [Atom Feed](https://ebay-api-monitor.rat.md/feed/feed.atom.xml)
- [JSON Feed](https://ebay-api-monitor.rat.md/feed/feed.json)
- [RSS Feed](https://ebay-api-monitor.rat.md/feed/feed.rss.xml)

## Notes

- All feeds are updated automatically when new release notes are published.
- Feed content is sorted by release date, newest first.
- Query parameters can be combined to create highly specific feeds tailored to your needs.
