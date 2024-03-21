<?php

namespace App\Observers;

use App\Events\SaleCreated;
use App\Models\Sale;
use App\Services\Contracts\IUserService;

class SaleObserver
{

    protected $userService;

    /**
     * Setup ...
     */
    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Handle the sale "created" event.
     *
     * @param  \App\Sale  $invoice
     * @return void
     */
    public function created(Sale $sale)
    {
        SaleCreated::dispatch($sale);
    }
}
