<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Repositories\Contracts\ISaleRepository;
use Illuminate\Database\Eloquent\Collection;

class SaleRepository implements ISaleRepository
{
    protected $model;
    
    protected $relations;
     
    /**
     * Setup ...
     */
    public function __construct(Sale $model)
    {
        $this->model = $model;
        $this->relations = ['seller'];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $data
     * @return \App\Models\Sale    
     */
    public function create(array $data): Sale
    {
        return $this->model->create($data);
    }

    /**
     * Find all resources from storage.
     * 
     * @param array $filter
     * @param string $order. Default is desc.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll(string $date = '', string $order = 'desc'): Collection
    {   
        $query = $this->model->with($this->relations);

        $query->when(!empty($date), function ($query) use ($date){
            $query->whereDate('created_at', $date);
        });

        return $query->orderBy('id', $order)->get();
    }

    /**
     * Find all resources from a seller.
     * 
     * @param int $sellerID
     * @param string $order. Default is desc.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAllBySeller(int $sellerID, string $order = 'desc'): Collection
    {
        return $this->model->with($this->relations)
            ->where('seller_id', $sellerID)
            ->orderBy('id', $order)
            ->get();
    }
}
