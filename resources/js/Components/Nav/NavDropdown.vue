<template>
    <div>
        <button
            class="h-full md:h-(--nav-item-height) w-full text-xs md:text-base flex flex-col md:flex-row items-center gap-0.5 md:gap-4 md:p-3.5 md:rounded justify-center cursor-pointer hover:bg-blue-600 dark:hover:bg-slate-700 focus-ring-blue"
            :class="{ 'text-yellow-300 dark:text-cyan-300 bg-blue-600/50 dark:bg-slate-800 md:mb-1': isOpen, 'md:justify-center': !ui.navExtended, 'md:justify-normal': ui.navExtended }"
            :ariaExpanded="isOpen.toString()" aria-haspopup="menu" :title="label" @click="toggle">
            <component :is="icon" class="shrink-0" aria-hidden="true" />
            <span class="max-w-full truncate px-1" :class="{ 'md:hidden': !ui.navExtended }">{{ label }}</span>
            <ChevronDownIcon class="shrink-0 hidden md:block md:ml-auto" :class="{ 'md:rotate-180': isOpen }"
                v-show="ui.navExtended" />
        </button>
        <div v-show="isOpen"
            class="fixed md:static bottom-(--mobile-nav-height) left-0 w-full bg-blue-700 dark:bg-slate-900 md:bg-inherit grid grid-cols-2 md:grid-cols-1 border-t md:border-t-0 border-blue-700 dark:border-slate-600 z-50 text-xs md:text-base gap-[1px] md:gap-1"
            @keydown.esc="close" tabindex="-1">
            <slot />
        </div>
    </div>
</template>

<script setup lang="ts">
import { useUiStore } from '@/stores/ui';
import { ChevronDownIcon } from 'lucide-vue-next';
import { computed, FunctionalComponent } from 'vue';

const props = defineProps<{
    label: string;
    id: string;
    icon: FunctionalComponent;
}>();

const isOpen = computed(() => ui.openItemId === props.id);
const ui = useUiStore();

/**
 * Toggles the dropdown by setting this item's ID as the open item.
 */
function toggle() {
    ui.setOpenItem(props.id);
}

/**
 * Closes the dropdown if it is currently open.
 */
function close() {
    if (isOpen.value) {
        ui.setOpenItem(null);
    }
}

</script>
