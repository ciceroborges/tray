<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers = Seller::get();

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
