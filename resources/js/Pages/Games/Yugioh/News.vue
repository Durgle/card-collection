<template>
    <YugiohLayout>

        <Head :title="trans('yugioh.nav.news')" />
    </YugiohLayout>
</template>

<script setup lang="ts">
import YugiohLayout from '@/Layouts/YugiohLayout.vue';
import { Head } from '@inertiajs/vue3';
import { trans } from 'laravel-vue-i18n';
</script>
