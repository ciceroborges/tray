<?php

namespace App\Services;

use App\Models\Sale;
use App\Repositories\Contracts\ISaleRepository;
use App\Services\Contracts\ISaleService;
use App\Services\Contracts\ISellerService;
use Illuminate\Database\Eloquent\Collection;

class SaleService implements ISaleService
{
    protected $repository;
    
    protected $sellerService;
    /**
     * Setup.
     */
    public function __construct(ISaleRepository $repository, ISellerService $sellerService)
    {
        $this->repository = $repository;
        $this->sellerService = $sellerService;
    }

     /**
      * Store a newly created resource in storage.
      * 
      * @param array $data
      * @return \App\Models\Sale
      */
     public function create(Array $data): Sale
     {
        $seller = $this->sellerService->findByID($data['seller_id']);

        if(!$seller) abort(500);

        $sale = [
            'seller_id'  => $seller->id,
            'name'       => $seller->name,
            'email'      => $seller->email,
            'commission' => $this->getCommission($data['value']),
            'value'      => $data['value'],
        ];

        return $this->repository->create($sale);
     }
 
     /**
      * Find all resources from storage.
      * 
      * @return \Illuminate\Database\Eloquent\Collection
      */
      public function findAll(string $date = '', string $order = 'desc'): Collection
      {
          return $this->repository->findAll($date, $order);
      }

     /**
      * Find all resources from storage.
      * 
      * @return \Illuminate\Database\Eloquent\Collection
      */
     public function findAllBySeller(int $sellerID, string $order = 'desc'): Collection
     {
         return $this->repository->findAllBySeller($sellerID, $order);
     }

     /**
      * Find all resources from storage.
      * 
      * @param int $value
      * @return int
      */
      public function getCommission(int $value, float $fee = null): int
      {
          $fee = $fee ?? config('commission.fee.decimal');

          return (int) round($value * $fee);
      }
}
