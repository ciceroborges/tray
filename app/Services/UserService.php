<?php

namespace App\Services;

use App\Notifications\Sale;
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
     * @param string $type.
     * @return bool
     */
    public function notify(array $sale = []) : bool 
    {   
        $class = "\App\Notifications";

        $hasSale = !empty($sale);

        $class .= $hasSale ? '\Sale' : '\SalesDailyReport';

        if(!$hasSale) {
            $date = Carbon::now('America/Sao_Paulo')->toDateString();
            $data = $this->saleService->findAll($date)->toArray();
        }
        
        $users = $this->repository->findAll();

        $notification = new $class($data);

        Notification::send($users, $notification);

        return true;
    }
}
