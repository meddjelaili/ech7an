<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarchentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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





Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    
    Auth::routes();
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index']);

    // TopUp Url
  
    Route::group(['prefix' => 'buy/topUp'], function() {
        Route::get('/{slug}', [TopUpController::class, 'index'])->name('buy.topup');
        Route::post('/buy_now', [TopUpController::class, 'buyNow'])->name('buy.topup.buy_now');
        Route::post('/{slug}', [TopUpController::class, 'buy'])->name('buy.topup');
        Route::get('buy_now/return/{order_id}', [TopUpController::class, 'payseraReturn']);
    });

    // Card Url
    Route::group(['prefix' => 'buy/card'], function() {
        Route::get('/{slug}', [CardController::class, 'index'])->name('buy.card');
        Route::post('/buy_now', [CardController::class, 'buyNow'])->name('buy.card.buy_now');
        Route::post('/{slug}', [CardController::class, 'buy'])->name('buy.card');
        Route::get('/buy_now/return/{order_id}', [CardController::class, 'payseraReturn']);
    });



    // Currency Url
    Route::get('/currency/change/', [CurrencyController::class, 'changeCurrency']);

    // Page Url
    Route::group(['prefix' => 'page'], function() {
        Route::get('/topups', [PageController::class, 'topups'])->name('page.topups');
        Route::get('/cards', [PageController::class, 'cards'])->name('page.cards');
        Route::get('/search', [PageController::class, 'search'])->name('page.search');
        Route::get('/{slug}', [PageController::class, 'page'])->name('page');
    });
    

    Route::group(['middleware' => 'auth'], function() {

            // Wallet Url
            Route::group(['prefix' => 'wallet'], function() {        
                Route::get('/', [WalletController::class, 'index'])->name('wallet.index');
                Route::get('/{method}', [WalletController::class, 'chargeIndex'])->name('wallet.charge.index');
                Route::post('/charge', [WalletController::class, 'charge'])->name('wallet.charge');
                Route::get('/charge/return/{transactionId}', [WalletController::class, 'payseraReturn']);
            });
            // Merchant Url
                Route::get('/merchant', [MarchentController::class, 'index'])->name('merchant.index');
                Route::post('/merchant', [MarchentController::class, 'store'])->name('merchant.store');
            // Order Url 
                Route::get('/order', [OrderController::class, 'index'])->name('order.index');
            // Profile 
                Route::get('/profile', [HomeController::class, 'profileIndex'])->name('profile.index');
    });
});

