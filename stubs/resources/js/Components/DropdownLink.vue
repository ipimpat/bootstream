<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: String,
    as: String,
    active: Boolean,
});
</script>

<template>
    <li>
        <button v-if="as == 'button'" type="submit" class="dropdown-item">
            <slot />
        </button>

        <a v-else-if="as =='a'" :href="href" class="dropdown-item">
            <slot />
        </a>

        <Link v-else :href="href" :class="['dropdown-item', {'active': active}]">
            <slot />
        </Link>
    </li>
</template>
