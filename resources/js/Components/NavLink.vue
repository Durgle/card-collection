<template>
    <Link :href="href"
        class="inline-flex items-center px-1 pt-1 focus:outline-none transition duration-150 ease-in-out focus:border-blue-900 dark:focus:border-white"
        :class="classes">
    <slot />
    </Link>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    href: string;
    active?: boolean;
}>();

const classes = computed(() =>
    props.active
        ? 'text-blue-500 dark:text-cyan-300 hover:text-blue-900 dark:hover:text-slate-100 border-blue-500 dark:border-cyan-300 hover:border-blue-900 dark:hover:border-slate-100 sm:border-b-2'
        : 'text-blue-500 dark:text-cyan-300 hover:text-blue-900 dark:hover:text-white focus:sm:border-b-2',

);
</script>