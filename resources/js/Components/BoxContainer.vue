<template>
    <div class="max-w-md mx-auto py-12">
        <div class="text-blue-700 dark:text-slate-100 bg-blue-100 dark:bg-slate-700 rounded-lg p-8 shadow-md">
            <h2 v-if="title" class="mb-12 text-2xl font-bold sm:text-3xl">
                {{ title }}
            </h2>
            <slot />
        </div>
    </div>
</template>

<script setup lang="ts">

defineProps<{
    title?: string;
}>();

</script>