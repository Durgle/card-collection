<template>
    <nav class="fixed bottom-0 left-0 right-0 z-50 bg-white text-blue-900 dark:bg-slate-800 dark:text-slate-100 sm:hidden"
        ref="navRef">

        <MobileSubNavBar v-if="expandedMenu === 'manage'">
            <MobileSubNavLink href="#" class="col-span-3">{{ trans('nav.collections') }}</MobileSubNavLink>
            <MobileSubNavLink href="#">{{ trans('nav.decks') }}</MobileSubNavLink>
            <MobileSubNavLink href="#">{{ trans('nav.search') }}</MobileSubNavLink>
            <MobileSubNavLink href="#">{{ trans('nav.share') }}</MobileSubNavLink>
        </MobileSubNavBar>

        <MobileSubNavBar v-if="expandedMenu === 'game'">
            <MobileSubNavLink href="#">{{ trans('nav.yugioh') }}</MobileSubNavLink>
            <MobileSubNavLink href="#">{{ trans('nav.pokemon') }}</MobileSubNavLink>
            <MobileSubNavLink href="#">{{ trans('nav.one_piece') }}</MobileSubNavLink>
            <MobileSubNavLink href="#">{{ trans('nav.final_fantasy') }}</MobileSubNavLink>
            <MobileSubNavLink href="#">{{ trans('nav.magic') }}</MobileSubNavLink>
        </MobileSubNavBar>

        <MobileSubNavBar v-if="expandedMenu === 'account'">
            <MobileSubNavLink href="#">
                <UserIcon class="w-5 h-5 mx-2" /> {{ trans('nav.profile') }}
            </MobileSubNavLink>
            <MobileSubNavLink href="#">
                <MessageCircleIcon class="w-5 h-5 mx-2" /> {{ trans('nav.message') }}
            </MobileSubNavLink>
            <MobileSubNavLink :href="route('logout')" method="post" as="button">
                <LogOutIcon class="w-5 h-5 mx-2" /> {{ trans('nav.logout') }}
            </MobileSubNavLink>
        </MobileSubNavBar>

        <div class="text-xs bar-height flex justify-around items-center border-t border-blue-900 dark:border-slate-700">
            <MobileNavLink :href="route('home')">
                <HomeIcon class="w-5 h-5 mb-1" /> {{ trans('nav.home') }}
            </MobileNavLink>
            <MobileNavLink @click="toggleExpand('manage')" :isLink="false" :active="expandedMenu === 'manage'">
                <BookIcon class="w-5 h-5 mb-1" /> {{ trans('nav.my_place') }}
            </MobileNavLink>
            <MobileNavLink @click="toggleExpand('game')" :isLink="false" :active="expandedMenu === 'game'">
                <DicesIcon class=" w-5 h-5 mb-1" /> {{ trans('nav.games') }}
            </MobileNavLink>
            <MobileNavLink @click="toggleExpand('account')" :isLink="false" :active="expandedMenu === 'account'">
                <UserIcon class=" w-5 h-5 mb-1" /> {{ trans('nav.acccount') }}
            </MobileNavLink>
        </div>
    </nav>
</template>

<script setup lang="ts">
import { BookIcon, DicesIcon, HomeIcon, LogOutIcon, MessageCircleIcon, UserIcon } from 'lucide-vue-next';
import { onBeforeUnmount, onMounted, ref } from 'vue';
import MobileSubNavBar from '@/Components/MobileSubNavBar.vue';
import MobileNavLink from '@/Components/MobileNavLink.vue';
import MobileSubNavLink from '@/Components/MobileSubNavLink.vue';
import { MenuType } from '@/types/nav';
import { trans } from 'laravel-vue-i18n';

const expandedMenu = ref<null | MenuType>(null);
const navRef = ref<HTMLElement | null>(null);

const toggleExpand = (menu: MenuType) => {
    expandedMenu.value = expandedMenu.value === menu ? null : menu;
}

function closeExpand() {
    expandedMenu.value = null;
}

function handleClickOutside(event: MouseEvent): void {
    const target = event.target as HTMLElement;
    if (navRef.value && target && !navRef.value.contains(target)) {
        closeExpand();
    }
}

onMounted(() => {
    document.addEventListener('click', handleClickOutside)
});

onBeforeUnmount(() => {
    document.removeEventListener('click', handleClickOutside)
});

</script>
