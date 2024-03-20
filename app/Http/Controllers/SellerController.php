<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerRequest;
use App\Models\Seller;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers = Seller::with('sales')->orderByDesc('id')->get();

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
    public function store(SellerRequest $request)
    {
        Seller::create($request->validated());

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        Seller::destroy($seller->id);

        return $this->index();
    }
}
