<?php

namespace App\Services\Contracts;

use App\Models\Sale;
use App\Repositories\Contracts\IUserRepository;

interface IUserService
{
    /**
     * Setup...
     */
    public function __construct(IUserRepository $repository, ISaleService $saleService);
    
    /**
     * notify all users.
     * 
     * @param ?Sale $sale.
     * @return bool
     */
    public function notify(?Sale $sale = null): bool;
}
