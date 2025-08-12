<template>
    <Link :href="href"
        class="px-6 py-3 bg-blue-500 dark:bg-sky-400 text-white dark:text-slate-900 rounded hover:bg-blue-600 dark:hover:bg-cyan-300 
            cursor-pointer focus:outline-none focus:inset-ring-2 focus:inset-ring-blue-900 dark:focus:inset-ring-slate-100">
    <slot />
    </Link>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps<{
    href: string;
    active?: boolean;
}>();
</script>