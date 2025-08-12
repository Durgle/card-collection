<template>
    <AppLayout>

        <Head :title="trans('yugioh.nav.set', { name: 'Lorem Ipsum' })" />
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { trans } from 'laravel-vue-i18n';
</script>