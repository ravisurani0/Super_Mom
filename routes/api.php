<?php

use App\Http\Controllers\Api\ApiCartController;
use App\Http\Controllers\Api\ApiUserAuthController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/register', [ApiUserAuthController::class, 'register']);
Route::post('/login', [ApiUserAuthController::class, 'login']);


Route::group(['middleware' => ['auth:api']], function () {

    Route::get('order/{id}', [ApiOrderController::class, 'show'])->name('order.show');

    Route::post('generate-sellerId/{user}', [ApiUserAuthController::class, 'generateSellerId'])->name('generate_sellerId.generateSellerId');
    Route::get('products/{product}', [ApiProductController::class, 'show'])->name('products.show');
    // Route::post('products', [ApiProductController::class, 'store'])->name('products.store');
    // Route::put('products', [ApiProductController::class, 'update'])->name('products.update');
    // Route::delete('products', [ApiProductController::class, 'destroy'])->name('products.destroy');

    Route::post('cart', [ApiCartController::class, 'store'])->name('cart.store');
    Route::get('cart/{cart}', [ApiCartController::class, 'show'])->name('cart.show');
    Route::put('cart/{cart}', [ApiCartController::class, 'update'])->name('cart.update');

    Route::get('user_orders/{userid}', [ApiOrderController::class, 'userOrders'])->name('order.userOrders');
    Route::get('order/{id}', [ApiOrderController::class, 'show'])->name('order.show');
    Route::post('order', [ApiOrderController::class, 'store'])->name('order.store');
});



Route::fallback(function () {
    return json_encode(404);
});
