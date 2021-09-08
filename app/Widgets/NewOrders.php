<?php

namespace App\Widgets;

use App\Models\Merchant;
use App\Models\Order;
use Arrilot\Widgets\AbstractWidget;
use Bavix\Wallet\Models\Transaction;

class NewOrders extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];
    public $reloadTimeout = 5;
    // public $cacheTime = 60;
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        
        $new_orders_topup = Order::where([
            ['topUpAmount_id', '!=', null],
            ['payment_status', '!=', 0],  
            'status' => '0',
        ])->exists();


        $new_orders_card = Order::where([
                ['cardType_id', '!=', null],
                ['payment_status', '!=', 0],  
                'status' => '0',
            ])->exists();
        $new_orders_wallet =  Transaction::where([
                        'confirmed' => 0,
                        'meta->status' => 0,
                        ])->exists();     
                           
        $new_orders_merchant = Merchant::where('active', 0)->exists();

        $new_orders_alert = [
            'new_orders_topup' => $new_orders_topup,
            'new_orders_card' => $new_orders_card,
            'new_orders_wallet' => $new_orders_wallet,
            'new_orders_merchant' => $new_orders_merchant,
        ] ;


        return view('widgets.new_orders', [
            'config' => $this->config,
            'new_orders_alert' => $new_orders_alert
        ]);
    }

    
    public function container()
    {

        return [
            'element'       => 'li',
            'attributes'    => ' class="nav-item dropdown no-arrow mx-1"',
        ];
    }
}
