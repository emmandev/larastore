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
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/larastore.php' => config_path('larastore.php'),
            ], 'larastore.config');

            $this->publishes([
                __DIR__.'/Models' => app_path('Models'),
            ], 'larastore.models');

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
