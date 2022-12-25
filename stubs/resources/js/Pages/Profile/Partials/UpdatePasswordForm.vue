<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('user-password.update'), {
        errorBag: 'updatePassword',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }

            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <FormSection @submitted="updatePassword">
        <template #title>
            Update Password
        </template>

        <template #description>
            Ensure your account is using a long, random password to stay secure.
        </template>

        <template #form>
            <div class="col-md-9">
                <InputLabel for="current_password" value="Current Password" />
                <TextInput
                    id="current_password"
                    ref="currentPasswordInput"
                    v-model="form.current_password"
                    type="password"
                    :class="{'is-invalid': Boolean(form.errors.current_password)}"
                    autocomplete="current-password"
                />
                <InputError :message="form.errors.current_password" />
            </div>

            <div class="col-md-9">
                <InputLabel for="password" value="New Password" />
                <TextInput
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    :class="{'is-invalid': Boolean(form.errors.password)}"
                    autocomplete="new-password"
                />
                <InputError :message="form.errors.password" />
            </div>

            <div class="col-md-9">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    :class="{'is-invalid': Boolean(form.errors.password_confirmation)}"
                    autocomplete="new-password"
                />
                <InputError :message="form.errors.password_confirmation" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
