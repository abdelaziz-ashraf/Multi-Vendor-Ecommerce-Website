<?php

use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\ProductImageGalleryController;
use App\Http\Controllers\Vendor\ProductVariantController;
use App\Http\Controllers\Vendor\ProfileController;
use App\Http\Controllers\VendorController;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('vendor')->as('vendor.')
    ->middleware(['auth', 'role:vendor'])
    ->group(function () {
    Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'changePassword'])->name('password.update');

        Route::get('subcategories', function (Request $request) {
            $subcategories = SubCategory::where('category_id', $request->get('id'))
                ->where('status', 'active')->get();
            return response()->json($subcategories);
        })->name('get_subcategories');

        Route::get('categories/childcategories', function (Request $request) {
            $childcategories = \App\Models\ChildCategory::where('sub_category_id', $request->get('id'))
                ->where('status', 'active')->get();
            return response()->json($childcategories);
        })->name('childcategories');

        Route::put('products/{product}/status', [ProductController::class, 'changeStatus'])->name('products.status');
        Route::resource('products/image-gallery', ProductImageGalleryController::class)->only('index', 'store', 'destroy');
        Route::resource('products', ProductController::class);

        Route::put('products-variants/{products_variant}/status', [ProductVariantController::class, 'changeStatus'])->name('products.variant.status');
        Route::resource('products-variants', ProductVariantController::class);
    });
