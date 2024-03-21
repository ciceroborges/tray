<?php

namespace App\Listeners;

use App\Events\SaleCreated;
use App\Services\Contracts\IUserService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifySale implements ShouldQueue
{
    protected $userService;
    /**
     * Create the event listener.
     */
    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Handle the event.
     */
    public function handle(SaleCreated $event): void
    {
        $this->userService->notify($event->sale->toArray());
    }
}
