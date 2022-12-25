<template>
    <div class="px-3 px-md-0">
        <div class="d-flex justify-content-between">
            <div>
                <h3 class="h5">
                    <slot name="title" />
                </h3>

                <p class="mt-1 mb-0 text-muted">
                    <slot name="description" />
                </p>
            </div>

            <div class="px-3 px-md-0">
                <slot name="aside" />
            </div>
        </div>
    </div>
</template>
