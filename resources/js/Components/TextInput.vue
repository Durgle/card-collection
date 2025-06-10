<template>
    <input
        class="rounded-md border-gray-300 shadow-sm focus:border-blue-900 focus:ring-blue-900 dark:border-slate-700 dark:bg-slate-900 dark:text-gray-300 dark:focus:border-sky-400 dark:focus:ring-sky-800"
        v-model="model" ref="input" />
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';

const model = defineModel<string>({ required: true });

const input = ref<HTMLInputElement | null>(null);

onMounted(() => {
    if (input.value?.hasAttribute('autofocus')) {
        input.value?.focus();
    }
});

defineExpose({ focus: () => input.value?.focus() });
</script>