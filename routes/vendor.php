<?php

use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::prefix('vendor')->as('vendor.')
    ->middleware(['auth', 'role:vendor'])
    ->group(function () {
    Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
});
