<?php

namespace App\Providers;

use App\Interfaces\IAgricultorService;
use App\Services\AgricultorService;
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
        $this->app->bind(IAgricultorService::class, AgricultorService::class);
    }
}
