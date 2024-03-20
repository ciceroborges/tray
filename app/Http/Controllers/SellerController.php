<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers[] = [
            'id'    => 1,
            'nome'  => 'Cícero Borges',
            'email' => 'ciceropborges@gmail.com',
        ];

        $sellers[] = [
            'id'    => 2,
            'nome'  => 'Luiz da Silva',
            'email' => 'luizdasilva@gmail.com',
        ];

        $sellers[] = [
            'id'    => 3,
            'nome'  => 'João da Silva',
            'email' => 'zsilva@gmail.com',
        ];

        return inertia('Seller/Index', ['sellers' => $sellers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Seller/Form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
}
