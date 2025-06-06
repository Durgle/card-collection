<template>
	<section class="py-12 bg-blue-100 dark:bg-slate-700 px-4 sm:px-0">
		<div class="max-w-6xl px-6 mx-auto text-center">
			<h2 class="mb-3 text-2xl font-bold text-blue-500 dark:text-cyan-300 sm:text-3xl">
				{{ trans('home.features.title') }}
			</h2>
			<p class="mb-10">
				{{ trans('home.features.description') }}
			</p>
			<div class="grid gap-6 sm:grid-cols-3">
				<Card :title="trans('home.features.create_deck.title')"
					:description="trans('home.features.create_deck.description')" />
				<Card :title="trans('home.features.custom_lists.title')"
					:description="trans('home.features.custom_lists.description')" />
				<Card :title="trans('home.features.database.title')"
					:description="trans('home.features.database.description')" />
			</div>
		</div>
	</section>
</template>

<script setup lang="ts">
import Card from '@/Components/Card.vue';
import { trans } from 'laravel-vue-i18n';
</script>
