<template>
    <div :class="[
        'grid text-xs mx-auto justify-around items-center h-full border-t bg-white border-blue-900 dark:bg-slate-800  dark:border-slate-700 dark:text-slate-100 min-h-12',
        gridCols
    ]">
        <slot />
    </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps<{
    'gridCols'?: string;
}>();

const gridCols = computed(() => {
    return `grid-cols-${props.gridCols || '3'}`;
});
</script>
