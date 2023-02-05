<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

defineProps({
    terms: String,
});
</script>

<template>
    <Head title="Terms of Service" />

    <div class="row justify-content-center pt-4">
        <div class="col-6">
            <div>
                <AuthenticationCardLogo />
            </div>

            <div class="card shadow-sm">
                <div v-html="terms" class="card-body"></div>
            </div>
        </div>
    </div>
</template>
