<template>
	<AppLayout>

		<Head :title="trans('global.home')" />
		<HeroSection />
		<FeatureSection />
		<GameSection />
		<JoinSection />

	</AppLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import FeatureSection from '@/Pages/Home/Partials/FeatureSection.vue';
import GameSection from '@/Pages/Home/Partials/GameSection.vue';
import HeroSection from '@/Pages/Home/Partials/HeroSection.vue';
import JoinSection from '@/Pages/Home/Partials/JoinSection.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { trans } from 'laravel-vue-i18n';

</script>