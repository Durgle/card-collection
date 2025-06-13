<template>

    <Head :title="trans('dashboard.title')" />

    <AppLayout>
        <div class="py-12 bg-blue-100 dark:bg-slate-700 px-4 sm:px-0 flex-1">
            <div class="max-w-6xl px-6 mx-auto">
            </div>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { trans } from 'laravel-vue-i18n';
</script>