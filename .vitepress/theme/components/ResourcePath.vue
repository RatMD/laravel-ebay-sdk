<template>
    <div class="resource">
        <div :class="['resource-method', `method-${$props.method.toLowerCase()}`]">
            {{ $props.method.toUpperCase() }}
        </div>
        <div class="resource-path">
            <slot></slot>
        </div>
    </div>
</template>
  
<script lang="ts">
export interface ComponentProps {
    method: 'GET' | 'PATCH' | 'POST' | 'PUT' | 'DELETE';
}
</script>

<script lang="ts" setup>
defineProps<ComponentProps>();
</script>

<style lang="css">
.resource {
    margin: 1.25rem 0;
    display: flex;
    flex-direction: row;
    font-size: 0.8rem;
}
.resource-method {
    flex: 0 0 auto;
    padding: .25rem 1.15rem;
    font-weight: bold;
    border-radius: .25rem 0 0 .25rem;
}
.resource-method.method-get {
    color: white;
    background-color: var(--vp-c-green-3);
}
.resource-method.method-patch {
    color: white;
    background-color: var(--vp-c-yellow-3);
}
.resource-method.method-post {
    color: white;
    background-color: var(--vp-c-indigo-3);
}
.resource-method.method-put {
    color: white;
    background-color: var(--vp-c-purple-3);
}
.resource-method.method-delete {
    color: white;
    background-color: var(--vp-c-danger-3);
}
.resource-path {
    flex: 1 1 auto;
    padding: .25rem 1.15rem;
    background-color: var(--vp-c-default-soft);
    border-radius: 0 .25rem .25rem 0;
}
</style>