<template>
    <div class="md:h-full">
        <Link :href="href"
            class="w-full md:h-full md:items-center flex px-4 py-3 justify-center md:justify-normal hover:bg-blue-600 dark:hover:bg-slate-600 md:p-2 md:rounded md:hover:bg-blue-600 dark:md:hover:bg-slate-700 cursor-pointer focus-ring-blue"
            :class="{ 'text-yellow-300 dark:text-cyan-300': active }" :as="as" :method="method" :aria-label="label"
            :title="label">
        <component :is="icon" class="shrink-0" aria-hidden="true" />
        <span class="max-w-full truncate px-1">{{ label }}</span>
        </Link>
    </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { FunctionalComponent } from 'vue';

defineProps<{
    label: string;
    href: string;
    active?: boolean;
    as?: 'button' | 'link';
    method?: 'get' | 'post' | 'put' | 'delete';
    icon?: FunctionalComponent | null;
}>();

</script>
