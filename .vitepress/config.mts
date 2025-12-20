import { defineConfig } from "vitepress";

// https://vitepress.dev/reference/site-config
export default defineConfig({
    base: '/laravel-ebay-sdk/',
    srcDir: "docs",
    title: "Laravel eBay SDK",
    description: "The RAT Laravel eBay SDK",
    sitemap: {
        hostname: 'https://ratmd.github.io/laravel-ebay-sdk',
        lastmodDateOnly: true
    },
    lastUpdated: true,
    themeConfig: {
        // https://vitepress.dev/reference/default-theme-config
        nav: [
            { text: "Guide", link: "/guide/start", activeMatch: '/guide' },
            { text: "Reference", link: "/reference/overview", activeMatch: '/reference' },
        ],

        sidebar: {
            '/guide': [
                {
                    text: "Guide",
                    items: [
                        { text: "Getting Started", link: "/guide/start" },
                        { text: "Authorize (OAuth)", link: "/guide/authorize" },
                        { text: "Webhook (Notifications)", link: "/guide/webhook" },
                    ]
                },
            ],
            '/reference': [
                {
                    text: "Reference",
                    items: [
                        { text: "Overview", link: "/reference/overview" },
                    ]
                },
                {
                    text: "Selling APIs",
                    items: [
                        { text: "AccountAPI", link: "/reference/selling-apis/account-api" },
                        { text: "AccountAPI v2", link: "/reference/selling-apis/account-api-v2" },
                        { text: "AnalyticsAPI", link: "/reference/selling-apis/analytics-api" },
                        { text: "CatalogAPI", link: "/reference/selling-apis/catalog-api" },
                        { text: "ComplianceAPI", link: "/reference/selling-apis/compliance-api" },
                        { text: "FeedAPI", link: "/reference/selling-apis/feed-api" },
                        { text: "FeedbackAPI", link: "/reference/selling-apis/feedback-api" },
                        { text: "FinancesAPI", link: "/reference/selling-apis/finances-api" },
                        { text: "FulfillmentAPI", link: "/reference/selling-apis/fulfillment-api" },
                        { text: "IdentityAPI", link: "/reference/selling-apis/identity-api" },
                        { text: "InventoryAPI", link: "/reference/selling-apis/inventory-api" },
                        { text: "LeadsAPI", link: "/reference/selling-apis/leads-api" },
                        { text: "MarketingAPI", link: "/reference/selling-apis/marketing-api" },
                        { text: "MediaAPI", link: "/reference/selling-apis/media-api" },
                        { text: "MessageAPI", link: "/reference/selling-apis/message-api" },
                        { text: "MetadataAPI", link: "/reference/selling-apis/metadata-api" },
                        { text: "NegotiationAPI", link: "/reference/selling-apis/negotiation-api" },
                        { text: "NotificationAPI", link: "/reference/selling-apis/notification-api" },
                        { text: "RecommendationAPI", link: "/reference/selling-apis/recommendation-api" },
                        { text: "StoresAPI", link: "/reference/selling-apis/stores-api" },
                        { text: "TaxonomyAPI", link: "/reference/selling-apis/taxonomy-api" },
                        { text: "TranslationAPI", link: "/reference/selling-apis/translation-api" },
                        { 
                            text: "TraditionalAPI (XML)", 
                            items: [
                                { text: "Account", link: "/reference/api/traditional/account" },
                                { text: "Communication", link: "/reference/api/traditional/communication" },
                                { text: "Listing", link: "/reference/api/traditional/listing" },
                                { text: "Metadata", link: "/reference/api/traditional/metadata" },
                                { text: "Order", link: "/reference/api/traditional/order" },
                                { text: "Special", link: "/reference/api/traditional/special" },
                                { text: "Stores", link: "/reference/api/traditional/stores" },
                            ],
                            collapsed: true
                        },
                    ],
                },
                {
                    text: "Events",
                    items: [
                        { text: "Package Events", link: "/reference/events/package" },
                        { text: "eBay Notifications", link: "/reference/events/ebay" },
                    ],
                },
            ]
        },

        socialLinks: [
            { icon: "github", link: "https://github.com/RatMD/laravel-ebay-sdk" },
        ],

        search: {
            provider: 'local'
        },

        footer: {
            message: 'This software is not an official eBay product and is not associated with, sponsored by, or endorsed by eBay Inc.',
            copyright: 'Copyright © rat.md, Published under MIT License.'
        },
    },
});
