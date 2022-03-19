<?php

use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Person\OrderController as PersonOrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);
Route::controller(MainController::class)->group(function (){
    Route::get('locale/{locale}','changeLocale' )->name('locale');
    Route::get('currency/{currencyCode}','changeCurrency' )->name('currency');
});

Route::get('/logout',[LoginController::class, 'logout'] )->name('get-logout');
Route::post('/register',[RegisterController::class, 'register']);
Route::middleware(['set_locale'])->group(function () {
    Route::get('reset', 'ResetController@reset')->name('reset');

    Route::middleware(['auth'])->group(function () {
        Route::group([
            'prefix' => 'person',
            'namespace' => 'Person',
            'as' => 'person.',
        ], function () {
            Route::get('/orders',[PersonOrderController::class, 'index'])->name('orders.index');
            Route::get('/orders/{order}',[PersonOrderController::class, 'show'] )->name('orders.show');
        });

        Route::group([
            'namespace' => 'Admin',
            'prefix' => 'admin',
        ], function () {
            Route::group(['middleware' => 'is_admin'], function () {
                Route::get('/orders',[OrderController::class, 'index'])->name('home');
                Route::get('/orders/{order}',[OrderController::class, 'show'])->name('orders.show');
            });

            Route::resource('categories', 'CategoryController');
            Route::resource('products', 'ProductController');
            Route::resource('products/{product}/skus', 'SkuController');
            Route::resource('properties', 'PropertyController');
            Route::resource('merchants', 'MerchantController');
            Route::get('merchant/{merchant}/update_token',[MerchantController::class, 'updateToken'] )->name('merchants.update_token');
            Route::resource('coupons', 'CouponController');
            Route::resource('properties/{property}/property-options', 'PropertyOptionController');
        });
    });

    Route::controller(MainController::class)->group(function (){
        Route::get('/', 'index')->name('index');
        Route::get('/categories', 'categories')->name('categories');
        Route::post('subscription/{skus}', 'subscribe')->name('subscription');
    });


    Route::group(['prefix' => 'basket'], function () {
        Route::post('/add/{skus}',[BasketController::class, 'basketAdd'])->name('basket-add');

        Route::group([
            'middleware' => 'basket_not_empty',
        ], function () {
            Route::controller(BasketController::class)->group(function (){
                Route::get('/','basket')->name('basket');
                Route::get('/place', 'basketPlace')->name('basket-place');
                Route::post('/remove/{skus}', 'basketRemove')->name('basket-remove');
                Route::post('/place', 'basketConfirm')->name('basket-confirm');
                Route::post('coupon', 'setCoupon')->name('set-coupon');
            });
        });
    });
    Route::controller(MainController::class)->group(function(){
        Route::get('/{category}', 'category')->name('category');
        Route::get('/{category}/{product}/{skus}', 'sku')->name('sku');
    });
});

// use App\Http\Controllers\Admin\MerchantController;
// use App\Http\Controllers\Admin\OrderController as AdminOrderController;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\BasketController;
// use App\Http\Controllers\MainController;
// use App\Http\Controllers\Person\OrderController;
// use App\Http\Controllers\ResetController;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
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

// Auth::routes([
//     'reset' => false,
//     'confirm' => false,
//     'verify' => false,
// ]);
// Route::controller(MainController::class)->group(function () {
//     Route::get('locale/{locale}', 'changeLocale')->name('locale');
//     Route::get('currency/{currencyCode}', 'changeCurrency')->name('currency');
// });
// // Route::get('locale/{locale}', 'MainController@changeLocale')->name('locale');
// // Route::get('currency/{currencyCode}', 'MainController@changeCurrency')->name('currency');
// Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');
// Route::post('/register', [RegisterController::class, 'register']);
// Route::middleware(['set_locale'])->group(function () {
//     Route::get('reset', [ResetController::class, 'reset'])->name('reset');

//     Route::middleware(['auth'])->group(function () {
//         Route::group(['prefix' => 'person', 'namespace' => 'Person', 'as' => 'person.',], function () {
//             Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
//             Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
//         });

//         Route::group([
//             'namespace' => 'Admin',
//             'prefix' => 'admin',
//         ], function () {
//             Route::group(['middleware' => 'is_admin'], function () {
//                 Route::get('/orders', [AdminOrderController::class, 'index'])->name('home');
//                 Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
//             });

//             Route::resource('categories', 'CategoryController');
//             Route::resource('products', 'ProductController');
//             Route::resource('products/{product}/skus', 'SkuController');
//             Route::resource('properties', 'PropertyController');
//             Route::resource('merchants', 'MerchantController');
//             Route::get('merchant/{merchant}/update_token', [MerchantController::class, 'updateToken'])->name('merchants.update_token');
//             Route::resource('coupons', 'CouponController');
//             Route::resource('properties/{property}/property-options', 'PropertyOptionController');
//         });
//     });

//     Route::controller(MainController::class)->group(function () {
//         Route::get('/{category}', 'MainController@category')->name('category');
//         Route::get('/{category}/{product}/{skus}', 'MainController@sku')->name('sku');
//         Route::get('/', 'index')->name('index');
//         Route::get('/categories', 'categories')->name('categories');
//         Route::post('subscription/{skus}', 'subscribe')->name('subscription');
//     });

//     Route::group(['prefix' => 'basket'], function () {
//         Route::post('/add/{skus}', 'BasketController@basketAdd')->name('basket-add');

//         Route::group([
//             'middleware' => 'basket_not_empty',
//         ], function () {
//             Route::get('/', 'BasketController@basket')->name('basket');
//             Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
//             Route::post('/remove/{skus}', 'BasketController@basketRemove')->name('basket-remove');
//             Route::post('/place', 'BasketController@basketConfirm')->name('basket-confirm');
//             Route::post('coupon', 'BasketController@setCoupon')->name('set-coupon');
//         });
//     });

 
// });
