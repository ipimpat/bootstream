<script setup>
import { computed, ref, watch } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

const show = ref(true);
const style = computed(() => usePage().props.value.jetstream.flash?.bannerStyle || 'success');
const message = computed(() => usePage().props.value.jetstream.flash?.banner || '');

watch(message, async () => {
  show.value = true;
});
</script>

<template>
    <div>
        <div
            v-if="show && message"
            class="alert rounded-0 border-start-0 border-end-0 border-top-0 border-bottom-1"
            :class="{ 'alert-success': style == 'success', 'alert-danger': style == 'danger' }"
            role="alert"
        >
            <div class="container">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div class="d-flex align-items-center">
                        <span class="d-flex align-items-center p-2 rounded bg-opacity-10" :class="{ 'bg-success': style == 'success', 'bg-danger': style == 'danger' }">
                            <svg
                                v-if="style == 'success'"
                                class="bi bi-check-circle"
                                style="width: 1.25rem; height: 1.25rem;"
                                fill="currentColor"
                                viewBox="0 0 16 16"
                            >
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                            </svg>

                            <svg
                                v-if="style == 'danger'"
                                class="bi bi-exclamation-triangle"
                                style="width: 1.25rem; height: 1.25rem;"
                                fill="currentColor"
                                viewBox="0 0 16 16"
                            >
                                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                            </svg>
                        </span>

                        <p class="ms-3 mb-0 text-truncate">
                            {{ message }}
                        </p>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
</template>
