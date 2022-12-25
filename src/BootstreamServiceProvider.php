<?php

namespace Ipimpat\Bootstream;

use Illuminate\Support\ServiceProvider;

class BootstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\InstallCommand::class,
            ]);
        }
    }
}
