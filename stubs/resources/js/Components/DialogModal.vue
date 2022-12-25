<script setup>
import Modal from './Modal.vue';

const emit = defineEmits(['close']);

defineProps({
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

const close = () => {
    emit('close');
};
</script>

<template>
    <Modal
        :show="show"
        :max-width="maxWidth"
        :closeable="closeable"
        :backdrop="backdrop"
        :focus="focus"
        :keyboard="keyboard"
        @close="close"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <slot name="title" />
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <slot name="content" />
            </div>
            <div class="modal-footer">
                <slot name="footer" />
            </div>
        </div>
    </Modal>
</template>
