<template>
    <div class="min-h-screen text-white dark:text-slate-100 bg-white dark:bg-slate-800">
        <Nav />
        <main class="px-0 py-[60px] md:py-0"
            :class="{ 'md:pl-[60px]': !ui.navExtended, 'md:pl-[300px]': ui.navExtended }">
            <slot />
        </main>
    </div>
</template>

<script setup lang="ts">

import Nav from '@/Components/Nav.vue';
import { useUiStore } from '@/stores/ui';

const ui = useUiStore()

</script>