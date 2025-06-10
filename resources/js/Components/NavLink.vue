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
        ? 'text-blue-500 dark:text-sky-400 hover:text-blue-900 dark:hover:text-cyan-300 border-blue-500 dark:border-cyan-300 hover:border-blue-900 dark:hover:border-cyan-300 sm:border-b-2'
        : 'text-blue-500 dark:text-sky-400 hover:text-blue-900 dark:hover:text-cyan-300 focus:sm:border-b-2',

);
</script>