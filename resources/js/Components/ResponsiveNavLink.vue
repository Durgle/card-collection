<template>
    <Link :href="href"
        class="block w-full py-2 items-center px-1 pt-1 focus:outline-none transition duration-150 ease-in-out border-b-1"
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
        ? 'bg-blue-100 dark:bg-slate-700 border-blue-900 dark:border-slate-600 font-bold dark:text-slate-100 hover:text-blue-900 dark:hover:text-slate-100'
        : 'bg-white dark:bg-slate-800 border-blue-900 text-blue-500 dark:border-slate-700 dark:text-cyan-300 hover:text-blue-900 dark:hover:text-slate-100',

);
</script>