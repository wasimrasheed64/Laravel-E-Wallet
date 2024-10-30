<?php
namespace Wasimrasheed\EWallet;
use Illuminate\Support\ServiceProvider;

/**
 * Class EWalletServiceProvider
 *
 * This service provider is responsible for registering the EWallet package into a Laravel application.
 * It handles loading the necessary resources (like database migrations) and binds the `EWallet` class
 * into the Laravel service container, making it accessible throughout the application.
 */
class EWalletServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * The `boot` method is called after all service providers have been registered.
     * Here, it loads the package's database migrations, making them available to the main application.
     *
     * @return void
     */
    public function boot(): void
    {
        // Load the package's migrations from the specified directory
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        if($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php'=>config_path('EWalletConfig.php'),
            ],'config');
        }
    }

    /**
     * Register any application services.
     *
     * The `register` method binds the EWallet class to the application's service container,
     * allowing it to be resolved automatically by Laravel dependency injection.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php','ewallet');
        // Bind the EWallet class to the app container for easy access via dependency injection
        $this->app->bind('EWallet', function () {
            return new EWallet();
        });
    }
}
