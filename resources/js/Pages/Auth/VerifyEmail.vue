<template>
    <AppLayout :contentCentered="true">

        <BoxContainer :title="trans('auth.verify_email')">

            <Head :title="trans('auth.verify_email')" />

            <div class="mb-4 text-sm text-blue-700 dark:text-slate-400">
                {{ trans('auth.verify_email_thanks') }}
            </div>

            <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400" v-if="verificationLinkSent">
                {{ trans('auth.verify_email_sent') }}
            </div>

            <form @submit.prevent="submit">
                <div class="mt-4 flex items-center justify-between">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ trans('auth.resend_verification') }}
                    </PrimaryButton>

                    <AppLink :href="route('logout')" method="post" as="button">
                        {{ trans('auth.logout') }}
                    </AppLink>
                </div>
            </form>

        </BoxContainer>

    </AppLayout>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import BoxContainer from '@/Components/BoxContainer.vue';
import AppLink from '@/Components/AppLink.vue';
import { trans } from 'laravel-vue-i18n';

const props = defineProps<{
    status?: string;
}>();

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(
    () => props.status === 'verification-link-sent',
);
</script>