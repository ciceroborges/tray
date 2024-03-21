<?php

namespace App\Services;

use App\Models\Sale;
use App\Notifications\Sale as SaleReport;
use App\Notifications\SalesDailyReport;
use App\Repositories\Contracts\IUserRepository;
use App\Services\Contracts\ISaleService;
use App\Services\Contracts\IUserService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class UserService implements IUserService
{
    protected $repository;
    
    protected $saleService;
    /**
     * Setup.
     */
    public function __construct(IUserRepository $repository, ISaleService $saleService)
    {
        $this->repository = $repository;
        $this->saleService = $saleService;
    }
    
     /**
     * notify all users.
     * 
     * @param Sale $sale.
     * @return bool
     */
    public function notify(?Sale $sale = null) : bool 
    {   
        $prefix = isset($sale) ? '\Sale': '\Sales';

        $class = "\App\Notifications" . $prefix . "Report";

        if($prefix == '\Sales') {
            $sales = $this->saleService->findAll(
                Carbon::now('America/Sao_Paulo')->toDateString()
            );
        }
        
        $users = $this->repository->findAll();

        $notification = new $class($sale ?? $sales);

        Notification::send($users, $notification);

        return true;
    }
}
