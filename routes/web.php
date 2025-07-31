<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TimbangangController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\GajiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Bulk delete route - MUST be before resource route
    Route::delete('/timbangans/bulk-delete', [TimbangangController::class, 'bulkDelete'])->name('timbangans.bulk-delete');
    
    // Resource routes untuk admin rotan
    Route::resource('karyawans', KaryawanController::class);
    Route::resource('timbangans', TimbangangController::class);
    Route::resource('absensis', AbsensiController::class);
    Route::resource('gajis', GajiController::class);
    
    // Export routes
    Route::get('karyawans-export', [KaryawanController::class, 'export'])->name('karyawans.export');
    Route::get('gajis-export', [GajiController::class, 'export'])->name('gajis.export');
    Route::get('absensis-export', [AbsensiController::class, 'export'])->name('absensis.export');
});

require __DIR__.'/auth.php';