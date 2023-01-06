<?php

namespace App\Providers;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('layouts.master', function ($view) {
            $view->with('settings', Setting::first());
        });
        view()->composer('layouts.auth', function ($view) {
            $view->with('settings', Setting::first());
        });
        view()->composer('auth.login', function ($view) {
            $view->with('settings', Setting::first());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
