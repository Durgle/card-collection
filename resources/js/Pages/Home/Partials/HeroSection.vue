<template>
	<section class="relative px-4 py-12 text-center sm:px-0 text-blue-700 dark:text-slate-300">
		<div class="relative max-w-2xl mx-auto">
			<h1 class="mb-4 text-3xl font-bold leading-snug sm:text-5xl text-blue-900 dark:text-slate-100">
				<span v-html="trans('home.hero.manage_collections')"></span>
			</h1>
			<p class="mb-8 text-base sm:text-lg ">
				{{ trans('home.hero.description') }}
			</p>
			<div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
				<ButtonLink :href="route('register')" :aria-label="trans('auth.hero.button')">
					{{ trans('home.hero.button') }}
				</ButtonLink>
			</div>
		</div>
	</section>
</template>
<script setup lang="ts">
import ButtonLink from '@/Components/ButtonLink.vue';
import { trans } from 'laravel-vue-i18n';
</script>
