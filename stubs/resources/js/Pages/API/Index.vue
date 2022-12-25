<script setup>
import ApiTokenManager from '@/Pages/API/Partials/ApiTokenManager.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    tokens: Array,
    availablePermissions: Array,
    defaultPermissions: Array,
});
</script>

<template>
    <AppLayout title="API Tokens">
        <template #header>
            <h2 class="mb-0 h4">
                API Tokens
            </h2>
        </template>

        <div>
            <ApiTokenManager
                :tokens="tokens"
                :available-permissions="availablePermissions"
                :default-permissions="defaultPermissions"
            />
        </div>
    </AppLayout>
</template>
