<?php

use App\Http\Controllers\Api\ApiCartController;
use App\Http\Controllers\Api\ApiCategoryController;
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

Route::get('reset-password', [ApiUserAuthController::class, 'resetPassword'])->name('user.resetPassword');
Route::post('update-password', [ApiUserAuthController::class, 'updatePassword'])->name('user.updatePassword');
Route::post('resend-otp', [ApiUserAuthController::class, 'resendOTP'])->name('user.resendOtp');

Route::post('/otp-verify', [ApiUserAuthController::class, 'otpVerify']);

Route::group(['middleware' => ['auth:api']], function () {

    // Route::post('/otp-verify', [ApiUserAuthController::class, 'otpVerify']);
    Route::post('generate-sellerId', [ApiUserAuthController::class, 'generateSellerId'])->name('generate_sellerId.generateSellerId');
    Route::get('profile', [ApiUserAuthController::class, 'profile'])->name('user.profile');

    Route::get('products', [ApiProductController::class, 'index'])->name('products.index');
    Route::get('products/{product}', [ApiProductController::class, 'show'])->name('products.show');
    Route::get('category/products/{category}', [ApiProductController::class, 'categoryProducts'])->name('category.products');

    Route::get('category', [ApiCategoryController::class, 'index'])->name('category.index');
    Route::get('category/{category}', [ApiCategoryController::class, 'show'])->name('category.show');

    Route::get('cart', [ApiCartController::class, 'show'])->name('cart.show');
    Route::post('cart', [ApiCartController::class, 'store'])->name('cart.store');
    Route::put('cart', [ApiCartController::class, 'update'])->name('cart.update');

    Route::get('user_orders', [ApiOrderController::class, 'userOrders'])->name('order.userOrders');
    Route::get('order/{id}', [ApiOrderController::class, 'show'])->name('order.show');
    Route::post('order', [ApiOrderController::class, 'store'])->name('order.store');
});



Route::fallback(function () {
    return json_encode(404);
});
