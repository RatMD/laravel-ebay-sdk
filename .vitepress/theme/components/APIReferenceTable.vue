<template>
    <div class="reference-table">
        <table>
            <thead>
                <tr>
                    <th>API-Reference</th>
                    <th>Description</th>
                    <th>eBay</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="row in rows" :key="row.name">
                    <td><a :href="withBase(row.internal)">{{ row.name }}</a></td>
                    <td>{{ row.description }}</td>
                    <td align="center">
                        <a :href="row.external" target="_blank" v-if="row.external">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-external-link-icon lucide-external-link"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
  
<script lang="ts">
export interface ReferenceLink {
    name: string;
    description: string;
    internal: string;
    external: string;
}
export interface ComponentProps {
    references: ReferenceLink[];
}
</script>

<script lang="ts" setup>
import { withBase } from 'vitepress';
import { computed } from 'vue';

// Define Component
const props = defineProps<ComponentProps>();

// States
const rows = computed<ReferenceLink[]>(() => {
    const list = props.references;
    list.sort((a, b) => {
        return a.name.localeCompare(b.name)
    });
    return list;
});
</script>

<style lang="css">
</style>