<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        Paginator::useBootstrap();

        if(Schema::hasTable('settings')) {
            $settings = Settings::first();
		    View::share('settings', $settings);
        }
    }
}
