<?php

use App\Http\Controllers\SaleController;
use App\Http\Controllers\SellerController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => redirect('seller'));

Route::middleware([
    
    config('jetstream.auth_session'), 'auth:sanctum', 'verified'

])->group(function () {
    
    Route::group(['prefix' => 'seller'], function() {
        // Salva um novo vendedor
        Route::post('/', [ SellerController::class, 'store' ])->name('seller.store');
        // Retorna a tela de listagem de vendedores
        Route::get('/', [ SellerController::class, 'index' ])->name('seller');
        // Retorna a tela de criação de um novo vendedor
        Route::get('/create', [ SellerController::class, 'create' ])->name('seller.create');
        // Retorna as vendas do vendedor
        Route::get('/{seller}/sale', [ SaleController::class, 'index' ])->name('sale');
    });

    Route::group(['prefix' => 'sale'], function() {
        // Salva uma nova venda
        Route::post('/', [ SaleController::class, 'store' ])->name('sale.store');
    });

});
