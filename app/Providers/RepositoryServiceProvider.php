<?php

namespace App\Providers;

use App\Repositories\Contracts\ISaleRepository;
use App\Repositories\Contracts\ISellerRepository;
use App\Repositories\Contracts\IUserRepository;
use App\Repositories\SaleRepository;
use App\Repositories\SellerRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ISellerRepository::class, SellerRepository::class);
        $this->app->bind(ISaleRepository::class, SaleRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
