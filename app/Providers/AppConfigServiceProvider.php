<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(any_class, function ($app) {
            return new AnyClass($app);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        app()->setLocale(
            setting('locale') 
            ?? 
            config('app.locale')
        );
    
        config([
            'app.timezone' => 
                setting('timezone') 
                ?? 
                config('app.timezone')
        ]);
    }
}
