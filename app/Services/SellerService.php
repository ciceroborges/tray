<?php

namespace App\Services;

use App\Models\Seller;
use App\Repositories\Contracts\ISellerRepository;
use App\Services\Contracts\ISellerService;
use Illuminate\Database\Eloquent\Collection;

class SellerService implements ISellerService
{
    protected $repository;
    
    /**
     * Setup.
     */
    public function __construct(ISellerRepository $repository)
    {
        $this->repository = $repository;
    }

     /**
      * Store a newly created resource in storage.
      * 
      * @param array $data
      * @return \App\Models\Seller
      */
     public function create(Array $data): Seller
     {
         return $this->repository->create($data);
     }
 
     /**
      * Remove the specified resource from storage.
      * 
      * @param int $id
      * @return bool
      */
     public function delete(int $id): bool
     {
         return $this->repository->delete($id);
     }
 
     /**
      * Find all resources from storage.
      * 
      * @return \Illuminate\Database\Eloquent\Collection
      */
     public function findAll(string $order = 'desc'): Collection
     {
         return $this->repository->findAll($order);
     }
}
