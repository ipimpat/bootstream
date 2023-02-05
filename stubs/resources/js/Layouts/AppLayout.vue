<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';

defineProps({
    title: String,
});

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top">
            <div class="container">
                <!-- Logo -->
                <Link class="navbar-brand me-4" :href="route('dashboard')">
                    <ApplicationMark style="height: 2.25rem;" class="d-block w-auto" />
                </Link>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Links -->
                <div class="collapse navbar-collapse d-flex align-items-center" id="navbarContent">
                    <ul class="navbar-nav me-auto">
                        <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </NavLink>
                    </ul>

                    <ul class="navbar-nav d-flex align-items-center">

                        <!-- Teams Dropdown -->
                        <Dropdown v-if="$page.props.jetstream.hasTeamFeatures" align="end">
                            <template #trigger>
                                <div class="d-flex justify-content-between align-items-center">
                                    {{ $page.props.user.current_team.name }}
                                    <i class="bi bi-chevron-expand ms-2 pt-1"></i>
                                </div>
                            </template>

                            <template #content>
                                <!-- Team Management -->
                                <template v-if="$page.props.jetstream.hasTeamFeatures">
                                    <li>
                                        <div class="dropdown-header">Manage Team</div>
                                    </li>

                                    <!-- Team Settings -->
                                    <DropdownLink :href="route('teams.show', $page.props.user.current_team)" :active="route().current('teams.show', $page.props.user.current_team)">
                                        Team Settings
                                    </DropdownLink>

                                    <DropdownLink v-if="$page.props.jetstream.canCreateTeams" :href="route('teams.create')" :active="route().current('teams.create')">
                                        Create New Team
                                    </DropdownLink>

                                    <li><hr class="dropdown-divider"></li>

                                    <!-- Team Switcher -->
                                    <li>
                                        <div class="dropdown-header">Switch Teams</div>
                                    </li>

                                    <template v-for="team in $page.props.user.all_teams" :key="team.id">
                                        <form @submit.prevent="switchToTeam(team)">
                                            <DropdownLink as="button">
                                                <div class="d-flex align-items-center">
                                                    <i v-if="team.id == $page.props.user.current_team_id" class="bi bi-check-circle me-2 text-success"></i>
                                                    {{ team.name }}
                                                </div>
                                            </DropdownLink>
                                        </form>
                                    </template>
                                </template>
                            </template>
                        </Dropdown>

                        <!-- Settings Dropdown -->
                        <Dropdown align="end">
                            <template #trigger>
                                <img
                                    v-if="$page.props.jetstream.managesProfilePhotos"
                                    class="rounded-circle pb-1"
                                    style="width:2rem; height:2rem"
                                    :src="$page.props.user.profile_photo_url"
                                    :alt="$page.props.user.name"
                                />
                                <div v-else class="d-flex justify-content-between align-items-center">
                                    {{ $page.props.user.name }}
                                    <i class="bi bi-chevron-down ms-2 pt-1"></i>
                                </div>
                            </template>

                            <template #content>
                                <!-- Account Management -->
                                <li>
                                    <div class="dropdown-header">Manage Account</div>
                                </li>

                                <DropdownLink :href="route('profile.show')" :active="route().current('profile.show')">
                                    Profile
                                </DropdownLink>

                                <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')" :active="route().current('api-tokens.index')">
                                    API Tokens
                                </DropdownLink>

                                <li><hr class="dropdown-divider"></li>

                                <!-- Authentication -->
                                <form @submit.prevent="logout">
                                    <DropdownLink as="button">
                                        Log Out
                                    </DropdownLink>
                                </form>
                            </template>
                        </Dropdown>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <header class="d-flex py-4 bg-white shadow-sm border-bottom">
            <div class="container">
                <slot name="header" />
            </div>
        </header>

        <!-- Page Content -->
        <main class="container my-5">
            <slot />
        </main>
    </div>
</template>
