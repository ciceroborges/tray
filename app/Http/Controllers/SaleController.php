<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Seller $seller)
    {   
        $sales = $seller->sales()->orderByDesc('id')->get();

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
