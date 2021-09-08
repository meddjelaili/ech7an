<?php

namespace App\Http\Controllers;

use App\Mail\OrderCard;
use App\Models\Card;
use App\Models\CardType;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Str;
use Omnipay\Omnipay;

class CardController extends Controller
{
    public $card;

    public function __construct(Card $card)
    {
        $this->card = $card;
    }


    public function index($slug) 
    {
        $lang = LaravelLocalization::getCurrentLocale();

        // Locale Scopes
        $card = $this->card::show($slug, $lang)->first();
        $popular = $this->card::popular($lang)->take(8)->get();


        return view('card.index', compact('card','popular', 'lang'));
    }


    public function buy(Request $request)
    {
     
        $payment_method = $request->payment_method;
        $quantity = $request->quantity;
        $payment_id = Str::random(8);
        $cardType = CardType::find($request->cardType_id);

        if(Auth::check()) {
            if(Auth::user()->isMerchant()) {
                $original_price = $cardType->merchant_price;
            } else {
                $original_price = $cardType->price;
            }
        } else {
            $original_price = $cardType->price;
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
           
            return view('card.paysera', compact('data', 'cardType'));

        } elseif ($payment_method == 'ccpbaridimob') {

            $price =  currency($original_price, currency()->config('default'), 'DZD', false);
            $data = [
                'quantity' => $quantity,
                'price' => $price,
                'payment_id' => $payment_id,
            ];

            return view('card.algeria_post', compact('cardType', 'data'));

        } elseif ($payment_method == 'paysera_wallet') {

            $price =  currency($original_price, currency()->config('default'), 'EUR', false);
            $data = [
                'quantity' => $quantity,
                'price' => $price,
                'payment_id' => $payment_id,
            ];

            return view('card.paysera_wallet', compact('cardType', 'data'));

        } elseif ($payment_method == 'wallet') {
            $price =  currency($original_price, currency()->config('default'), 'USD', false);
            $data = [
                'quantity' => $quantity,
                'price' => $price,
                'payment_id' => $payment_id,
            ];

            return view('card.wallet', compact('cardType', 'data'));
        } else {
            return back();
        }
    }



    public function buyNow(Request $request)
    {
   
        $total_price = $request->total_price;
        // Check if Coupon is valid
        if ($request->coupon != null) {
            $cardType = CardType::where('id', $request->cardType_id)->select('card_id')->first();
            $card_id = $cardType->card_id;
            $coupon = Coupon::where([
                    'coupon' => $request->coupon,
                    'card_id' => $card_id
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

        $quantity = $request->quantity;
        $order = Order::create(
            [ 
                'cardType_id' => $request->cardType_id,
                'coupon' => $coupon->coupon ?? null,
                'email' => $request->email,
                'payment_id' => $request->payment_id,
                'payment_method' => $request->payment_method,
                'price' => $total_price,
                'currency' => $request->currency,
                'quantity' => $quantity,
                'payment_status' => '0',
                'status' => '0',
            ]
        );
        $cardType = CardType::find($request->cardType_id);
       

        $self_url = url()->current();

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
                'quantity' => $quantity,
            ];

            // Send purchase request
            $response = $gateway->purchase(
                [
                    'language' => 'ENG',
                    'transactionId' => $orderId,
                    // 'paymentMethod' => 'hanzaee',
                    'amount' => $total_price,
                    'currency' => 'EUR',
                    'returnUrl' =>  $self_url . "/return/{$orderId}", //3
                    'cancelUrl' => $self_url, //3
                    'notifyUrl' => $self_url . "/return/{$orderId}", //3
                    'callbackurl' => 'callbackurl', //3
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

            // 
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
            // take codes
            if ($cardType->codes->count() >= $quantity) {
                foreach($cardType->codes as $key =>$code) {
                    $code->bought = true;
                    $code->order_id = $order->id;
                    $code->update();
        
                    if (($key + 1) == $quantity) {
                        break;
                    }
            
                }
                $order->status = '1';
                Mail::to($order->email)->send(new OrderCard($order));
            } else {
                $order->status = '0';
            }
            $order->update();


            return redirect()->route('home')->with('success', __('Payment completed successfully!'));

        }
    }


    public function payseraReturn($order_id, Request $request)
    {
        $params = [];
        parse_str(base64_decode(strtr($_GET['data'], ['-' => '+', '_' => '/'])), $params);
        $order = Order::find($order_id);
      
        if($params['status'] == 1) {

            $order->payment_status = 1;
             // take codes
            if ($order->cardType->codes->count() >= $order->quantity) {
                foreach($order->cardType->codes as $key =>$code) {
                    $code->bought = true;
                    $code->order_id = $order->id;
                    $code->update();
        
                    if (($key + 1) == $order->quantity) {
                        break;
                    }
            
                }
                $order->status = '1';
                Mail::to($order->email)->send(new OrderCard($order));
            } else {
                $order->status = '0';
            }
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
