// https://vitepress.dev/guide/custom-theme
import './style.css';
import type { Theme } from 'vitepress';
import { h } from 'vue';
import DefaultTheme from 'vitepress/theme';
import APIReferenceTable from './components/APIReferenceTable.vue';
import DocsBadge from './components/DocsBadge.vue';
import ResourcePath from './components/ResourcePath.vue';

export default {
    extends: DefaultTheme,
    Layout: () => {
        return h(DefaultTheme.Layout, null, {
            // https://vitepress.dev/guide/extending-default-theme#layout-slots
        })
    },
    enhanceApp({ app, router, siteData }) {
        app.component('APIReferenceTable', APIReferenceTable);
        app.component('DocsBadge', DocsBadge);
        app.component('ResourcePath', ResourcePath);
    }
} satisfies Theme
