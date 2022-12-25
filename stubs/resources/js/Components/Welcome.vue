<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div class="row justify-content-center my-5">
        <div class="col-md-12">
            <div class="card shadow bg-light">
                <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                    <div class="m-4">
                        <div>
                            <ApplicationLogo class="d-block w-auto" style="height:3rem;" />
                        </div>

                        <div class="h3 my-4">
                            Welcome to your Jetstream application!
                        </div>

                        <div class="text-muted fs-5">
                            Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                            to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                            you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                            ecosystem to be a breath of fresh air. We hope you love it.
                        </div>
                    </div>
                </div>

                <div class="row g-0">
                    <div class="col-md-6 pe-md-0">
                        <div class="card-body border-end-md border-bottom p-4 h-100">
                            <div class="d-flex flex-column mb-3">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <svg class="bi bi-book text-muted" style="width:2rem; height:2rem;" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                        </svg>
                                        <a href="https://laravel.com/docs" class="h5 ms-3 text-decoration-none text-dark">Documentation</a>
                                    </div>
                                </div>

                                <div class="ms-4 ps-4">
                                    <div class="text-muted mt-2">
                                        Laravel has wonderful documentation covering every aspect of the framework. Whether you're new to the framework or have previous experience, we recommend reading all of the documentation from beginning to end.
                                    </div>

                                    <div>
                                        <a href="https://laravel.com/docs" class="text-decoration-none">
                                            <div class="mt-3 d-flex align-content-center text-primary">
                                                <div>Explore the documentation</div>

                                                <div class="ms-1 text-primary">
                                                    <svg class="bi bi-arrow-right" style="width:1rem; height:1rem;"  fill="currentColor" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 ps-md-0">
                        <div class="card-body border-bottom p-4 h-100">
                            <div class="d-flex flex-column mb-3">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <svg class="bi bi-camera text-muted" style="width:2rem; height:2rem;" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                                            <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                        </svg>
                                        <a href="https://laracasts.com" class="h5 ms-3 text-decoration-none text-dark">Laracasts</a>
                                    </div>
                                </div>
                                <div class="ms-4 ps-4">
                                    <div class="text-muted mt-2">
                                        Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                    </div>

                                    <a href="https://laracasts.com" class="text-decoration-none">
                                        <div class="mt-3 d-flex align-content-center text-primary">
                                            <div>Start watching Laracasts</div>

                                            <div class="ms-1 text-primary">
                                                <svg class="bi bi-arrow-right" style="width:1rem; height:1rem;"  fill="currentColor" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 pe-md-0">
                       <div class="card-body border-end-md p-4 h-100">
                            <div class="d-flex flex-column mb-3">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <svg class="bi bi-bootstrap text-muted" style="width:2rem; height:2rem;" fill="currentColor" viewBox="0 0 16 16">
                                           <path d="M5.062 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762V8.162h1.822c1.236 0 1.887.463 1.887 1.348 0 .896-.627 1.377-1.811 1.377H6.375z"/>
                                           <path d="M0 4a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4zm4-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3H4z"/>
                                        </svg>
                                        <a href="https://getbootstrap.com/" class="h5 ms-3 text-decoration-none text-dark">Bootstrap</a>
                                    </div>
                                </div>

                                <div class="ms-4 ps-4">
                                    <div class="text-muted mt-2">
                                        Build fast, responsive sites with Bootstrap, which is a powerful, extensible, and feature-packed frontend toolkit. Build and customize with Sass, utilize prebuilt grid system and components, and bring projects to life with powerful JavaScript plugins.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 ps-md-0">
                        <div class="card-body border-top border-top-md-0 p-4 h-100">
                            <div class="d-flex flex-column mb-3">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <svg class="bi bi-lock text-muted" style="width:2rem; height:2rem;" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                                        </svg>
                                        <span class="h5 ms-3 text-decoration-none text-dark">Authentication</span>
                                    </div>
                                </div>
                                <div class="ms-4 ps-4">
                                    <div class="text-muted mt-2">
                                        Authentication and registration views are included with Laravel Jetstream, as well as support for user email verification and resetting forgotten passwords. So, you're free to get started what matters most: building your application.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
