<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => redirect('sales'));

Route::middleware([
    
    config('jetstream.auth_session'), 'auth:sanctum', 'verified'

])->group(function () {
    
    Route::get('/sales', fn () => Inertia::render('Sales'))->name('sales');
    
    Route::get('/sellers', fn () => Inertia::render('Sellers'))->name('sellers');
});
