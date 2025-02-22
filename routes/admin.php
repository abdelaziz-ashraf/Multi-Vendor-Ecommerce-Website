<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubCategoryController;
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

        Route::put('sub-categories/{sub_category}/status', [SubCategoryController::class, 'changeStatus']);
        Route::resource('sub-categories', SubCategoryController::class);
        Route::get('get-subcategories', [SubCategoryController::class, 'getSubCategories'])->name('getSubCategories');

        Route::put('child-categories/{child_category}/status', [ChildCategoryController::class, 'changeStatus']);
        Route::resource('child-categories', ChildCategoryController::class)->except('show');

    });
