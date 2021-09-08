<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Setting;
use App\Models\TopUp;
use App\Models\TopUpAmount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Str;
use Omnipay\Omnipay;

class TopUpController extends Controller
{
    public $topUp;

    public function __construct(TopUp $topUp)
    {
        $this->topUp = $topUp;
    }

    public function index($slug) 
    {
        $lang = LaravelLocalization::getCurrentLocale();

        // Locale Scopes
        $topUp = $this->topUp::show($slug, $lang)->first();
        $popular = $this->topUp::popular($lang)->take(8)->get();

        return view('topup.index', compact('topUp','popular','lang'));
    }


    public function buy(Request $request)
    {
      

        $payment_method = $request->payment_method;
        $quantity = $request->quantity;
        $payment_id = Str::random(8);
        $topUpAmount = TopUpAmount::find($request->amount_id);
        $orderDetails = $request['orderDetails'];
        if(Auth::check()) {
            if(Auth::user()->isMerchant()) {
                $original_price = $topUpAmount->merchant_price;
            } else {
                $original_price = $topUpAmount->price;
            }
        } else {
            $original_price = $topUpAmount->price;
        }

  
        
        if ($payment_method == 'paysera') {

            $price =  currency($original_price , currency()->config('default'), 'EUR', false) * $quantity;
         
            if ($price < 10) {

                $tax = $price / 100 + 0.1;

            } elseif ($price >= 10 && $price < 50) {

                $tax = $price * 2.2 / 100;
            
            } else {
                $tax = 1;
            }
            $total_price = $tax + $price;
            
            $data = [
                'payment_method' => $payment_method,
                'quantity' => $quantity,
                'price' => $price,
                'tax' => $tax,
                'total_price' => $total_price,
                'payment_id' => $payment_id,
            ];

            return view('topup.paysera', compact('data', 'topUpAmount', 'orderDetails'));

        } elseif ($payment_method == 'ccpbaridimob') {

            $price =  currency($original_price, currency()->config('default'), 'DZD', false);
            $data = [
                'quantity' => $quantity,
                'price' => $price,
                'payment_id' => $payment_id,
            ];

            return view('topup.algeria_post', compact('topUpAmount', 'data', 'orderDetails'));

        } elseif ($payment_method == 'paysera_wallet') {

            $price =  currency($original_price, currency()->config('default'), 'EUR', false);
            $data = [
                'quantity' => $quantity,
                'price' => $price,
                'payment_id' => $payment_id,
            ];

            return view('topup.paysera_wallet', compact('topUpAmount', 'data', 'orderDetails'));

        } elseif ($payment_method == 'wallet') {
            $price =  currency($original_price, currency()->config('default'), 'USD', false);
            $data = [
                'quantity' => $quantity,
                'price' => $price,
                'payment_id' => $payment_id,
            ];

            return view('topup.wallet', compact('topUpAmount', 'data', 'orderDetails'));
        } else {
            return back();
        }
    }

    public function buyNow(Request $request)
    {
        $total_price = $request->total_price;
        // Check if Coupon is valid
        if ($request->coupon != null) {
            $topUpAmount = TopUpAmount::where('id', $request->topUpAmount_id)->select('topUp_id')->first();
            $topUp_id = $topUpAmount->topUp_id;
            $coupon = Coupon::where([
                    'coupon' => $request->coupon,
                    'topUp_id' => $topUp_id 
                ])->first();
    
            if (!$coupon) {
                $coupon = Coupon::where([
                    'coupon' => $request->coupon,
                    'topUp_id' => null,
                    'card_id' => null,
                ])->first();
                if (!$coupon) {
                    return redirect()->back()->with('error', __('Coupon is invalid!'));
                } else {
                    $coupon_discount = $coupon->discount / 100;
                }
            } else {
                $coupon_discount = $coupon->discount / 100;
            }
            $total_price -= $total_price * $coupon_discount;
            
        }
        $total_price = number_format((float)$total_price, 2, '.', '');
        // Save Order
        $quantity = $request->quantity;
        $order = Order::create(
            [ 
                'topUpAmount_id' => $request->topUpAmount_id,
                'coupon' => $coupon->coupon ?? null,
                'email' => $request->email,
                'payment_id' => $request->payment_id,
                'payment_method' => $request->payment_method,
                'price' => $total_price,
                'currency' => $request->currency,
                'quantity' => $quantity ,
                'payment_status' => '0', //
                'status' => '0',
            ]
        );
    
        // Save Order Details
        foreach ($request->orderDetails as $key => $value) {
            OrderDetails::create([
                'order_id' => $order->id,
                'name' => $value['name'],
                'value' => $value['value'],
            ]);
        }
        // 
        $self_url = url()->current();
        // Payments
        if ($request->payment_method == 'paysera') {
            

            $settings = Setting::pluck('value', 'name')->all();
        
            // Setup payment gateway
            $gateway = Omnipay::create('Paysera');
            $gateway->setProjectId($settings['paysera_orderId1_projectId']);
            $gateway->setPassword($settings['paysera_orderId1_password']);
            // $gateway->setTestMode(False);

            $orderId = $order->id;

            $card = [
                'email' => $request->email,
                'payment_id' => $request->payment_id,
                'price' => $total_price,
                'currency' => '€',
                'quantity' => $quantity ,
            ];

            // Send purchase request
            $response = $gateway->purchase(
                [
                    'language' => 'ENG',
                    'transactionId' => $orderId,
                    // 'paymentMethod' => 'hanzaee',
                    'amount' => $total_price,
                    'currency' => 'EUR',
                    'returnUrl' =>  $self_url . "/return/{$orderId}",
                    'cancelUrl' => $self_url,
                    'notifyUrl' => $self_url . "/return/{$orderId}",
                    'callbackurl' => 'callbackurl',
                    'card' => $card,
                ]
            )->send();
            if ($response->isRedirect()) {
                
                return $response->redirect();

            }
        } elseif ($request->payment_method == 'ccp' || $request->payment_method == 'baridimob') {

            if (isset($request->img)) {
                $img_name = time().'.'.$request->img->getClientOriginalExtension();
                $request->img->move(public_path('images/order'), $img_name);
            }

            if(isset($request->pdf)) {
                $pdf_name = time().'.'.$request->pdf->getClientOriginalExtension();
                $request->pdf->move(public_path('pdf'), $pdf_name);
            }

            $order->payment_status = '2';
            $order->pdf = $pdf_name ?? null;
            $order->img = $img_name ?? null;
            $order->update();

            // 
            return redirect()->route('home')->with('warning', __('Processing in progress!'));


        } elseif ($request->payment_method == 'paysera_wallet') {

            if (isset($request->img)) {
                $img_name = time().'.'.$request->img->getClientOriginalExtension();
                $request->img->move(public_path('images/order'), $img_name);
            }

            if(isset($request->pdf)) {
                $pdf_name = time().'.'.$request->pdf->getClientOriginalExtension();
                $request->pdf->move(public_path('pdf'), $pdf_name);
            }

            $order->payment_status = '2';
            $order->pdf = $pdf_name ?? null;
            $order->img = $img_name ?? null;
            $order->update();

            return redirect()->route('home')->with('warning', __('Processing in progress!'));


        } elseif ($request->payment_method == 'wallet') {
           
            if (Auth::user()->balanceFloat <  $total_price) {
                return back()->with('error', 'Your balance is insufficient');
            }
            $meta = [
                'amount' => $total_price, 
                'currency' => '$',
                'payment_id' => $request->payment_id,
                'payment_method' => 'wallet',
                'img' => $img_name ?? null,
                'pdf' => $pdf_name ?? null,
                'status' => 1,
            ];

            Auth::user()->withdrawFloat($total_price, $meta, true);
            $order->payment_status = '1';
            $order->update();

            // 
            return redirect()->route('home')->with('success', __('Payment completed successfully!'));
        }
       
    }


    public function payseraReturn($order_id)
    {
        $params = [];
        parse_str(base64_decode(strtr($_GET['data'], ['-' => '+', '_' => '/'])), $params);
        $order = Order::find($order_id);
      
        if($params['status'] == 1) {

            $order->payment_status = 1;
            $order->update();
        
            return redirect()->route('home')->with('success', __('Payment completed successfully!'));

        } elseif($params['status'] == 2) {

            $order->payment_status = 2;
            $order->update();

            return redirect()->route('home')->with('warning', __('Processing in progress!'));


        } elseif ($params['status'] == 0) {

            return redirect()->route('home')->with('error', __('Payment failed!'));


        }


    }
}
