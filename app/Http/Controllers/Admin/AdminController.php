<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Merchant;
use App\Models\Order;
use App\Models\TopUpAmount;
use App\Models\User;
use Bavix\Wallet\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public $order ;
    public function __construct(Order $order)
    {
        
        $this->order = $order;
           
    }


    public function index()
    {
        $title = "Dashboard";
        $new_orders_topUp = Order::where([
                                            ['topUpAmount_id', '!=', null],
                                            ['payment_status', '!=', 0],  
                                            'status' => '0',
                                        ])->get();
                             
        $new_orders_card = Order::where([
                                        ['cardType_id', '!=', null],
                                        ['payment_status', '!=', 0],  
                                        'status' => '0',
                                    ])->get();
        $new_orders_wallet =  Transaction::where([
                                                'confirmed' => 0,
                                                'meta->status' => 0,
                                                ])->count();         
        $new_orders_merchant = Merchant::where('active', 0)->count();




        $order_card = Order::where([
                                    ['cardType_id', '!=', null],
                                    'payment_status' => '1',  
                                    'status' => '1',
                                ])->get();
        $order_card_month =  Order::whereMonth('created_at', date('m'))->where([
                                                                                ['cardType_id', '!=', null],
                                                                                'payment_status' => '1',  
                                                                                'status' => '1',
                                                                                ])->get();
        $order_topup = Order::where([
                                    ['topUpAmount_id', '!=', null],
                                    'payment_status' => '1',  
                                    'status' => '1',
                                ])->get();

        $order_topup_month =  Order::whereMonth('created_at', date('m'))->where([
                                                                                ['topUpAmount_id', '!=', null],
                                                                                'payment_status' => '1',  
                                                                                'status' => '1',
                                                                                ])->get();
        $total_user = User::count();
        $total_merchant = Merchant::where('active', true)->count();
 
    
        function total_sales($query) {
            $sales_euro_total = $query->where('currency', '€‏')->sum('price');
            $sales_dinar_total = $query->where('currency', 'د.ج‏')->sum('price');
            $sales_euro_to_dollar = currency($sales_euro_total ,'EUR', 'USD', false);                
            $sales_dinar_to_dollar = currency($sales_dinar_total, 'DZD', 'USD', false);             
            $sales_total = number_format((float)$sales_dinar_to_dollar + $sales_euro_to_dollar, 2, '.', '');
            return $sales_total;
        }

        $topup_stock = TopUpAmount::sum('stock');
        $codes_stock = Code::where('bought', 0)->count();

        $data = [
            'topup' => $new_orders_topUp,
            'card' => $new_orders_card,
            'wallet' => $new_orders_wallet,
            'merchant' => $new_orders_merchant,
            'month_order' => $order_topup_month->sum('quantity') + $order_card_month->sum('quantity'),
            'total_order' => $order_topup->sum('quantity') + $order_card->sum('quantity'),
            'month_sales' => total_sales($order_topup_month) + total_sales($order_card_month),
            'total_sales' => total_sales($order_topup) + total_sales($order_card),
            'total_user' => $total_user,
            'total_merchant' => $total_merchant,
            'topup_stock' => $topup_stock,
            'codes_stock' => $codes_stock
        ];

        

        // Chart Data

        $year = ['2021','2022','2023','2024','2025','2026'];
        $month = ['1','2','3','4','5','6','7','8','9','10','11','12'];
       
        $order_topup_month = [];
        $order_card_month = [];
        $user = [];

        foreach ($month as $key => $value) {
            $user[] = User::whereMonth('created_at', $value)->count();
            $order_topup_month[] = Order::whereMonth('created_at', $value)->where([
                ['status', '!=', '0'],
                ['topUpAmount_id' ,'!=' ,null]
                ])->count();
            $order_card_month[] = Order::whereMonth('created_at', $value)->where([
                ['status', '!=', '0'],
                ['cardType_id' ,'!=' ,null]
                ])->count();

        }
        
        
     // End Chart Data 
                                    // 
        return view('admin.index', compact('title', 'data'))->with('month',json_encode($month,JSON_NUMERIC_CHECK))
                                                            ->with('user',json_encode($user,JSON_NUMERIC_CHECK))   
                                                            ->with('order_topup_month',json_encode($order_topup_month,JSON_NUMERIC_CHECK))
                                                            ->with('order_card_month',json_encode($order_card_month,JSON_NUMERIC_CHECK));
    }
}
