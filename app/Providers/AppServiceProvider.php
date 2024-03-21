<?php

namespace App\Providers;

use App\Services\Contracts\ISaleService;
use App\Services\Contracts\ISellerService;
use App\Services\SaleService;
use App\Services\SellerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ISellerService::class, SellerService::class);
        $this->app->bind(ISaleService::class, SaleService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
