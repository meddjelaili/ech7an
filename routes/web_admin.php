<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\CardTypeController;
use App\Http\Controllers\Admin\TopUpController;
use App\Http\Controllers\Admin\CodeController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TopUpAmountController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WalletController;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Admin Routes
|--------------------------------------------------------------------------
|
| this route prefix is 'admin/' and name is 'admin.' ... #please show RouteServiceProvider
|
*/

    // if has any  permsission
        Route::get('/', [AdminController::class, 'index'])->middleware('permission:Game Card|Codes|Direct Top Up|Game Top Up|Top Up Amount|Wallets|Merchants|Card/New Orders|Card/Failed Orders|Card/Confermed Orders|Card/Failed Payment|Top Up/New Orders|Top Up/Failed Orders|Top Up/Confermed Orders|Top Up/Failed Payment|Localisation|Users|Pages|Configurations');

    //  Card Url
    Route::group([
                'prefix' => 'card', 'as' => 'card.',
                 'middleware' => ['permission:Game Card']
                ], function() {
        Route::get('/', [CardController::class, 'index'])->name('index');
        Route::get('/create', [CardController::class, 'create'])->name('create');
        Route::post('/create', [CardController::class, 'store'])->name('store');
        Route::get('/status/{id}', [CardController::class, 'changeStatus'])->name('status');
        Route::get('/edit/{id}', [CardController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CardController::class, 'update'])->name('update');
        Route::delete('/{id}', [CardController::class, 'destroy'])->name('destroy');
    });

        // Card Types Url
        Route::group([
            'prefix' => 'cardType',
             'as' => 'cardType.',
            'middleware' => ['permission:Codes']
        ], function() {
            Route::get('/status/{id}', [CardTypeController::class, 'changeStatus'])->name('status');
            Route::delete('/{id}', [CardTypeController::class, 'destroy'])->name('destroy');
        });

        // Codes Url
        Route::group([
            'prefix' => 'codes',
             'as' => 'code.',
            'middleware' => ['permission:Codes']
        ], function() {
            Route::get('/', [CodeController::class, 'index'])->name('index');
            Route::get('/{id}', [CodeController::class, 'show'])->name('show');
            Route::post('/{id}', [CodeController::class, 'store'])->name('store');
            Route::delete('/{id}', [CodeController::class, 'destroy'])->name('destroy');
        });
        // Card Order Url
        Route::group(['prefix' => 'card/order'], function() {
            Route::get('/', [CardController::class, 'order'])->name('card.order')->middleware('permission:Card/New Orders');
            Route::get('/failed', [CardController::class, 'orderFailed'])->name('card.failed.order')->middleware('permission:Card/Failed Orders');
            Route::get('/confirmed', [CardController::class, 'orderConfermed'])->name('card.confermed.order')->middleware('permission:Card/Confermed Orders');
            Route::get('/show/{order_id}', [CardController::class, 'orderShow'])->name('card.order.show')->middleware('permission:Card/Confermed Orders|Card/New Orders|Card/Failed Orders|Card/Failed Payment');
            Route::get('/payment', [CardController::class, 'paymentFaild'])->name('card.failed.payment')->middleware('permission:Card/Failed Payment');
        });

    // Top Up Url
    Route::group([
        'prefix' => 'topup',
        'as' => 'topUp.',
        'middleware' => ['permission:Game Top Up']
    ], function() {
        Route::get('/', [TopUpController::class, 'index'])->name('index');
        Route::get('/create', [TopUpController::class, 'create'])->name('create');
        Route::post('/create', [TopUpController::class, 'store'])->name('store');
        Route::get('/status/{id}', [TopUpController::class, 'changeStatus'])->name('status');
        Route::get('/edit/{id}', [TopUpController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [TopUpController::class, 'update'])->name('update');
        Route::delete('/{id}', [TopUpController::class, 'destroy'])->name('destroy');
    });
        // Top Up Amount Url
        Route::group([
            'prefix' => 'topup', 'as' => 'topUp.amount.',
            'middleware' => ['permission:Top Up Amount']
        ], function() {
            Route::get('/amounts', [TopUpAmountController::class, 'index'])->name('index');
            Route::get('/amount/status/{id}', [TopUpAmountController::class, 'changeStatus'])->name('status');
            Route::post('/amount/stock/{id}', [TopUpAmountController::class, 'stock'])->name('stock');
            Route::delete('/amount/{id}', [TopUpAmountController::class, 'destroy'])->name('destroy');
        });
        // Top Up Order Url
        Route::group(['prefix' => 'topup/order'], function() {
            Route::get('/', [TopUpController::class, 'order'])->name('topUp.order')->middleware('permission:Top Up/New Orders');
            Route::get('/failed', [TopUpController::class, 'orderFailed'])->name('topup.failed.order')->middleware('permission:Top Up/Failed Orders');
            Route::get('/confirmed', [TopUpController::class, 'orderConfermed'])->name('topup.confermed.order')->middleware('permission:Top Up/Confermed Orders');
            Route::get('/show/{order_id}', [TopUpController::class, 'orderShow'])->name('topup.order.show')->middleware('permission:Top Up/Confermed Orders|Top Up/New Orders|Top Up/Failed Orders|Top Up/Failed Payment');
            Route::get('/payment', [TopUpController::class, 'paymentFaild'])->name('topup.failed.payment')->middleware('permission:Top Up/Failed Payment');
        });

    // Currency Url
    Route::group([
        'prefix' => 'currency', 'as' => 'currency.',
        'middleware' => ['permission:Localisation']
    ], function() {
        Route::get('/', [CurrencyController::class, 'index'])->name('index');
        Route::post('/', [CurrencyController::class, 'store'])->name('store');
        Route::get('/default', [CurrencyController::class, 'setDefault'])->name('default');
    });

   // Wallet Url  
   Route::group([
       'prefix' => 'wallet',
        'as' => 'wallet.',
       'middleware' => ['permission:Wallets']
    ], function() {
        Route::get('/', [WalletController::class, 'index'])->name('index');
        Route::get('/confirmed', [WalletController::class, 'confirmedOrder'])->name('confermed.order');
        Route::get('/rejected', [WalletController::class, 'rejectedOrder'])->name('rejected.order');
        Route::get('/confirme/{id}', [WalletController::class, 'confirme'])->name('confirme');
        Route::get('/unconfirme/{id}', [WalletController::class, 'unconfirme'])->name('unconfirme');
        Route::get('/pdf/{pdf}', [WalletController::class, 'pdfDownload'])->name('pdf');
        Route::get('/img/{img}', [WalletController::class, 'imgDownload'])->name('img');
    });

 // Merchant Url 
    Route::group([
        'prefix' => 'merchant',
         'as' => 'merchant.',
        'middleware' => ['permission:Merchants']
    ], function() {
        Route::get('/', [MerchantController::class, 'order'])->name('order');
        Route::get('/all', [MerchantController::class, 'allMerchant'])->name('all');
        Route::get('/upgrade/{id}', [MerchantController::class, 'upgrade'])->name('upgrade');
        Route::get('/delete/{id}', [MerchantController::class, 'delete'])->name('delete');
    });
    // Order Url 
    Route::group([
        'prefix' => 'order', 'as' => 'order.',
        'middleware' => [
            'permission:Card/New Orders|Card/Failed Orders|Card/Confermed Orders|Card/Failed Payment|Top Up/New Orders|Top Up/Failed Orders|Top Up/Confermed Orders|Top Up/Failed Payment|'
            ]
    ], function() {
        Route::get('/pdf/{pdf}', [OrderController::class, 'pdfDownload'])->name('pdf');
        Route::get('/img/{img}', [OrderController::class, 'imgDownload'])->name('img');
        Route::get('/payment/confirem/{order_id}', [OrderController::class, 'paymentConfirem'])->name('paymentConfirem');
        Route::get('/payment/unconfirem/{order_id}', [OrderController::class, 'paymentUnConfirem'])->name('paymentUnConfirem');
        Route::get('/unconfirem/{order_id}', [OrderController::class, 'orderUnConfirem'])->name('unconfirem');
        Route::get('/confirem/{order_id}', [OrderController::class, 'orderConfirem'])->name('confirem');
    });

    // Users Url
    Route::group(['middleware' => ['permission:Users']], function () {
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/all', [UserController::class, 'allUsers'])->name('all');
            Route::get('/permission/{id}', [UserController::class, 'permission'])->name('permission');
            Route::post('/permission/{id}', [UserController::class, 'permissionUpdate'])->name('permission');
            Route::get('/nopermission/{id}', [UserController::class, 'nopermission'])->name('nopermission');
            Route::post('/wallet/{id}', [UserController::class, 'wallet'])->name('wallet');
            Route::get('/status/{id}', [UserController::class, 'changeStatus'])->name('status');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
        });

        //Roles Url
        Route::resource('roles', RoleController::class);

        //Coupon Url 
        Route::resource('coupon', CouponController::class);
    });

    // Page Url 
    Route::resource('pages', PageController::class)->middleware('permission:Pages');

    // Configurations
    Route::group(['middleware' => ['permission:Configurations']], function () {
        Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
        Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');
        Route::get('/payment', [SettingController::class, 'paymentIndex'])->name('payment.index');
        Route::post('/payment', [SettingController::class, 'paymentUpdate'])->name('payment.update');
        Route::get('/email', [SettingController::class, 'emailIndex'])->name('email.index');
        Route::post('/email', [SettingController::class, 'emailUpdate'])->name('email.update');
    });
    
    
    
    




    



    
 
   

    
    



        