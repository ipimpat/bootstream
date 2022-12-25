<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CreateTeamForm from '@/Pages/Teams/Partials/CreateTeamForm.vue';
</script>

<template>
    <AppLayout title="Create Team">
        <template #header>
            <h2 class="mb-0 h4">
                Create Team
            </h2>
        </template>

        <CreateTeamForm />
    </AppLayout>
</template>
