<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

Route::get('/', [StoreController::class, 'index'])->name('store.index');
Route::get('/checkout/{product}', [StoreController::class, 'checkout'])->name('store.checkout');
Route::post('/checkout/{product}', [StoreController::class, 'processCheckout'])->name('store.processCheckout');
Route::get('/pokemon', [StoreController::class, 'pokemon'])->name('store.pokemon');
