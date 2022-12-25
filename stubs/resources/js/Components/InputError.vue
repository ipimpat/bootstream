<script setup>
defineProps({
    message: String,
});
</script>

<template>
    <div v-show="message" class="invalid-feedback">
        {{ message }}
    </div>
</template>
