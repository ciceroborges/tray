<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\Seller;
use App\Services\Contracts\ISaleService;

class SaleController extends Controller
{
    protected $service;
    
    /**
     * Setup.
     */
    public function __construct(ISaleService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Seller $seller)
    {   
        $sales = $this->service->findAllBySeller($seller->id);

        if(!$sales) abort(500);

        return inertia('Sale/Index', compact('seller', 'sales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleRequest $request)
    {
        $data = $request->validated();

        $sale = $this->service->create($data);

        if(!$sale) abort(500);

        $seller = $data['seller_id'];

        return redirect()->route('sale', compact('seller'));
    }
}
