<template>
    <AppLayout :contentCentered="true">
        <BoxContainer :title="trans('auth.reset_password')">

            <Head :title="trans('auth.reset_password')" />

            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="email" :value="trans('data.email')" />

                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus
                        autocomplete="username" />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" :value="trans('data.password')" />

                    <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                        autocomplete="new-password" />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password_confirmation" :value="trans('data.confirm_password')" />

                    <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                        v-model="form.password_confirmation" required autocomplete="new-password" />

                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <div class="mt-4 flex items-center justify-end">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ trans('global.reset') }}
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
import AppLayout from '@/Layouts/AppLayout.vue';
import BoxContainer from '@/Components/BoxContainer.vue';
import { trans } from 'laravel-vue-i18n';

const props = defineProps<{
    email: string;
    token: string;
}>();

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>