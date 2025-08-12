<template>
    <nav role="navigation" :aria-label="trans('nav.label')"
        class="fixed bottom-0 z-50 md:left-0 md:top-0 bg-blue-500 dark:bg-slate-900 w-full h-(--mobile-nav-height) md:h-full border-t md:border-t-0 md:border-r border-white dark:border-slate-600 text-white dark:text-slate-100 md:px-1 md:py-2 overflow-y-auto lite-scrollbar"
        :class="{ 'md:w-(--expanded-nav-width)': ui.navExtended, 'md:w-(--nav-width) overflow-y-hidden': !ui.navExtended }">
        <div class="grid md:grid-cols-1 items-stretch h-full md:h-auto md:gap-2"
            :class="{ 'grid-cols-2': !$page.props.auth.user, 'grid-cols-4': $page.props.auth.user }">

            <NavHeader />

            <NavItem :href="route('home')" :label="trans('nav.home')" :icon="HomeIcon" :active="route().current('home')"
                v-if="!$page.props.auth.user" />

            <NavItem href="#" :label="trans('nav.collections')" :icon="LibraryBigIcon" v-if="$page.props.auth.user" />

            <NavItem href="#" :label="trans('nav.decks')" :icon="BoxIcon" v-if="$page.props.auth.user" />

            <NavItem href="#" :label="trans('nav.search')" :icon="SearchIcon" v-if="$page.props.auth.user" />

            <NavDropdown :label="trans('nav.games')" :icon="DicesIcon" :id="'game-dropdown'">
                <NavDropdownItem :href="route('yugioh.news.index')" :label="trans('nav.yugioh')"
                    class="col-span-2 md:col-span-1" />
                <NavDropdownItem href="#" :label="trans('nav.pokemon')" />
                <NavDropdownItem href="#" :label="trans('nav.one_piece')" />
                <NavDropdownItem href="#" :label="trans('nav.final_fantasy')" />
                <NavDropdownItem href="#" :label="trans('nav.magic')" />
            </NavDropdown>
        </div>
    </nav>
</template>

<script setup lang="ts">
import { HomeIcon, DicesIcon, SearchIcon, LibraryBigIcon, BoxIcon } from 'lucide-vue-next';
import NavItem from '@/Components/Nav/NavItem.vue';
import NavDropdown from '@/Components/Nav/NavDropdown.vue';
import NavDropdownItem from '@/Components/Nav/NavDropdownItem.vue';
import { trans } from 'laravel-vue-i18n';
import { useUiStore } from '@/stores/ui';
import NavHeader from '@/Components/Nav/NavHeader.vue';

const ui = useUiStore();

</script>
