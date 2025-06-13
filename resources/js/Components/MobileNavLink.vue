<template>
    <component :is="isLink ? Link : 'button'" v-bind="componentProps" :class="[
        'cursor-pointer h-full flex-1 flex flex-col items-center justify-center hover:bg-blue-100 hover:text-blue-500 dark:hover:bg-slate-700/50 dark:hover:text-sky-400',
        active ? 'bg-blue-100/50 text-blue-500 dark:bg-slate-700/80 dark:text-cyan-300' : 'text-blue-900 dark:text-slate-100'
    ]">
        <slot />
    </component>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = withDefaults(
    defineProps<{
        isLink?: boolean;
        href?: string;
        method?: 'get' | 'post' | 'put' | 'delete';
        as?: 'button' | 'link';
        active?: boolean;
    }>(),
    {
        isLink: true,
        active: false,
    }
);

const componentProps = computed(() => {
    if (props.isLink == true) {
        return {
            href: props.href ?? '#',
            method: props.method,
            as: props.as,
        };
    }

    return {
        type: 'button',
    };
});

</script>
