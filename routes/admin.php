<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::prefix('admin')->as('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');

        Route::resource('slider', SliderController::class)->except('show');
        Route::put('categories/{category}/status', [CategoryController::class, 'changeStatus']);
        Route::resource('categories', CategoryController::class);
    });
