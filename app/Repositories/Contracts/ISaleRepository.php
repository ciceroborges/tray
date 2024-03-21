<?php

namespace App\Repositories\Contracts;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Collection;

interface ISaleRepository
{
    /**
     * Setup ...
     */
    public function __construct(Sale $model);

    /**
     * Store a newly created resource in storage.
     *
     * @param array $data
     * @return \App\Models\Sale    
     */
    public function create(array $data): Sale;

    /**
     * Find all resources from storage.
     * 
     * @param int $sellerID
     * @param string $order. Default is desc.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAllBySeller(int $sellerID, string $order = 'desc'): Collection;
}
