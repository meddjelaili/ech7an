<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Setting::pluck('value', 'name')->all();

        if ($settings) {
            $config = array(
                'driver'     => $settings['maildriver'],
                'host'       => $settings['mailhost'],
                'port'       => $settings['mailport'],
                'username'   => $settings['mailusername'],
                'password'   => $settings['mailpassword'],
                'encryption' => $settings['mailencryption'],
                'from'       => array('address' => $settings['mailaddress'], 'name' => $settings['site_name']),
            );

            Config::set('mail', $config);
        }

    }
}
