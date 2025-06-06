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
import FeatureSection from './Home/FeatureSection.vue';
import GameSection from './Home/GameSection.vue';
import HeroSection from './Home/HeroSection.vue';
import JoinSection from './Home/JoinSection.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { trans } from 'laravel-vue-i18n';

</script>