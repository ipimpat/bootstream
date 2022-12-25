<script setup>
import SectionTitle from './SectionTitle.vue';
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
            <div class="card shadow-sm">
                <div class="card-body row gy-3">
                    <slot name="content" />
                </div>
            </div>
        </div>
    </div>
</template>
