<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'showLoginForm'])->name('front.login');



Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Auth::routes();
Route::prefix('admin')->group(function () {

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    // Registration Routes...
    // Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    // Route::post('register', [RegisterController::class, 'register']);

    //Password Confirm
    Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

    // Password Reset Routes...
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::prefix('/my-profile')->group(function () {
        Route::get('/', [ProfileController::class . 'index'])->name('profile');
        Route::post('/', [ProfileController::class, 'index'])->name('profile');
    });

    Route::resource('products', 'ProductController');
    Route::get('/delete_products/{product_id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::resource('users', 'UserController');
    Route::get('/delete_users/{user_id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::resource('orders', 'OrderController');
    Route::get('/delete_orders/{order_id}', [OrderController::class, 'destroy'])->name('orders.destroy');
});



Route::fallback(function () {
    return view('layouts.front.page-not-found');
});
