<template>
</template>

<script setup lang="ts">
import { FunctionalComponent, onMounted, onUnmounted } from 'vue';
import { addSubNavItem, removeSubNavItem } from '@/composables/useSubNav';

const props = withDefaults(defineProps<{
    entryKey: string;
    label: string;
    href: string;
    active?: boolean;
    as?: 'button' | 'link';
    method?: 'get' | 'post' | 'put' | 'delete';
    icon?: FunctionalComponent | null;
}>(), {
    icon: null,
});

onMounted(() => {
    addSubNavItem({
        entryKey: props.entryKey,
        label: props.label,
        href: props.href,
        active: !!props.active,
        as: props.as,
        method: props.method,
        icon: props.icon
    });
});

onUnmounted(() => {
    removeSubNavItem(props.entryKey);
});
</script>