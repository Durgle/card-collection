<template>
    <main
        class="flex flex-col min-h-screen bg-neutral-100 dark:bg-slate-900 text-blue-900 dark:text-slate-100 transition">
        <NavBar />
        <div class="content flex-1 flex flex-col" :class="classes">
            <slot />
        </div>
        <Footer />
    </main>
</template>

<script setup lang="ts">
import Footer from '@/Components/Footer.vue';
import NavBar from '@/Components/NavBar.vue';
import { computed } from 'vue';

const props = defineProps<{
    contentCentered?: boolean;
}>();

const classes = computed(() =>
    props.contentCentered
        ? 'items-center justify-center'
        : 'sm:pt-12',

);
</script>

<style scoped>
.content > * {
    width: 100%;
}
</style>