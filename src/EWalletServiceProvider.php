<?php

namespace Wasimrasheed\EWallet;
use Illuminate\Support\ServiceProvider;
class EWalletServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'../database/migrations');
        $this->publishes([$this->basePath('config/EWallet.php') => config_path('EWallet.php'),
        ],'EWallet.php');
    }

    public function register(): void
    {
        $this->app->bind('EWallet', function($app){
            return new EWallet;
        });
        $this->mergeConfigFrom($this->basePath('/config/EWallet.php'), 'EWallet');
    }

    public function basePath($path = ''): string
    {
        return __DIR__.'../'.$path;
    }

}