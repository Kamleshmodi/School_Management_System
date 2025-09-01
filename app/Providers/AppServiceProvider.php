<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() : void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() : void
    {
        Paginator::useBootstrap();
        

        Schema::defaultStringLength(191);

        // Set default timezone
        date_default_timezone_set(config('app.timezone'));
    
        // Override Carbon's default format globally
        Carbon::macro('formatted', function () {
            return $this->format('h:i A'); // 12-hour format with AM/PM
        });
    }

}
