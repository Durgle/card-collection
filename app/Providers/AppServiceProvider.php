<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadMigration();
        Vite::prefetch(concurrency: 3);
    }

    /**
     * Load all migration files from the migrations directory.
     */
    private function loadMigration()
    {
        $migrationPath = database_path('migrations');
        $directories = glob($migrationPath . "/*", GLOB_ONLYDIR);
        $paths = array_merge([$migrationPath], $directories);
        $this->loadMigrationsFrom($paths);
    }
}
