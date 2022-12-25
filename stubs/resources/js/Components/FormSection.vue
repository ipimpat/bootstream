<script setup>
import { computed, useSlots } from 'vue';
import SectionTitle from './SectionTitle.vue';

defineEmits(['submitted']);

const hasActions = computed(() => !! useSlots().actions);
</script>

<template>
    <div class="row">
        <div class="col-md-4">
            <SectionTitle>
                <template #title>
                    <slot name="title" />
                </template>
                <template #description>
                    <slot name="description" />
                </template>
            </SectionTitle>
        </div>

        <div class="col-md-8">
            <form @submit.prevent="$emit('submitted')">
                <div class="card shadow-sm">
                    <div class="card-body row gy-3">
                        <slot name="form" />
                    </div>

                    <div v-if="hasActions" class="card-footer d-flex justify-content-end align-items-center">
                        <slot name="actions" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
