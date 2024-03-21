<?php

namespace App\Services\Contracts;

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
     * @param array $sale.
     * @return bool
     */
    public function notify(array $sale = []): bool;
}
