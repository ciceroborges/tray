<?php

use App\Services\Contracts\IUserService;
use Illuminate\Support\Facades\Schedule;

// Notifica uma vez por dia todas as vendas aos usuários
Schedule::call(fn (IUserService $service) => $service->notify())->dailyAt('21:00');