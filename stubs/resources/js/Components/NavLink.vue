<script setup>
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});
</script>

<template>
    <li class="nav-item">
        <Link :href="href" class="nav-link" :class="{'active': active}">
            <slot />
        </Link>
    </li>
</template>
