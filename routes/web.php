<?php

use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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




// Auth::routes();

// Admin Routes
Route::prefix('admin')->group(function () {

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
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

    // Logedin Admin 
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::prefix('/my-profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('profile');
            Route::post('/', [ProfileController::class, 'update'])->name('update.profile');
        });

        Route::resource('categorys', 'CategoryController');
        Route::get('/delete-category/{product_id}', [CategoryController::class, 'destroy'])->name('categorys.destroy');
        Route::get('/remove-category-image/{product_id}', [CategoryController::class, 'removeCategoryImage'])->name('remove-product-image');

        Route::resource('roles', 'RoleController');
        Route::get('/delete-role/{product_id}', [RoleController::class, 'destroy'])->name('roles.destroy');

        Route::resource('products', 'ProductController');
        Route::get('/delete-products/{product_id}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('/remove-product-image/{image_id}/{product_id}', [ProductController::class, 'removeProductImage'])->name('remove-product-image');
        Route::get('/import-product', [ProductController::class, 'importProduct'])->name('products.import');
        Route::post('/import-product', [ProductController::class, 'importProductList'])->name('products.import');



        Route::resource('users', 'UserController');
        // Route::get('/users-admin', [UserController::class, 'adminList'])->name('users.users.admin');
        Route::get('/users-dealer', [UserController::class, 'dealerList'])->name('users.users.dealer');
        Route::get('/delete-users/{user_id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::post('/approve-seller-id', [UserController::class, 'approveSellerId'])->name('users.approve_seller_id');

        Route::resource('orders', 'OrderController');
        Route::get('/order-pdf/{order_id}', [OrderController::class, 'orderPdf'])->name('orders.pdf');
        Route::get('/delete-orders/{order_id}', [OrderController::class, 'destroy'])->name('orders.destroy');

        Route::resource('page', 'PagesController');
        Route::get('/delete-page/{page_id}', [PagesController::class, 'destroy'])->name('page.destroy');

        Route::resource('cms', 'CmsController');
        Route::get('/delete-cms/{cms_id}', [CmsController::class, 'destroy'])->name('cms.destroy');

        Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact_us.index');
        Route::get('/contact-us/{id}', [ContactUsController::class, 'show'])->name('contact_us.show');

        Route::get('/contact-info', [CmsController::class, 'ContactCms'])->name('contactCms');

        Route::get('/product_upload', function () {
            return view('welcome');
        });
        Route::post('/product_upload', [Controller::class, 'productUpload']);
    });
});

// Front Routes
Route::get('/', [CustomerController::class, 'indexPage'])->name('indexPage');
// Route::get('/category/{category_slug}', [CustomerController::class, 'categoryDetails'])->name('category_products');
// Route::get('/product/{product_slug}', [CustomerController::class, 'productDetails'])->name('product_details');
Route::get('/product/{category_slug}', [CustomerController::class, 'categoryDetails'])->name('product_category');
Route::get('/product/{category_slug}/{product_slug}', [CustomerController::class, 'productDetails'])->name('product_details');
Route::get('/privacy-policy', [CustomerController::class, 'privacyPolicy'])->name('privacy_policy');
Route::get('/terms-condition', [CustomerController::class, 'termsCondition'])->name('terms_condition');
Route::get('/contact', [CustomerController::class, 'contact'])->name('contact');
Route::post('/contact-us', [CustomerController::class, 'contactUs'])->name('contact_us');
Route::get('/about-us', [CustomerController::class, 'aboutUs'])->name('about_us');
Route::get('products', [CustomerController::class, 'AllProductsView'])->name('all_products');


Route::fallback(function () {
    return view('layouts.front.page-not-found');
});
