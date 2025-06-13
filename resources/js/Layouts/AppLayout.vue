<template>
    <main
        class="flex flex-col min-h-screen bg-neutral-100 dark:bg-slate-900 text-blue-900 dark:text-slate-100 transition">
        <NavBar />
        <div class="content flex-1 flex flex-col" :class="classes">
            <slot />
        </div>
        <Footer />
        <MobileNav v-if="!page.props.auth.user" />
    </main>
</template>

<script setup lang="ts">
import Footer from '@/Components/Footer.vue';
import NavBar from '@/Components/NavBar.vue';
import MobileNav from '@/Components/MobileNav.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

const props = defineProps<{
    contentCentered?: boolean;
}>();

const classes = computed(() =>
    props.contentCentered
        ? 'items-center justify-center'
        : '',

);
</script>

<style scoped>
.content > * {
    width: 100%;
}
</style>