<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    status: String,
});

const form = useForm();

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <Head title="Email Verification" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="mb-2 text-muted">
            Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        <div v-if="verificationLinkSent" class="mb-2 text-success">
            A new verification link has been sent to the email address you provided in your profile settings.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 d-flex align-items-center justify-content-between">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Resend Verification Email
                </PrimaryButton>

                <div>
                    <Link
                        :href="route('profile.show')"
                        class="btn btn-link text-muted"
                    >
                        Edit Profile</Link>

                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="btn btn-link text-muted ms-2"
                    >
                        Log Out
                    </Link>
                </div>
            </div>
        </form>
    </AuthenticationCard>
</template>
