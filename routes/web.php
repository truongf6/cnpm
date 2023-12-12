<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController as ClientCartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\ContactController as ClientContactController;
use App\Http\Controllers\Client\ForgotPasswordController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Client\PostController as ClientPostController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\Client\LoginController as ClientLoginController;
use App\Http\Controllers\Client\LogoutController;
use App\Http\Controllers\Client\MyController;
use App\Http\Controllers\Client\RegisterController as ClientRegisterController;
use App\Http\Middleware\Authentication;
use App\Http\Middleware\AuthorizationAdmin;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->name('admin.')->middleware([Authentication::class, AuthorizationAdmin::class])->group(function() {

    Route::get('/index', [HomeController::class, 'index'])->name('home.index');
    Route::prefix('/order')->group(function() {
        Route::get('/hoa-don-chi-tiet/{orderid}', [HomeController::class, 'showOrder'])->name('home.showOrder');
        Route::get('/accept/{id}', [HomeController::class, 'accept'])->name('order.accept');
        Route::get('/cancel/{id}', [HomeController::class, 'cancel'])->name('order.cancel');
        Route::get('/success/{id}', [HomeController::class, 'success'])->name('order.success');
    });

    Route::prefix('categories')->controller(CategoryController::class)->name('categories.')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{category}', 'edit')->name('edit');
        Route::put('/update/{category}', 'update')->name('update');
        Route::delete('/destroy/{category}', 'destroy')->name('destroy');

    });

    Route::prefix('menus')->controller(MenuController::class)->name('menus.')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{menu}', 'edit')->name('edit');
        Route::put('/update/{menu}', 'update')->name('update');
        Route::delete('/destroy/{menu}', 'destroy')->name('destroy');
    });

    Route::prefix('posts')->controller(PostController::class)->name('posts.')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{post}', 'edit')->name('edit');
        Route::put('/update/{post}', 'update')->name('update');
        Route::delete('/destroy/{post}', 'destroy')->name('destroy');
    });

    Route::prefix('products')->controller(ProductController::class)->name('products.')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{product}', 'edit')->name('edit');
        Route::put('/update/{product}', 'update')->name('update');
        Route::delete('/destroy/{product}', 'destroy')->name('destroy');
    });

    Route::prefix('sliders')->controller(SliderController::class)->name('sliders.')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{slider}', 'edit')->name('edit');
        Route::put('/update/{slider}', 'update')->name('update');
        Route::delete('/destroy/{slider}', 'destroy')->name('destroy');
    });

    Route::prefix('users')->controller(UserController::class)->name('users.')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{user}', 'edit')->name('edit');
        Route::put('/update/{user}', 'update')->name('update');
        Route::delete('/destroy/{user}', 'destroy')->name('destroy');
    });

});

Route::name('client.')->group(function() {

    Route::get('/', [ClientHomeController::class, 'index'])->name('home.index');

    Route::controller(ShopController::class)->name('shop.')->group(function () {
        Route::get('/cua-hang', 'index')->name('index');
        Route::get('/product-{product_id}/{slug}', 'show')->name('show');
    });

    Route::controller(ClientPostController::class)->name('post.')->group(function () {
        Route::get('/bai-viet', 'index')->name('index');
        Route::get('/bai-viet-{post_id}/{slug}', 'show')->name('show');
    });

    Route::controller(ClientContactController::class)->name('contact.')->group(function () {
        Route::get('/lien-he', 'index')->name('index');
        Route::get('/store', 'store')->name('store');
    });

    Route::controller(ClientCartController::class)->name('cart.')->group(function () {
        Route::get('/gio-hang', 'index')->name('index');
        Route::post('/them-gio-hang', 'addToCart')->name('addToCart');
        Route::get('/xoa-san-pham-gio-hang/{productID}', 'removeProduct')->name('removeProduct');
    });

    Route::controller(ClientLoginController::class)->name('login.')->group(function () {
        Route::get('/dang-nhap', 'index')->name('index');
        Route::post('/dang-nhap', 'processLogin')->name('processLogin');
    });

    Route::controller(ClientRegisterController::class)->name('register.')->group(function () {
        Route::get('/dang-ky', 'index')->name('index');
        Route::post('/dang-ky', 'store')->name('store');
    });

    Route::controller(LogoutController::class)->name('logout.')->group(function () {
        Route::get('/dang-xuat', 'index')->name('index');
    });

    Route::controller(CheckoutController::class)->name('checkout.')->middleware(Authentication::class)->group(function () {
        Route::get('/thanh-toan', 'index')->name('index');
        Route::post('/thanh-toan-cod', 'processCheckoutCOD')->name('processCheckoutCOD');
        Route::post('/thanh-toan-vnpay', 'processCheckoutVNPay')->name('processCheckoutVNPay');
        Route::get('/ket-qua-thanh-toan', 'checkoutResult')->name('checkoutResult');
    });

    Route::controller(ForgotPasswordController::class)->name('forgotPassword.')->group(function () {
        Route::get('/quen-mat-khau', 'index')->name('index');
        Route::post('/xu-ly-quen-mat-khau', 'sendMail')->name('sendMail');
        Route::get('/dat-lai-mat-khau/{token}', 'resetPassword')->name('resetPassword');
        Route::post('/dat-lai-mat-khau', 'handleResetPassword')->name('handleResetPassword');
    });


    Route::controller(MyController::class)->name('my.')->middleware(Authentication::class)->group(function () {
        Route::get('/lich-su-don-hang', 'index')->name('index');
    });
});
