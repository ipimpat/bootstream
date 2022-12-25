<script setup>
defineProps({
    on: Boolean,
});
</script>

<template>
    <div>
        <transition leave-active-class="fade">
            <div v-show="on" class="text-muted">
                <slot />
            </div>
        </transition>
    </div>
</template>
