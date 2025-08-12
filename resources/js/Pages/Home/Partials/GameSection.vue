<template>
    <section class="px-4 py-12 dark:bg-slate-900 sm:px-0 text-blue-700 dark:text-slate-300">
        <div class="max-w-6xl px-6 mx-auto text-center">
            <h2 class="mb-3 text-2xl font-bold text-blue-900 dark:text-slate-100 sm:text-3xl">
                {{ trans('home.game.title') }}
            </h2>
            <p class="mb-10">{{ trans('home.game.description') }}</p>
            <div class="grid gap-6 sm:grid-cols-2">
                <Card :title="trans('home.game.yugioh.title')" :description="trans('home.game.yugioh.desc')" />
                <Card :title="trans('home.game.pokemon.title')" :description="trans('home.game.pokemon.desc')" />
                <Card :title="trans('home.game.one_piece.title')" :description="trans('home.game.one_piece.desc')" />
                <Card :title="trans('home.game.soon.title')" :description="trans('home.game.soon.desc')" />
            </div>
        </div>
    </section>
</template>
<script setup lang="ts">
import Card from '@/Components/Card.vue';
import { trans } from 'laravel-vue-i18n';
</script>
