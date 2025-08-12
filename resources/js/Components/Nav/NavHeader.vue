<template>
    <div class="hidden md:flex md:h-(--nav-item-height)">
        <div class="md:grow md:p-2" :class="{ 'md:hidden': !ui.navExtended }">
            <ApplicationLogo />
        </div>
        <button @click="ui.toggleNav"
            class="md:flex md:w-full md:h-full md:justify-center md:items-center md:hover:bg-blue-600 dark:md:hover:bg-slate-700 md:rounded focus-ring-blue cursor-pointer"
            :class="{ 'md:max-w-(--nav-item-height)': ui.navExtended }">
            <ChevronsLeftIcon :class="{ 'rotate-180': !ui.navExtended }" />
        </button>
    </div>

    <hr class="hidden md:block md:border-white dark:md:border-slate-600 md:mx-2" />
</template>
<script setup lang="ts">
import { useUiStore } from '@/stores/ui';
import { ChevronsLeftIcon } from 'lucide-vue-next';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

const ui = useUiStore();
</script>