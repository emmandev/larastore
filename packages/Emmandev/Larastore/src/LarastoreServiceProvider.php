<?php

namespace Emmandev\Larastore;

use Illuminate\Support\ServiceProvider;

class LarastoreServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'emmandev');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'emmandev');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/larastore.php' => config_path('larastore.php'),
            ], 'larastore.config');

            // Publishing the models.
            $this->publishes([
                __DIR__.'/Models' => app_path('Models'),
            ], 'larastore.models');

            $this->publishes([
                __DIR__.'/Traits' => app_path('Http/Traits'),
            ], 'larastore.traits');

            // Publishing the factories.
            $this->publishes([
                __DIR__.'/../database/factories' => database_path('factories'),
            ], 'larastore.factories');

            // Publishing the seeds.
            $this->publishes([
                __DIR__.'/../database/seeds' => database_path('seeds'),
            ], 'larastore.seeds');

            // Publishing the api resources.
            $this->publishes([
                __DIR__.'/Resources' => app_path('Http/Resources'),
            ], 'larastore.resources');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/emmandev'),
            ], 'larastore.views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/emmandev'),
            ], 'larastore.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/emmandev'),
            ], 'larastore.views');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/larastore.php', 'larastore');

        // Register the service the package provides.
        $this->app->singleton('larastore', function ($app) {
            return new Larastore;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['larastore'];
    }
}
