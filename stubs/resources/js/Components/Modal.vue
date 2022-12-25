<script setup>
import { Modal } from 'bootstrap';
import { computed, onMounted, onBeforeUnmount, watch, ref } from 'vue';

const props = defineProps({
    show: {
        default: false,
    },
    maxWidth: {
        type: String,
    },
    closeable: {
        type: Boolean,
        default: true,
    },
    backdrop: {
        type: [Boolean, String],
        default: true,
    },
    focus: {
        type: Boolean,
        default: true,
    },
    keyboard: {
        type: Boolean,
        default: true,
    },
});

const emit = defineEmits(['close']);
const root = ref(null);
let modal = null;

watch(() => props.show, () => {
    props.show ? modal.show() : modal.hide();
});

const close = () => {
    if (props.closeable) {
        emit('close');
    }
};

onMounted(() => {
    modal = new Modal(root.value, {
        backdrop: props.backdrop,
        focus: props.focus,
        keyboard: props.keyboard,
    });

    root.value.addEventListener('hidden.bs.modal', close);
});

onBeforeUnmount(() => {
    root.value.removeEventListener('hidden.bs.modal', close);

    modal.dispose();
    modal = null;
});

const maxWidthClass = computed(() => {
    if (!props.maxWidth) {
        return null;
    }

    return {
        'sm': 'modal-sm',
        'lg': 'modal-lg',
        'xl': 'modal-xl',
        'fullscreen': 'modal-fullscreen',
        'fullscreen-sm-down': 'modal-fullscreen-sm-down',
        'fullscreen-md-down': 'modal-fullscreen-md-down',
        'fullscreen-lg-down': 'modal-fullscreen-lg-down',
        'fullscreen-xl-down': 'modal-fullscreen-xl-down',
        'fullscreen-xxl-down': 'modal-fullscreen-xxl-down',
    }[props.maxWidth];
});
</script>

<template>
    <teleport to="body">
        <div ref="root" class="modal fade" tabindex="-1">
            <div class="modal-dialog" :class="maxWidthClass">
                <slot v-if="show" />
            </div>
        </div>
    </teleport>
</template>
