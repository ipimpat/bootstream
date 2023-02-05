<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="status" class="alert alert-success mb-3 rounded-0" role="alert">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    :class="{'is-invalid': Boolean(form.errors.email)}"
                    required
                    autofocus
                />
                <InputError :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    :class="{'is-invalid': Boolean(form.errors.password)}"
                    required
                    autocomplete="current-password"
                />
                <InputError :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <Checkbox id="remember_me" name="remember" v-model:checked="form.remember" :class="{'is-invalid': Boolean(form.errors.remember)}">
                    <InputLabel for="remember_me" value="Remember me" class="form-check-label" />
                </Checkbox>
                <InputError :message="form.errors.remember" />
            </div>

            <div class="d-flex justify-content-end align-items-baseline mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="text-muted">
                    Forgot your password?
                </Link>

                <PrimaryButton class="ms-4" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
