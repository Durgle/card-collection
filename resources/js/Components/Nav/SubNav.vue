<template>
    <nav role="navigation"
        class="sticky top-0 bg-blue-500 dark:bg-slate-900 text-white dark:text-slate-100 h-(--subnav-height) border-b border-white dark:border-slate-600 z-50 md:z-49">

        <div class="h-full md:hidden flex items-center justify-between px-4 py-2">
            <ApplicationLogo />
            <button @click="open = !open" class="p-2 focus-ring-blue cursor-pointer">
                <MenuIcon v-if="!open" class="shrink-0" />
                <XIcon v-else class="shrink-0" />
            </button>
        </div>

        <div v-show="open"
            class="md:hidden bg-blue-500 dark:bg-slate-900 divide-y divide-white dark:divide-slate-600 border-y border-white dark:border-slate-600 max-h-[calc(100vh-var(--subnav-height)-var(--mobile-nav-height))] overflow-y-auto lite-scrollbar">
            <SubNavItem v-for="item in items" :key="item.entryKey" :href="item.href" :label="trans(item.label)"
                :active="item.active" :icon="item.icon" />
            <SubNavItem v-if="!$page.props.auth.user" :href="route('register')" :label="trans('auth.sign_up')"
                :active="route().current('register')" />
            <SubNavItem v-if="!$page.props.auth.user" :href="route('login')" :label="trans('auth.login')"
                :active="route().current('login')" />

            <SubNavItem v-if="$page.props.auth.user" href="#" :label="trans('nav.acccount')" :active="false" />
            <SubNavItem v-if="$page.props.auth.user" :href="route('logout')" method="post" as="button"
                :label="trans('nav.logout')" />
        </div>

        <div class="hidden md:flex px-1 md:py-2 h-full overflow-x-auto lite-scrollbar">
            <div class="flex items-center space-x-2 min-w-max ml-auto">
                <SubNavItem v-for="item in items" :key="item.entryKey" :href="item.href" :label="trans(item.label)"
                    :active="item.active" :icon="item.icon" />

                <SubNavItem v-if="!$page.props.auth.user" :href="route('register')" :label="trans('auth.sign_up')"
                    :active="route().current('register')" />
                <SubNavItem v-if="!$page.props.auth.user" :href="route('login')" :label="trans('auth.login')"
                    :active="route().current('login')" />

                <SubNavItem v-if="$page.props.auth.user" href="#" :label="trans('nav.acccount')" :active="false" />
                <SubNavItem v-if="$page.props.auth.user" :href="route('logout')" method="post" as="button"
                    :label="trans('nav.logout')" />
            </div>
        </div>
    </nav>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { trans } from 'laravel-vue-i18n';
import { MenuIcon, XIcon } from 'lucide-vue-next';
import { useSubNavState } from '@/composables/useSubNav';
import SubNavItem from '@/Components/Nav/SubNavItem.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

const open = ref(false);
const { items } = useSubNavState();

</script>
