<?php

namespace Ipimpat\Bootstream\Tests;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Ipimpat\Bootstream\BootstreamServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $filesystem;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->filesystem = new Filesystem;
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        if ($this->filesystem->isDirectory(resource_path('js'))) {
            $this->filesystem->cleanDirectory(resource_path('js'));
        }

        if ($this->filesystem->isDirectory(resource_path('sass'))) {
            $this->filesystem->cleanDirectory(resource_path('sass'));
        }

        if ($this->filesystem->isDirectory(resource_path('views'))) {
            $this->filesystem->cleanDirectory(resource_path('views'));
        }

        if (! $this->filesystem->isDirectory(resource_path('css'))) {
            $this->filesystem->makeDirectory(resource_path('css'));
        }
    }

    /**
     * Get package providers.
     *
     * @param  Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            BootstreamServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  Application   $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        // perform environment setup
    }
}