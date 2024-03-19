<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => redirect('sellers'));

Route::middleware([
    
    config('jetstream.auth_session'), 'auth:sanctum', 'verified'

])->group(function () {
    
    Route::get('/sales/{email}', function (string $email) { 
        

        // dd()
        // dd($email);

        $seller = [
            'nome'  => 'Cícero Borges',
            'email' => $email,
        ];

        $sales[] = array_merge($seller, [
            'id'    => '2',
            'comissao' => '850',
            'valor'    => '10000',
            'data'     => now()
        ]);

        $sales[] = array_merge($seller, [
            'id'    => '1',
            'comissao' => '1700',
            'valor'    => '20000',
            'data'     => now()
        ]);

        return Inertia::render('Sales/Index', [
          'seller' => $seller,
          'sales'  => $sales,  
        ]);
    
    })->name('sales');
    
    Route::get('/sellers', fn () => Inertia::render('Sellers/Index'))->name('sellers');
});
