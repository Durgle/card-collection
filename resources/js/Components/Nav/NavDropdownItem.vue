<template>
    <div :class="attrs.class">
        <Link :href="href"
            class="w-full flex flex-row px-2 md:p-2 md:pl-8 py-2 hover:bg-slate-700 items-center justify-center md:justify-normal bg-slate-900 md:gap-2 md:rounded focus-ring-cyan"
            :class="{ 'text-cyan-300': active }" :as="as" :method="method" :aria-label="label" :title="label">
        <component v-if="icon" :is="icon" class="shrink-0 size-4 md:auto" aria-hidden="true" />
        <span class="max-w-full truncate">{{ label }}</span>
        </Link>
    </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { FunctionalComponent, useAttrs } from 'vue';

defineProps<{
    href: string;
    label: string;
    method?: 'get' | 'post' | 'put' | 'delete';
    as?: 'button' | 'link';
    active?: boolean;
    icon?: FunctionalComponent
}>();

const attrs = useAttrs()

</script>
