<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
});

const createTeam = () => {
    form.post(route('teams.store'), {
        errorBag: 'createTeam',
        preserveScroll: true,
    });
};
</script>

<template>
    <FormSection @submitted="createTeam">
        <template #title>
            Team Details
        </template>

        <template #description>
            Create a new team to collaborate with others on projects.
        </template>

        <template #form>
            <div class="col-md-9">
                <InputLabel value="Team Owner" />

                <div class="d-flex align-items-center mt-2">
                    <img class="rounded-circle" style="width: 3rem; height: 3rem;" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">

                    <div class="ms-3 lh-sm">
                        <div class="lead">{{ $page.props.user.name }}</div>
                        <div class="text-muted">
                            {{ $page.props.user.email }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <InputLabel for="name" value="Team Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    :class="{'is-invalid': Boolean(form.errors.name)}"
                    autofocus
                />
                <InputError :message="form.errors.name" />
            </div>
        </template>

        <template #actions>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Create
            </PrimaryButton>
        </template>
    </FormSection>
</template>
