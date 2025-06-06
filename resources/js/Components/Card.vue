<template>
    <div class="p-5 rounded bg-blue-200 dark:bg-slate-800">
        <h3 class="mb-1 text-lg font-bold text-blue-700 dark:text-white">
            <slot name="title">
                {{ title }}
            </slot>
        </h3>
        <p class="text-sm text-blue-900 dark:text-slate-400">
            <slot name="description">
                {{ description }}
            </slot>
        </p>
    </div>
</template>

<script setup lang="ts">
defineProps<{
    title?: string;
    description?: string;
}>();
</script>
