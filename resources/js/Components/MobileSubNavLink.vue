<template>
    <Link :href="href" :class="[
        'cursor-pointer shadow-sm dark:shadow-none dark:inset-ring dark:inset-ring-slate-700/30 inline-flex items-center justify-center px-2 py-4 hover:bg-blue-100 hover:text-blue-500 dark:bg-gray-800 dark:hover:bg-slate-700/50 dark:hover:text-sky-400 group',
        colSpan
    ]" :as="as" :method="method">
    <slot />
    </Link>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = withDefaults(
    defineProps<{
        href: string;
        colSpan?: string | number;
        method?: 'get' | 'post' | 'put' | 'delete';
        as?: 'button' | 'link';
    }>(),
    {
        colSpan: 1,
    }
);

const colSpan = computed(() => {
    return `col-span-${props.colSpan || '1'}`;
});

</script>
