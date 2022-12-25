<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

defineProps({
    policy: String,
});
</script>

<template>
    <Head title="Privacy Policy" />

    <div class="row justify-content-center pt-4">
        <div class="col-6">
            <div>
                <AuthenticationCardLogo />
            </div>

            <div class="card shadow-sm">
                <div v-html="policy" class="card-body"></div>
            </div>
        </div>
    </div>
</template>
