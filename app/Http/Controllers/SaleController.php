<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\Sale;
use App\Models\Seller;

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
    public function store(SaleRequest $request)
    {
        $seller = Seller::find($request->seller_id);

        $tax = (8.5 / 100); // Taxa de comissão em decimal;

        $commission = (int) round($request->value * $tax);

        $data = [
            'seller_id'  => $request->seller_id,
            'name'       => $seller->name,
            'email'      => $seller->email,
            'commission' => $commission,
            'value'      => $request->value,
        ];

        Sale::create($data);

        return $this->index($seller);
    }
}
