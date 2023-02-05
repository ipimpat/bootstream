<script setup>
import { ref, computed, watch } from 'vue';
import { useForm, usePage, router } from '@inertiajs/vue3';
import ActionSection from '@/Components/ActionSection.vue';
import ConfirmsPassword from '@/Components/ConfirmsPassword.vue';
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    requiresConfirmation: Boolean,
});

const enabling = ref(false);
const confirming = ref(false);
const disabling = ref(false);
const qrCode = ref(null);
const setupKey = ref(null);
const recoveryCodes = ref([]);

const confirmationForm = useForm({
    code: '',
});

const twoFactorEnabled = computed(
    () => ! enabling.value && usePage().props.user?.two_factor_enabled,
);

watch(twoFactorEnabled, () => {
    if (! twoFactorEnabled.value) {
        confirmationForm.reset();
        confirmationForm.clearErrors();
    }
});

const enableTwoFactorAuthentication = () => {
    enabling.value = true;

    router.post('/user/two-factor-authentication', {}, {
        preserveScroll: true,
        onSuccess: () => Promise.all([
            showQrCode(),
            showSetupKey(),
            showRecoveryCodes(),
        ]),
        onFinish: () => {
            enabling.value = false;
            confirming.value = props.requiresConfirmation;
        },
    });
};

const showQrCode = () => {
    return axios.get('/user/two-factor-qr-code').then(response => {
        qrCode.value = response.data.svg;
    });
};

const showSetupKey = () => {
    return axios.get('/user/two-factor-secret-key').then(response => {
        setupKey.value = response.data.secretKey;
    });
}

const showRecoveryCodes = () => {
    return axios.get('/user/two-factor-recovery-codes').then(response => {
        recoveryCodes.value = response.data;
    });
};

const confirmTwoFactorAuthentication = () => {
    confirmationForm.post('/user/confirmed-two-factor-authentication', {
        errorBag: "confirmTwoFactorAuthentication",
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            confirming.value = false;
            qrCode.value = null;
            setupKey.value = null;
        },
    });
};

const regenerateRecoveryCodes = () => {
    axios
        .post('/user/two-factor-recovery-codes')
        .then(() => showRecoveryCodes());
};

const disableTwoFactorAuthentication = () => {
    disabling.value = true;

    router.delete('/user/two-factor-authentication', {
        preserveScroll: true,
        onSuccess: () => {
            disabling.value = false;
            confirming.value = false;
        },
    });
};
</script>

<template>
    <ActionSection>
        <template #title>
            Two Factor Authentication
        </template>

        <template #description>
            Add additional security to your account using two factor authentication.
        </template>

        <template #content>
            <div class="col-md-9">
                <h3 v-if="twoFactorEnabled && ! confirming" class="h5 mb-0">
                    You have enabled two factor authentication.
                </h3>

                <h3 v-else-if="twoFactorEnabled && confirming" class="h5 mb-0">
                    Finish enabling two factor authentication.
                </h3>

                <h3 v-else class="h5 mb-0">
                    You have not enabled two factor authentication.
                </h3>

                <p class="text-muted mt-2 mb-0">
                    When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.
                </p>

                <div v-if="twoFactorEnabled">
                    <div v-if="qrCode">
                        <div class="mt-2 text-muted">
                            <p v-if="confirming" class="fw-bold">
                                To finish enabling two factor authentication, scan the following QR code using your phone's authenticator application or enter the setup key and provide the generated OTP code.
                            </p>

                            <p v-else>
                                Two factor authentication is now enabled. Scan the following QR code using your phone's authenticator application or enter the setup key.
                            </p>
                        </div>

                        <div class="mt-2" v-html="qrCode" />

                        <div class="mt-2" v-if="setupKey">
                            <p class="fw-bold text-muted">
                                Setup Key: <span v-html="setupKey"></span>
                            </p>
                        </div>

                        <div v-if="confirming" class="mt-2">
                            <InputLabel for="code" value="Code" />
                            <TextInput
                                id="code"
                                v-model="confirmationForm.code"
                                type="text"
                                name="code"
                                class="w-50"
                                :class="{'is-invalid': Boolean(confirmationForm.errors.code)}"
                                inputmode="numeric"
                                autofocus
                                autocomplete="one-time-code"
                                @keyup.enter="confirmTwoFactorAuthentication"
                            />
                            <InputError :message="confirmationForm.errors.code" />
                        </div>
                    </div>

                    <div v-if="recoveryCodes.length > 0 && ! confirming">
                        <div class="mt-2 text-muted">
                            <p class="fw-bold">
                                Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.
                            </p>
                        </div>

                        <div class="d-grid gap-1 mt-2 p-2 font-monospace bg-light rounded-3">
                            <div v-for="code in recoveryCodes" :key="code">
                                {{ code }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div v-if="! twoFactorEnabled">
                        <ConfirmsPassword @confirmed="enableTwoFactorAuthentication">
                            <PrimaryButton type="button" :class="{ 'opacity-25': enabling }" :disabled="enabling">
                                Enable
                            </PrimaryButton>
                        </ConfirmsPassword>
                    </div>

                    <div v-else>
                        <ConfirmsPassword @confirmed="confirmTwoFactorAuthentication">
                            <PrimaryButton
                                v-if="confirming"
                                type="button"
                                class="me-3"
                                :class="{ 'opacity-25': enabling }"
                                :disabled="enabling"
                            >
                                Confirm
                            </PrimaryButton>
                        </ConfirmsPassword>

                        <ConfirmsPassword @confirmed="regenerateRecoveryCodes">
                            <SecondaryButton
                                v-if="recoveryCodes.length > 0 && ! confirming"
                                class="me-3"
                            >
                                Regenerate Recovery Codes
                            </SecondaryButton>
                        </ConfirmsPassword>

                        <ConfirmsPassword @confirmed="showRecoveryCodes">
                            <SecondaryButton
                                v-if="recoveryCodes.length === 0 && ! confirming"
                                class="me-3"
                            >
                                Show Recovery Codes
                            </SecondaryButton>
                        </ConfirmsPassword>

                        <ConfirmsPassword @confirmed="disableTwoFactorAuthentication">
                            <SecondaryButton
                                v-if="confirming"
                                :class="{ 'opacity-25': disabling }"
                                :disabled="disabling"
                            >
                                Cancel
                            </SecondaryButton>
                        </ConfirmsPassword>

                        <ConfirmsPassword @confirmed="disableTwoFactorAuthentication">
                            <DangerButton
                                v-if="! confirming"
                                :class="{ 'opacity-25': disabling }"
                                :disabled="disabling"
                            >
                                Disable
                            </DangerButton>
                        </ConfirmsPassword>
                    </div>
                </div>
            </div>
        </template>
    </ActionSection>
</template>
