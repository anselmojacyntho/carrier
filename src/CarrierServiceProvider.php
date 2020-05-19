<?php

namespace AnselmoJacyntho\Carrier;

use Illuminate\Support\ServiceProvider;

class CarrierServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'anselmojacyntho');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'anselmojacyntho');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/carrier.php', 'carrier');

        // Register the service the package provides.
        $this->app->singleton('carrier', function ($app) {
            return new Carrier;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['carrier'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/carrier.php' => config_path('carrier.php'),
        ], 'carrier.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/anselmojacyntho'),
        ], 'carrier.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/anselmojacyntho'),
        ], 'carrier.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/anselmojacyntho'),
        ], 'carrier.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
