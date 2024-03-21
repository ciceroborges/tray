<?php

namespace App\Services\Contracts;

use App\Models\Sale;
use App\Repositories\Contracts\ISaleRepository;
use Illuminate\Database\Eloquent\Collection;

interface ISaleService
{
    /**
     * Setup...
     */
    public function __construct(ISaleRepository $repository, ISellerService $sellerService);

    /**
     * Store a newly created resource in storage.
     * 
     * @param array $data
     * @return \App\Models\User
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

    /**
     * Find all resources from storage.
     * 
     * @param int $value
     * @return int
     */
    public function getCommission(int $value): int;
}
