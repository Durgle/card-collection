<template>
    <AppLayout :contentCentered="true">

        <Head :title="trans('auth.forgot_password')" />

        <BoxContainer :title="trans('auth.forgot_password')">

            <div class="mb-4 text-sm text-blue-700 dark:text-slate-400">
                {{ trans('auth.forgot_password_desc') }}
            </div>

            <div v-if="status" class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                {{ status }}
            </div>

            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="email" :value="trans('data.email')" />

                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus
                        autocomplete="username" />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4 flex items-center justify-end">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ trans('auth.reset_password') }}
                    </PrimaryButton>
                </div>
            </form>
        </BoxContainer>
    </AppLayout>
</template>

<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import BoxContainer from '@/Components/BoxContainer.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { trans } from 'laravel-vue-i18n';

defineProps<{
    status?: string;
}>();

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>