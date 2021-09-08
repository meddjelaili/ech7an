<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Http\ViewComposers\SettingComposer');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            [
                'layouts.footer',
                'layouts.nav',
                'layouts.app',
                'topup.index',
                'card.index',
                'partials.model_wallet',
                'order.index',
                'wallet.index',
                'topup.paysera_wallet',
                'card.paysera_wallet',
                'topup.algeria_post',
                'card.algeria_post',
                'wallet.paysera_wallet',
                'wallet.algeria_post',
                'home',
                'merchant.index'
            ],
            'App\Http\ViewComposers\SettingComposer'
        );
    }
}
