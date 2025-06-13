<template>
	<nav
		class="bar-height ticky top-0 z-50 px-4 py-3 bg-white dark:bg-slate-800/80 backdrop-blur dark:border-b dark:border-slate-700 shadow-md">
		<div class="h-full relative flex items-center justify-between max-w-6xl mx-auto">
			<!-- Logo -->
			<div class="flex items-center space-x-2">
				<a :href="route('home')" class="flex items-center space-x-2" :aria-label="trans('global.home')">
					<img src="/logo.svg" alt="Logo" class="w-8 h-8 rounded" />
				</a>
				<span class="text-xl font-bold sm:text-2xl">{{ $page.props.appName }}</span>
			</div>

			<!-- Mobile menu toggle -->
			<button @click="menuOpen = !menuOpen"
				class="sm:hidden text-blue-500 dark:text-sky-400 hover:text-blue-900 dark:hover:text-cyan-300">
				<MenuIcon class="w-6 h-6 cursor-pointer" />
			</button>

			<!-- Desktop nav -->
			<div class="items-center hidden space-x-6 sm:flex">
				<NavLink v-if="!page.props.auth.user" :href="route('login')" :aria-label="trans('auth.login')"
					:active="route().current('login')">
					{{ trans('auth.login') }}
				</NavLink>
				<NavLink v-if="!page.props.auth.user" :href="route('register')" :aria-label="trans('auth.sign_up')"
					:active="route().current('register')">
					{{ trans('auth.sign_up') }}
				</NavLink>
				<NavLink v-if="page.props.auth.user" :href="route('logout')" method="post" as="button"
					:aria-label="trans('auth.sign_up')">
					{{ trans('auth.logout') }}
				</NavLink>
			</div>
		</div>

		<!-- Mobile dropdown -->
		<div v-if="menuOpen"
			class="absolute left-0 w-full h-full mt-3 text-center sm:hidden border-t dark:border-slate-700 shadow-md">
			<ResponsiveNavLink v-if="!page.props.auth.user" :href="route('login')" :aria-label="trans('auth.login')"
				:active="route().current('login')">
				{{ trans('auth.login') }}
			</ResponsiveNavLink>
			<ResponsiveNavLink v-if="!page.props.auth.user" :href="route('register')"
				:aria-label="trans('auth.sign_up')" :active="route().current('register')">
				{{ trans('auth.sign_up') }}
			</ResponsiveNavLink>
		</div>
	</nav>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { trans } from 'laravel-vue-i18n';
import { MenuIcon } from 'lucide-vue-next';
import { usePage } from '@inertiajs/vue3';
import NavLink from './NavLink.vue';
import ResponsiveNavLink from './ResponsiveNavLink.vue';

const menuOpen = ref(false)
const page = usePage()
</script>
