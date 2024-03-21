<?php

namespace App\Providers;

use App\Repositories\Contracts\ISellerRepository;
use App\Repositories\SellerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ISellerRepository::class, SellerRepository::class);
        // $this->app->bind(ISaleRepository::class, SaleRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
