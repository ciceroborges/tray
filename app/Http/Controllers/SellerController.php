<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerRequest;
use App\Models\Seller;
use App\Services\Contracts\ISellerService;

class SellerController extends Controller
{
    protected $service;
    
    /**
     * Setup.
     */
    public function __construct(ISellerService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers = $this->service->findAll();

        if(!$sellers) abort(500);
    
        return inertia('Seller/Index', compact('sellers'));
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
        $data = $request->validated();

        $seller = $this->service->create($data);

        if(!$seller) abort(500);

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        if(!$this->service->delete($seller->id)) {
            abort(500);
        }

        return $this->index();
    }
}
