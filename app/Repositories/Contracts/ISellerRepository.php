<?php

namespace App\Repositories\Contracts;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Collection;

interface ISellerRepository
{
    /**
     * Setup ...
     */
    public function __construct(Seller $model);

    /**
     * Store a newly created resource in storage.
     *
     * @param array $data
     * @return \App\Models\Seller    
     */
    public function create(array $data): Seller;

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * Find the resource by id from storage.
     * 
     * @param int $id
     * @return \App\Models\Seller|null
     */
    public function findById(int $id): Seller|null;
    
    /**
     * Find all resources from storage.
     * 
     * @param string $order. Default is desc.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll(string $order = 'desc'): Collection;
}
