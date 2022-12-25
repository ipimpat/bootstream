<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="mb-0 h4">
                Dashboard
            </h2>
        </template>

        <Welcome />
    </AppLayout>
</template>
