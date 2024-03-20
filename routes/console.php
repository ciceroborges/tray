<?php

use App\Models\User;
use App\Notifications\SaleReport;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {
    Notification::sendNow(User::all(), new SaleReport());
})->dailyAt('00:00');