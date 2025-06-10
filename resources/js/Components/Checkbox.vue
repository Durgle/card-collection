<template>
    <input type="checkbox" :value="value" v-model="proxyChecked"
        class="rounded border-gray-300 text-blue-900 shadow-sm focus:ring-blue-900 focus:ring-offset-blue-200 dark:border-slate-700 dark:bg-slate-900 dark:focus:ring-sky-400 dark:focus:ring-offset-sky-800" />
</template>

<script setup lang="ts">
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps<{
    checked: boolean;
    value?: any;
}>();

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>