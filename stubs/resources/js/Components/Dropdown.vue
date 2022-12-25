<script setup>
import { computed } from 'vue';

const props = defineProps({
    align: {
        type: String,
    },
});
</script>

<template>
    <li class="nav-item dropdown">
        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <slot name="trigger" />
        </a>
        <ul :class="['dropdown-menu', {'dropdown-menu-end': align == 'end'}]" style="margin: 0">
            <slot name="content" />
        </ul>
    </li>
</template>
