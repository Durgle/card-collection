<template>
    <div :class="attrs.class">
        <Link :href="href"
            class="h-full md:h-[60px] w-full text-xs md:text-base flex flex-col md:flex-row items-center gap-0.5 md:gap-4 md:p-3.5 md:rounded justify-center hover:bg-slate-700"
            :class="{ 'text-cyan-300': active, 'md:justify-center': !ui.navExtended, 'md:justify-normal': ui.navExtended }"
            :as="as" :method="method" :aria-label="label" :title="label">
        <component :is="icon" class="shrink-0" aria-hidden="true" />
        <span class="max-w-full truncate px-1" :class="{ 'md:hidden': !ui.navExtended }">{{ label }}</span>
        </Link>
    </div>
</template>

<script setup lang="ts">
import { useUiStore } from '@/stores/ui';
import { Link } from '@inertiajs/vue3';
import { FunctionalComponent, useAttrs } from 'vue';

defineProps<{
    href: string;
    label: string;
    method?: 'get' | 'post' | 'put' | 'delete';
    as?: 'button' | 'link';
    active?: boolean;
    icon: FunctionalComponent
}>();

const attrs = useAttrs();
const ui = useUiStore();

</script>
