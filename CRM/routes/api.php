<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::post('/products/details/{product}', [ProductController::class, 'storeDetails']);
Route::put('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);


Route::post('/category', [CategoryController::class, 'store']);
Route::post('/category/{category}/{product}', [CategoryController::class, 'addProduct']);
Route::get('/category/{category}', [CategoryController::class, 'getProducts']);


Route::post('/orders', [OrderController::class, 'store']);
Route::delete('/orders/{order}', [OrderController::class, 'destroy']);
Route::get('/orders/{order}', [OrderController::class, 'show']);
Route::get('/orders', [OrderController::class, 'index']);
Route::put('/orders/{order}/attach/{product}', [OrderController::class, 'attach']);
Route::delete('/orders/{order}/detach/{product}', [OrderController::class, 'detach']);


Route::get('/user/orders', [UserController::class, 'getOrders'])->middleware('assert.user');
