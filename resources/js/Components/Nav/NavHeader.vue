<template>
    <div class="hidden md:flex md:h-[60px]">
        <span class="md:grow md:p-4 md:text-xl" :class="{ 'md:hidden': !ui.navExtended }">
            {{ $page.props.appName }}
        </span>
        <button @click="ui.toggleNav"
            class="md:flex md:h-full md:w-[60px] md:justify-center md:items-center md:hover:bg-slate-700 md:rounded focus-ring-cyan">
            <ChevronsLeftIcon :class="{ 'rotate-180': !ui.navExtended }" />
        </button>
    </div>

    <hr class="hidden md:block md:border-slate-600 md:mx-2" />
</template>
<script setup lang="ts">
import { useUiStore } from '@/stores/ui';
import { ChevronsLeftIcon } from 'lucide-vue-next';

const ui = useUiStore();
</script>