<?php

namespace Ipimpat\Bootstream\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bootstream:install {--teams : Indicates if team support should be installed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Bootstream components and resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        // Install ...
        $this->install();
    }

    /**
     * Install the Bootstrap scaffolding into the application.
     *
     * @return void
     */
    protected function install(): void
    {
        // Update NPM packages...
        $this->updateNodePackages(function ($packages) {
            // Remove TrailwindCSS
            unset($packages['tailwindcss']);
            unset($packages['@tailwindcss/forms']);
            unset($packages['@tailwindcss/typography']);

            // Add Bootstrap
            return [
                '@popperjs/core' => '^2.11.6',
                'bootstrap' => '^5.2.3',
                'bootstrap-icons' => '^1.10.2',
                'lodash' => '^4.17.19',
                'sass' => '^1.57.1',
            ] + $packages;
        });

        // Remove TailwindCSS configuration...
        if ((new Filesystem)->exists(base_path('tailwind.config.js'))) {
            (new Filesystem)->delete(base_path('tailwind.config.js'));
        }

        // Remove CSS directory
        (new Filesystem)->deleteDirectory(resource_path('css'));

        // Build configurations..
        copy(__DIR__.'/../../stubs/postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__.'/../../stubs/vite.config.js', base_path('vite.config.js'));

        // Blade views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        copy(__DIR__.'/../../stubs/resources/views/app.blade.php', resource_path('views/app.blade.php'));

        // Sass ...
        (new Filesystem)->ensureDirectoryExists(resource_path('sass'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/sass', resource_path('sass'));

        // Javascript ...
        (new Filesystem)->ensureDirectoryExists(resource_path('js'));
        copy(__DIR__.'/../../stubs/resources/js/bootstrap.js', resource_path('js/bootstrap.js'));
        copy(__DIR__.'/../../stubs/resources/js/app.js', resource_path('js/app.js'));

        // Components
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Components'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/js/Components', resource_path('js/Components'));

        // Layouts
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Layouts'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/js/Layouts', resource_path('js/Layouts'));

        // Pages ...
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages'));
        copy(__DIR__.'/../../stubs/resources/js/Pages/Dashboard.vue', resource_path('js/Pages/Dashboard.vue'));
        copy(__DIR__.'/../../stubs/resources/js/Pages/PrivacyPolicy.vue', resource_path('js/Pages/PrivacyPolicy.vue'));
        copy(__DIR__.'/../../stubs/resources/js/Pages/TermsOfService.vue', resource_path('js/Pages/TermsOfService.vue'));
        copy(__DIR__.'/../../stubs/resources/js/Pages/Welcome.vue', resource_path('js/Pages/Welcome.vue'));

        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages/API'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/js/Pages/API', resource_path('js/Pages/API'));

        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages/Auth'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/js/Pages/Auth', resource_path('js/Pages/Auth'));

        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages/Profile'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/js/Pages/Profile', resource_path('js/Pages/Profile'));

        // Install with Teams support ...
        if ($this->option('teams')) {
            (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages/Teams'));
            (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/js/Pages/Teams', resource_path('js/Pages/Teams'));
        }

        $this->line('');
        $this->info('Bootstrap 5.2 scaffolding for Inertia installed successfully.');
    }

    /**
     * Update the "package.json" file.
     *
     * @param  callable  $callback
     * @param  bool      $dev
     * @return void
     */
    protected static function updateNodePackages(callable $callback, $dev = true): void
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }

}
