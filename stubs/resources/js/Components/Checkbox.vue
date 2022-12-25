<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: [Array, Boolean],
        default: false,
    },
    value: {
        type: String,
        default: null,
    },
});

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>
<script>
export default {
  inheritAttrs: false
}
</script>

<template>
    <div class="form-check">
        <input
            v-bind="$attrs"
            v-model="proxyChecked"
            type="checkbox"
            :value="value"
            class="form-check-input"
        >
        <slot />
    </div>
</template>
