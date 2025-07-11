<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MonitorController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('/monitors')->group(function () {
        Route::get('new', [MonitorController::class, 'new'])->name('monitors.new');
        Route::post('new', [MonitorController::class, 'create'])->name('monitors.create');
        Route::post('delete', [MonitorController::class, 'delete'])->name('monitors.delete');
        Route::get('run-ondemand', [MonitorController::class, 'runMonitorsOnDemand'])->name('monitors.run-ondemand');
    });

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
