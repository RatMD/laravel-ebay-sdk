# Reference

> [!CAUTION]
> This is an experimental eBay SDK under active development. Production use is discouraged.
> Breaking changes may occur at any time, including minor and patch releases.

## Events

- [Package Events](/reference/events/package.html): SDK exposed Laravel Events
- [eBay Notifications](/reference/events/package.html): eBay Notifications pushed as Laravel Events

## Selling APIs

<APIReferenceTable :references="[
    {
        name: 'AccountAPI (v1)',
        description: 'Manage your business policies and custom policies, manage your shipping rate tables and sales tax tables, opt in and out of selling programs, and check your seller privileges using the Account API v1.',
        internal: '/reference/selling-apis/account-api',
        external: 'https://developer.ebay.com/api-docs/sell/account/static/overview.html'
    },
    {
        name: 'AccountAPI (v2)',
        description: 'Provides advanced tools for managing and updating custom shipping rate tables.',
        internal: '/reference/selling-apis/account-api-v2',
        external: 'https://developer.ebay.com/api-docs/sell/account/v2/static/overview.html'
    },
    {
        name: 'AnalyticsAPI',
        description: 'Provides information about an individual seller’s business performance through different report and data gathering resources including customer service metrics, traffic reports, and seller profiles. See Analyzing seller performance in the Selling Integration Guide.',
        internal: '/reference/selling-apis/analytics-api',
        external: 'https://developer.ebay.com/api-docs/sell/analytics/static/overview.html'
    },
    {
        name: 'CatalogAPI',
        description: 'Search the eBay catalog for products on which to base a seller\'s item listing, retrieve a product record by its eBay product identifier (ePID).',
        internal: '/reference/selling-apis/catalog-api',
        external: 'https://developer.ebay.com/api-docs/sell/catalog/overview.html'
    },
    {
        name: 'ComplianceAPI',
        description: 'Provides tools for validating listings to help sellers keep their listings in compliance with eBay’s policies.',
        internal: '/reference/selling-apis/compliance-api',
        external: 'https://developer.ebay.com/api-docs/sell/compliance/static/overview.html'
    },
    {
        name: 'FeedAPI',
        description: 'Manage your eBay business by downloading or uploading inventory, order, and customer service metric files, and creating schedules. This API is designed to make a large merchant\'s workflow more efficient by leveraging eBay infrastructure to use parallel execution and to automatically retry on errors.',
        internal: '/reference/selling-apis/feed-api',
        external: 'https://developer.ebay.com/api-docs/sell/feed/static/overview.html'
    },
    {
        name: 'FeedbackAPI',
        description: 'Allows users to manage feedback across buying and selling activities.',
        internal: '/reference/selling-apis/feedback-api',
        external: 'https://developer.ebay.com/api-docs/commerce/feedback/resources/methods'
    },
    {
        name: 'FinancesAPI',
        description: 'Retrieve detailed information on seller payouts for eBay orders, and also retrieve details on all monetary transactions on eBay\'s system between the seller, buyer, and eBay. These transactions include sales, buyer refunds, seller credits, payment disputes, shipping label purchases, and non-sales related charges to the seller\'s account.',
        internal: '/reference/selling-apis/finances-api',
        external: 'https://developer.ebay.com/api-docs/sell/finances/static/overview.html'
    },
    {
        name: 'FulfillmentAPI',
        description: 'Retrieve and fulfill orders, issue refunds, and manage third-party payment disputes initiated by buyers. See Handling orders in the Selling Integration Guide.',
        internal: '/reference/selling-apis/fulfillment-api',
        external: 'https://developer.ebay.com/api-docs/sell/fulfillment/static/overview.html'
    },
    {
        name: 'IdentityAPI', 
        description: 'Retrieve account profile information for an authenticated user.',
        internal: '/reference/selling-apis/identity-api',
        external: 'https://developer.ebay.com/api-docs/sell/identity/overview.html'
    },
    {
        name: 'InventoryAPI', 
        description: 'Create and manage inventory item records, and then convert these inventory items into product offers on eBay marketplaces.',
        internal: '/reference/selling-apis/inventory-api',
        external: 'https://developer.ebay.com/api-docs/sell/inventory/static/overview.html'
    },
    {
        name: 'LeadsAPI', 
        description: 'Use this API to retrieve and respond to purchase offers, and retrieve sales leads from classified ads.',
        internal: '/reference/selling-apis/leads-api',
        external: 'https://developer.ebay.com/api-docs/sell/leads/overview.html'
    },
    {
        name: 'MarketingAPI', 
        description: 'Provides the ability to offer appealing discounts and eye-catching ad placements that display in key spots throughout the eBay buying flows; manages the life cycle of item promotions and promoted listings, and generates reports.',
        internal: '/reference/selling-apis/marketing-api',
        external: 'https://developer.ebay.com/api-docs/sell/marketing/static/overview.html'
    },
    {
        name: 'MediaAPI', 
        description: 'Create videos and documents which can be attached to listings.',
        internal: '/reference/selling-apis/media-api',
        external: 'https://developer.ebay.com/api-docs/commerce/media/overview.html'
    },
    {
        name: 'MessageAPI', 
        description: 'Send messages, retreive conversations, and modify the status of conversations.',
        internal: '/reference/selling-apis/message-api',
        external: 'https://developer.ebay.com/api-docs/commerce/message/overview.html'
    },
    {
        name: 'MetadataAPI', 
        description: 'CRetrieves eBay category policies and information on sales tax jurisdictions.',
        internal: '/reference/selling-apis/metadata-api',
        external: 'https://developer.ebay.com/api-docs/sell/metadata/static/overview.html'
    },
    {
        name: 'NotificationAPI', 
        description: 'Explore, subscribe to, and process eBay notifications.',
        internal: '/reference/selling-apis/notification-api',
        external: 'https://developer.ebay.com/api-docs/sell/notification/overview.html'
    },
    {
        name: 'NegotiationAPI', 
        description: 'Gives seller the ability to reach out and make a discount offer to buyers who have shown an interest in their item listings.',
        internal: '/reference/selling-apis/negotiation-api',
        external: 'https://developer.ebay.com/api-docs/sell/negotiation/static/overview.html'
    },
    {
        name: 'RecommendationAPI', 
        description: 'Returns information that sellers can use to configure Promoted Listings ad campaigns.',
        internal: '/reference/selling-apis/recommendation-api',
        external: 'https://developer.ebay.com/api-docs/sell/recommendation/static/overview.html'
    },
    {
        name: 'StoresAPI', 
        description: 'Manage a store\'s category hierarchy.',
        internal: '/reference/selling-apis/stores-api',
        external: 'https://developer.ebay.com/api-docs/sell/stores/overview.html'
    },
    {
        name: 'TaxonomyAPI', 
        description: 'Discover appropriate categories to filter listings retrieved by the Buy APIs, or determine the best category in which to offer an item for sale and determine what categories to include in campaigns or promotions with the Sell APIs.',
        internal: '/reference/selling-apis/taxonomy-api',
        external: 'https://developer.ebay.com/api-docs/sell/taxonomy/overview.html'
    },
    {
        name: 'TranslationAPI', 
        description: 'Translate common commerce content, such as the title and description of an item to help present marketplace listings to buyers in different countries or regions. The Translation API takes foreign language search queries from the buyer and translates them for the target marketplace, as well.',
        internal: '/reference/selling-apis/translation-api',
        external: 'https://developer.ebay.com/api-docs/sell/translation/static/overview.html'
    },
]" />
