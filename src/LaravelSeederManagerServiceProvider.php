<?php

namespace Curicows\LaravelSeederManager;

use Illuminate\Support\ServiceProvider;

class LaravelSeederManagerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-seeder-manager.php'),
            ], 'config');

            // $this->commands([]); TODO: Add commands
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-seeder-manager');

        $this->app->singleton('laravel-seeder-manager', function () {
            return new LaravelSeederManager;
        });
    }
}
