<template>
    <nav role="navigation" :aria-label="trans('nav.label')"
        class="fixed bottom-0 z-50 md:left-0 md:top-0 bg-slate-900 w-full h-[60px] md:h-full border-t md:border-t-0 md:border-r border-slate-600 text-slate-100 md:px-1 md:py-2"
        :class="{ 'md:w-[300px]': ui.navExtended, 'md:w-[60px] overflow-hidden': !ui.navExtended }">
        <div class="grid grid-cols-3 md:grid-cols-1 items-stretch h-full md:h-auto md:gap-2">

            <NavHeader />

            <NavItem :href="route('home')" :label="trans('nav.home')" :icon="HomeIcon" :active="route().current('home')"
                v-if="!page.props.auth.user" />
            <NavItem :href="route('register')" :label="trans('auth.sign_up')" :icon="NotebookPenIcon"
                :active="route().current('register')" v-if="!page.props.auth.user" />
            <NavItem :href="route('login')" :label="trans('auth.login')" :icon="LogInIcon"
                :active="route().current('login')" v-if="!page.props.auth.user" />

            <NavDropdown :label="trans('nav.my_place')" :icon="LayoutDashboardIcon" :id="'dashboard-dropdown'"
                v-if="page.props.auth.user">
                <NavDropdownItem href="#" :label="trans('nav.collections')" />
                <NavDropdownItem href="#" :label="trans('nav.decks')" />
                <NavDropdownItem href="#" :label="trans('nav.search')" />
                <NavDropdownItem href="#" :label="trans('nav.share')" />
            </NavDropdown>
            <NavDropdown :label="trans('nav.games')" :icon="DicesIcon" :id="'game-dropdown'"
                v-if="page.props.auth.user">
                <NavDropdownItem href="#" :label="trans('nav.yugioh')" class="col-span-2 md:col-span-1" />
                <NavDropdownItem href="#" :label="trans('nav.pokemon')" />
                <NavDropdownItem href="#" :label="trans('nav.one_piece')" />
                <NavDropdownItem href="#" :label="trans('nav.final_fantasy')" />
                <NavDropdownItem href="#" :label="trans('nav.magic')" />
            </NavDropdown>
            <NavDropdown :label="trans('nav.acccount')" :icon="UserIcon" :id="'account-dropdown'"
                v-if="page.props.auth.user">
                <NavDropdownItem href="#" :label="trans('nav.profile')" :icon="UserIcon" />
                <NavDropdownItem href="#" :label="trans('nav.friends')" :icon="HandshakeIcon" />
                <NavDropdownItem href="#" :label="trans('nav.message')" :icon="MessageCircleIcon" />
                <NavDropdownItem :href="route('logout')" method="post" as="button" :label="trans('nav.logout')"
                    :icon="LogOutIcon" />
            </NavDropdown>
        </div>
    </nav>
</template>

<script setup lang="ts">
import { HomeIcon, UserIcon, DicesIcon, LogOutIcon, MessageCircleIcon, LogInIcon, NotebookPenIcon, LayoutDashboardIcon, HandshakeIcon } from 'lucide-vue-next';
import NavItem from './Nav/NavItem.vue';
import NavDropdown from './Nav/NavDropdown.vue';
import NavDropdownItem from './Nav/NavDropdownItem.vue';
import { trans } from 'laravel-vue-i18n';
import { usePage } from '@inertiajs/vue3';
import { useUiStore } from '@/stores/ui';
import NavHeader from './Nav/NavHeader.vue';

const page = usePage();
const ui = useUiStore();

</script>
