<template>
    <a :href="`https://developer.ebay.com/api-docs/${$props.path}`" class="VPBadge" title="View Documentation on developer.ebay.com" target="_blank">
        <span>eBay Docs</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="tabler-icon tabler-icon-arrow-up-right">
            <path d="M17 7l-10 10"></path>
            <path d="M8 7l9 0l0 9"></path>
        </svg>
    </a>
</template>

<script lang="ts">
export interface ComponentProps {
    path: string;
}
</script>

<script lang="ts" setup>
defineProps<ComponentProps>();
</script>

<style>
.VPBadge {
    margin-left: 2px;
    padding: 0 10px;
    display: inline-flex;
    gap: 0 0.25rem;
    align-items: center;
    text-decoration: none !important;
    border: 1px solid transparent;
    border-radius: 12px;
    line-height: 22px;
    font-size: 12px;
    font-weight: 500;
    white-space: nowrap;
    transform: translateY(-2px);
    border-color: var(--vp-badge-tip-border);
    color: var(--vp-badge-tip-text);
    background-color: var(--vp-badge-tip-bg);
}

.vp-doc h1>.VPBadge {
    margin-top: 8px;
    vertical-align: top;
}

.vp-doc h2>.VPBadge {
    margin-top: 6px;
    padding: 0 8px;
    vertical-align: top;
}

.vp-doc h3>.VPBadge {
    vertical-align: middle;
}

.vp-doc h4>.VPBadge,
.vp-doc h5>.VPBadge,
.vp-doc h6>.VPBadge {
    vertical-align: middle;
    line-height: 18px;
}
</style>