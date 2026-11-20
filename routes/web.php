<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

// Route Admin Produk
Route::prefix('admin')->name('admin.products.')->group(function () {
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('edit');
Route::put('/products/{id}', [AdminProductController::class, 'update'])->name('update');
    Route::get('/products', [AdminProductController::class, 'index'])->name('index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('store');
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('destroy');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/produk/{slug}', [HomeController::class, 'show'])->name('product.show');