import { defineConfig } from "vitepress";
import API from "../docs/changelog/release_notes/[api].paths";

// https://vitepress.dev/reference/site-config
export default defineConfig({
    base: '/',
    srcDir: "docs",
    title: "Laravel eBay SDK",
    description: "The RAT Laravel eBay SDK",
    sitemap: {
        hostname: 'https://ebay-sdk.rat.md/',
        lastmodDateOnly: true
    },
    lastUpdated: true,
    transformPageData(pageData) {
        if (pageData?.params?.title) {
            pageData.title = `${pageData.params.title}`;
        }
    },
    head: [
        [
            'script',
            {
                defer: 'defer',
                src: 'https://analytics.pytes.net/script.js',
                'data-website-id': '4919e1a6-ff21-4f34-b878-014aa91fad01'
            }
        ],
        [
            'link',
            {
                rel: 'alternate',
                type: 'application/atom+xml',
                title: 'eBay API Release Notes (Atom)',
                href: 'https://ebay-api-monitor.rat.md/feed/feed.atom.xml',
            }
        ],
        [
            'link',
            {
                rel: 'alternate',
                type: 'application/feed+json',
                title: 'eBay API Release Notes (JSON)',
                href: 'https://ebay-api-monitor.rat.md/feed/feed.json',
            }
        ],
        [
            'link',
            {
                rel: 'alternate',
                type: 'application/rss+xml',
                title: 'eBay API Release Notes (RSS)',
                href: 'https://ebay-api-monitor.rat.md/feed/feed.rss.xml',
            }
        ],
    ],
    themeConfig: {
        nav: [
            { text: "Guide", link: "/guide/start", activeMatch: '/guide' },
            { text: "Reference", link: "/reference/overview", activeMatch: '/reference' },
            { text: "Changelog", link: "/changelog/overview", activeMatch: '/changelog' },
        ],

        sidebar: {
            '/guide': [
                {
                    text: "Guide",
                    items: [
                        { text: "Getting Started", link: "/guide/start" },
                        { text: "Configuration", link: "/guide/configuration" },
                        { text: "Authorization", link: "/guide/authorize" },
                        { text: "Notifications", link: "/guide/webhook" },
                    ]
                },
                {
                    text: "Commands",
                    items: [
                        { text: "ebay:authorize", link: "/guide/commands/authorize" },
                    ]
                },
                {
                    text: "Services",
                    items: [
                        { text: "NotificationDispatcherService", link: "/guide/services/notification-dispatcher-service" },
                        { text: "SyncListingsService", link: "/guide/services/sync-listings-service" },
                    ]
                },
                {
                    text: "Known Issues",
                    items: [
                        { text: "API Errors", link: "/guide/issues/errors" },
                        { text: "Debugging", link: "/guide/issues/debug" },
                    ]
                },
            ],
            '/reference': [
                {
                    text: "Reference",
                    items: [
                        { text: "Overview", link: "/reference/overview" },
                        {
                            text: "Events",
                            items: [
                                { text: "Core Events", link: "/reference/events/core" },
                                { text: "eBay Notifications", link: "/reference/events/ebay" },
                            ],
                        },
                        {
                            text: "Enums",
                            items: [
                                { text: "AppointmentStatus", link: "/reference/enums/appointment-status" },
                                { text: "AppointmentType", link: "/reference/enums/appointment-type" },
                                { text: "AppointmentWindow", link: "/reference/enums/appointment-window" },
                                { text: "AuthenticityVerificationReason", link: "/reference/enums/authenticity-verification-reason" },
                                { text: "AuthenticityVerificationStatus", link: "/reference/enums/authenticity-verification-status" },
                                { text: "AvailabilityType", link: "/reference/enums/availability-type" },
                                { text: "CancelRequestState", link: "/reference/enums/cancel-request-state" },
                                { text: "CancelState", link: "/reference/enums/cancel-state" },
                                { text: "CategoryType", link: "/reference/enums/category-type" },
                                { text: "ChargeType", link: "/reference/enums/charge-type" },
                                { text: "CollectionMethod", link: "/reference/enums/collection-method" },
                                { text: "Condition", link: "/reference/enums/condition" },
                                { text: "CountryCode", link: "/reference/enums/country-code" },
                                { text: "CurrencyCode", link: "/reference/enums/currency-code" },
                                { text: "CustomerServiceMetricType", link: "/reference/enums/customer-service-metric-type" },
                                { text: "CustomPolicyType", link: "/reference/enums/custom-policy-type" },
                                { text: "CycleType", link: "/reference/enums/cycle-type" },
                                { text: "DisputeState", link: "/reference/enums/dispute-state" },
                                { text: "DocumentType", link: "/reference/enums/document-type" },
                                { text: "EbayFulfillmentProgram", link: "/reference/enums/ebay-fulfillment-program" },
                                { text: "EbayInternationalShipping", link: "/reference/enums/ebay-international-shipping" },
                                { text: "EbayVaultFulfillmentType", link: "/reference/enums/ebay-vault-fulfillment-type" },
                                { text: "EvaluationType", link: "/reference/enums/evaluation-type" },
                                { text: "FeedbackType", link: "/reference/enums/feedback-type" },
                                { text: "FormatType", link: "/reference/enums/format-type" },
                                { text: "FulfillmentInstructionsType", link: "/reference/enums/fulfillment-instructions-type" },
                                { text: "HTTPMethod", link: "/reference/enums/http-method" },
                                { text: "Language", link: "/reference/enums/language" },
                                { text: "LengthUnitOfMeasure", link: "/reference/enums/length-unit-of-measure" },
                                { text: "LineItemFulfillmentStatus", link: "/reference/enums/line-item-fulfillment-status" },
                                { text: "ListingDuration", link: "/reference/enums/listing-duration" },
                                { text: "ListingFormat", link: "/reference/enums/listing-format" },
                                { text: "Marketplace", link: "/reference/enums/marketplace" },
                                { text: "MarketplaceId", link: "/reference/enums/marketplace-id" },
                                { text: "MinimumAdvertisedPriceHandling", link: "/reference/enums/minimum-advertised-price-handling" },
                                { text: "OrderFulfillmentStatus", link: "/reference/enums/order-fulfillment-status" },
                                { text: "OrderPaymentStatus", link: "/reference/enums/order-payment-status" },
                                { text: "PackageType", link: "/reference/enums/package-type" },
                                { text: "PaymentMethodType", link: "/reference/enums/payment-method-type" },
                                { text: "PaymentStatus", link: "/reference/enums/payment-status" },
                                { text: "PaymentsProgramType", link: "/reference/enums/payments-program-type" },
                                { text: "Program", link: "/reference/enums/program" },
                                { text: "ProgramType", link: "/reference/enums/program-type" },
                                { text: "RefundStatus", link: "/reference/enums/refund-status" },
                                { text: "ReportType", link: "/reference/enums/report-type" },
                                { text: "ResponsiblePersonType", link: "/reference/enums/responsible-person-type" },
                                { text: "ShippingServiceType", link: "/reference/enums/shipping-service-type" },
                                { text: "SigningKeyCipher", link: "/reference/enums/signing-key-cipher" },
                                { text: "SiteCode", link: "/reference/enums/site-code" },
                                { text: "SoldFormat", link: "/reference/enums/sold-format" },
                                { text: "SoldOn", link: "/reference/enums/sold-on" },
                                { text: "TaxIdentifierType", link: "/reference/enums/tax-identifier-type" },
                                { text: "TaxType", link: "/reference/enums/tax-type" },
                                { text: "TimeDurationUnit", link: "/reference/enums/time-duration-unit" },
                                { text: "TrafficReportDimension", link: "/reference/enums/traffic-report-dimension" },
                                { text: "TrafficReportMetric", link: "/reference/enums/traffic-report-metric" },
                                { text: "TranslationContext", link: "/reference/enums/translation-context" },
                                { text: "TranslationLanguage", link: "/reference/enums/translation-language" },
                                { text: "WeightUnitOfMeasure", link: "/reference/enums/weight-unit-of-measure" },
                            ],
                            collapsed: true
                        },
                    ]
                },
                {
                    text: "APIs",
                    items: [
                        {
                            text: "Buying APIs",
                            items: [
                                { text: "BrowseAPI", link: "/reference/buying-apis/browse-api" },
                                { text: "CatalogAPI", link: "/reference/buying-apis/catalog-api" },
                                { text: "DealAPI", link: "/reference/buying-apis/deal-api" },
                                { text: "FeedAPI", link: "/reference/buying-apis/feed-api" },
                                { text: "FeedBetaAPI", link: "/reference/buying-apis/feed-beta-api" },
                                { text: "IdentityAPI", link: "/reference/buying-apis/identity-api" },
                                { text: "MarketingAPI", link: "/reference/buying-apis/marketing-api" },
                                { text: "MarketingBetaAPI", link: "/reference/buying-apis/marketing-beta-api" },
                                { text: "OfferAPI", link: "/reference/buying-apis/offer-api" },
                                { text: "OrderAPI", link: "/reference/buying-apis/order-api" },
                                { text: "TaxonomyAPI", link: "/reference/buying-apis/taxonomy-api" },
                                { text: "TranslationAPI", link: "/reference/buying-apis/translation-api" },
                            ],
                            collapsed: true
                        },
                        {
                            text: "Developer APIs",
                            items: [
                                { text: "AnalyticsAPI", link: "/reference/developer-apis/analytics-api" },
                                { text: "ClientRegistrationAPI", link: "/reference/developer-apis/client-registration-api" },
                                { text: "KeyManagementAPI", link: "/reference/developer-apis/key-management-api" },
                            ],
                            collapsed: true
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
                            ],
                            collapsed: true
                        },
                        {
                            text: "Traditional APIs",
                            items: [
                                { text: "Account", link: "/reference/selling-apis/traditional/account" },
                                { text: "Communication", link: "/reference/selling-apis/traditional/communication" },
                                { text: "Listing", link: "/reference/selling-apis/traditional/listing" },
                                { text: "Metadata", link: "/reference/selling-apis/traditional/metadata" },
                                { text: "Order", link: "/reference/selling-apis/traditional/order" },
                                { text: "Special", link: "/reference/selling-apis/traditional/special" },
                                { text: "Stores", link: "/reference/selling-apis/traditional/stores" },
                            ],
                            collapsed: true
                        },
                    ],
                },
            ],
            '/changelog': [
                {
                    text: "Changelog",
                    items: [
                        { text: "Overview", link: "/changelog/overview" },
                        { text: "Release Feeds", link: "/changelog/feeds" },
                    ]
                },
                {
                    text: "Release Notes",
                    items: await API.items()
                }
            ]
        },

        socialLinks: [
            { icon: "github", link: "https://github.com/RatMD/laravel-ebay-sdk" },
            { icon: "rss", link: "https://ebay-api-monitor.rat.md/feed/feed.atom.xml" },
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
