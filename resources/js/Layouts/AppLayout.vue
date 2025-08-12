<template>
    <div class="min-h-screen text-black dark:text-slate-100 bg-white dark:bg-slate-800">
        <Nav />
        <main class="px-0 pb-(--mobile-nav-height) md:py-0"
            :class="{ 'md:pl-(--nav-width)': !ui.navExtended, 'md:pl-(--expanded-nav-width)': ui.navExtended }">
            <SubNav />
            <slot />
        </main>
    </div>
</template>

<script setup lang="ts">

import Nav from '@/Components/Nav.vue';
import SubNav from '@/Components/Nav/SubNav.vue';
import { useUiStore } from '@/stores/ui';

const ui = useUiStore()

</script>