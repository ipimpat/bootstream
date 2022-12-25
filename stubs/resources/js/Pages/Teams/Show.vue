<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteTeamForm from '@/Pages/Teams/Partials/DeleteTeamForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import TeamMemberManager from '@/Pages/Teams/Partials/TeamMemberManager.vue';
import UpdateTeamNameForm from '@/Pages/Teams/Partials/UpdateTeamNameForm.vue';

defineProps({
    team: Object,
    availableRoles: Array,
    permissions: Object,
});
</script>

<template>
    <AppLayout title="Team Settings">
        <template #header>
            <h2 class="mb-0 h4">
                Team Settings
            </h2>
        </template>

        <div>
            <UpdateTeamNameForm :team="team" :permissions="permissions" />

            <TeamMemberManager
                :team="team"
                :available-roles="availableRoles"
                :user-permissions="permissions"
            />

            <template v-if="permissions.canDeleteTeam && ! team.personal_team">
                <SectionBorder />

                <DeleteTeamForm :team="team" />
            </template>
        </div>
    </AppLayout>
</template>
