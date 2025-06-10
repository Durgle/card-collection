<template>
    <Link :href="href"
        class="rounded-md text-sm text-blue-600 underline hover:text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 focus:ring-offset-blue-200 dark:focus:ring-sky-400 dark:text-sky-400 dark:hover:text-cyan-300 dark:focus:ring-offset-sky-800">
    <slot />
    </Link>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps<{
    href: string
}>();
</script>