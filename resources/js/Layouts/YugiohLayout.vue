<template>
    <AppLayout>

        <SubNavEntry entryKey="yugioh-news" label="yugioh.nav.news" :href="route('yugioh.news.index')"
            :active="route().current('yugioh.news.index')" />
        <SubNavEntry entryKey="yugioh-database" label="yugioh.nav.database" :href="route('yugioh.database.index')"
            :active="route().current('yugioh.database.index')" />
        <SubNavEntry entryKey="yugioh-decks" label="yugioh.nav.decks" :href="route('yugioh.decks.index')"
            :active="route().current('yugioh.decks.index')" />
        <SubNavEntry entryKey="yugioh-ban" label="yugioh.nav.banlist" :href="route('yugioh.banlist.index')"
            :active="route().current('yugioh.banlist.index')" />

        <div class="px-4 md:px-6 py-6">
            <slot />
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import SubNavEntry from '@/Components/Nav/SubNavEntry.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
</script>
