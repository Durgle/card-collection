<template>
	<section class="py-12 bg-blue-100 dark:bg-slate-700 text-center px-4">
		<h2 class="mb-3 text-2xl font-bold text-blue-500 dark:text-cyan-300 sm:text-3xl">{{ trans('home.join.title') }}
		</h2>
		<p class="mb-6 text-sm sm:text-base">{{ trans('home.join.subtitle') }}</p>
		<ButtonLink :href="route('register')" :aria-label="trans('auth.create_account')">
			{{ trans('auth.create_account') }}
		</ButtonLink>
	</section>
</template>
<script setup lang="ts">
import ButtonLink from '@/Components/ButtonLink.vue';
import { trans } from 'laravel-vue-i18n';
</script>
