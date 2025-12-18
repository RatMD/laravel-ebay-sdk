import { defineConfig } from "vitepress";

// https://vitepress.dev/reference/site-config
export default defineConfig({
    srcDir: "docs",

    title: "Laravel eBay SDK",
    description: "The RAT Laravel eBay SDK",
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
                    text: "APIs",
                    items: [
                        { text: "AccountAPI", link: "/reference/api/account-api" },
                        { text: "AccountAPI v2", link: "/reference/api/account-api-v2" },
                        { text: "FeedAPI", link: "/reference/api/feed-api" },
                        { text: "FinancesAPI", link: "/reference/api/finances-api" },
                        { text: "InventoryAPI", link: "/reference/api/inventory-api" },
                        { text: "MediaAPI", link: "/reference/api/media-api" },
                        { text: "StoreAPI", link: "/reference/api/store-api" },
                        { text: "TraditionalAPI (XML)", link: "/reference/api/traditional-api" },
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
        }
    },
});
