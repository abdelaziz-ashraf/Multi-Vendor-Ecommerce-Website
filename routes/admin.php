<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});
