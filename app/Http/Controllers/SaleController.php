<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $email)
    {
        $seller = [
            'nome'  => $email,
            'email' => $email,
        ];
        
        $sales[] = array_merge($seller, [
            'id'       =>  2,
            'comissao' => '850',
            'valor'    => '10000',
            'data'     => now()
        ]);

        $sales[] = array_merge($seller, [
            'id'       => 1,
            'comissao' => '1700',
            'valor'    => '20000',
            'data'     => now()
        ]);

        return inertia('Sale/Index', [
            'seller' => $seller, 
            'sales'  => $sales
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
}
