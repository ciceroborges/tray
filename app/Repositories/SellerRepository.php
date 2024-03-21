<?php

namespace App\Repositories;

use App\Models\Seller;
use App\Repositories\Contracts\ISellerRepository;
use Illuminate\Database\Eloquent\Collection;

class SellerRepository implements ISellerRepository
{
    protected $model;
    
    protected $relations;
     
    /**
     * Setup ...
     */
    public function __construct(Seller $model)
    {
        $this->model = $model;
        $this->relations = ['sales'];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $data
     * @return \App\Models\Seller    
     */
    public function create(array $data): Seller
    {
        return $this->model->create($data);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }

    /**
     * Find the resource by id from storage.
     * 
     * @param int $id
     * @return \App\Models\Seller|null
     */
    public function findById(int $id): Seller|null
    {
        return $this->model->find($id);
    }

    /**
     * Find all resources from storage.
     * 
     * @param string $order. Default is desc.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll(string $order = 'desc'): Collection
    {
        return $this->model->with($this->relations)->orderBy('id', $order)->get();
    }
}
