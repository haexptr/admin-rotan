<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Jobs\GenerateDailyAttendance;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Schedule for daily attendance generation
Schedule::job(new GenerateDailyAttendance())
    ->dailyAt('07:00')
    ->name('generate-daily-attendance')
    ->withoutOverlapping();

// Alternative: Only weekdays (Monday-Friday)
// Schedule::job(new GenerateDailyAttendance())
//     ->weekdays()
//     ->at('07:00')
//     ->name('generate-weekday-attendance')
//     ->withoutOverlapping();