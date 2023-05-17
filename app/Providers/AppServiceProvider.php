<?php

namespace App\Providers;

use App\Interfaces\IAgricultorService;
use App\Interfaces\IAssociacaoService;
use App\Interfaces\IOrganizacaoService;
use App\Interfaces\IUserService;
use App\Services\AgricultorService;
use App\Services\AssociacaoService;
use App\Services\OrganizacaoService;
use App\Services\UserService;
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
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IAssociacaoService::class, AssociacaoService::class);
        $this->app->bind(IOrganizacaoService::class, OrganizacaoService::class);
    }
}
