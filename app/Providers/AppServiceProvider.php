<?php

namespace App\Providers;

use App\ExternalServices\ExternalServicesContract;
use App\ExternalServices\ViesService;
use App\Repositories\VatBdRepository;
use App\Repositories\VatRepositoryContract;
use App\Services\VatService;
use App\Services\VatServiceContract;
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
        $this->app->bind(VatServiceContract::class, VatService::class);
        $this->app->bind(VatRepositoryContract::class, VatBdRepository::class);
        $this->app->bind(ExternalServicesContract::class, ViesService::class);
    }
}
