<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
// use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Schedule::command('app:update-all-directories')->weeklyOn(0, '00:00');