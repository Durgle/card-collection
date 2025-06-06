<template>
  <footer
    class="py-5 text-xs text-center border-t bg-white dark:bg-slate-800 border-blue-900 dark:border-slate-700 dark:text-slate-100 sm:text-sm">
    &copy; {{ trans('global.copyright', { appName: $page.props.appName as string }) }}
    {{ trans('global.developed_by', { developerName: 'Durgle' }) }}
  </footer>
</template>

<script setup lang="ts">
import { trans } from 'laravel-vue-i18n';
</script>
