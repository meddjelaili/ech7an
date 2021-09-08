<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Omnipay\Omnipay;

class WalletController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $transactions = $user->transactions->where('wallet_id', $user->getKey());
        $user->wallet->refreshBalance();
        return view('wallet.index', compact('user', 'transactions'));
    }


    public function chargeIndex($method)
    {
        if ($method == 'ccpbaridimob'){
            $payment_id = Str::random(8);
            return view('wallet.algeria_post', compact('payment_id'));

        } elseif ($method == 'paysera') {
            $payment_id = Str::random(8);
            return view('wallet.paysera', compact('payment_id'));

        } elseif ($method == 'paysera-wallet') {
            $payment_id = Str::random(8);
            return view('wallet.paysera_wallet', compact('payment_id'));
        }

        return back();
    }

    public function charge(Request $request)
    {
        
        $user = Auth::user();
      
        if ($request->payment_method == 'ccp' || $request->payment_method == 'baridimob' || $request->payment_method == 'paysera_wallet'){


            $amount = currency($request->amount, $request->currency, 'USD', false);

            if (isset($request->img)) {
                $img_name = time().'.'.$request->img->getClientOriginalExtension();
                $request->img->move(public_path('images/wallet'), $img_name);
            }

            if(isset($request->pdf)) {
                $pdf_name = time().'.'.$request->pdf->getClientOriginalExtension();
                $request->pdf->move(public_path('pdf'), $pdf_name);
            }

            if($request->currency == 'DZD') {
                $currency = 'dz';
            } else {
                $currency = '€';
            }

            $meta = [
                        'name' => Auth::user()->name,
                        'amount' => $request->amount, 
                        'currency' => $currency,
                        'payment_id' => $request->payment_id,
                        'payment_method' => $request->payment_method,
                        'img' => $img_name ?? null,
                        'pdf' => $pdf_name ?? null,
                        'status' => 0,
                    ];

            $transaction = $user->depositFloat($amount, $meta, false);

            return redirect()->route('wallet.index')->with('warning', __('Processing in progress!'));

        } elseif ($request->payment_method == 'paysera') {

            
            $amount =  $request->amount;
         
            if ($amount < 10) {

                $tax = $amount / 100 + 0.1;

            } elseif ($amount >= 10 && $amount < 50) {

                $tax = $amount * 2.2 / 100;
            
            } else {
                $tax = 1;
            }
            $total_amount = $amount - $tax;
            
            $amount_will_get = currency($total_amount, $request->currency, 'USD', false);

            $meta = [
                'name' => Auth::user()->name,
                'amount' => $amount, 
                'currency' => '€',
                'payment_id' => $request->payment_id,
                'payment_method' => $request->payment_method,
                'img' =>  null,
                'pdf' =>  null,
                'status' => 0,
            ];

            $transaction = $user->depositFloat($amount_will_get, $meta, false);
            $self_url = url()->current();
            

            $settings = Setting::pluck('value', 'name')->all();
        
            // Setup payment gateway
            $gateway = Omnipay::create('Paysera');
            $gateway->setProjectId($settings['paysera_orderId2_projectId']);
            $gateway->setPassword($settings['paysera_orderId2_password']);
            // $gateway->setTestMode(False);

     

            $transactionId = $transaction->id;

            $card = [
                'email' => $user->email,
                'payment_id' => $request->payment_id,
                'price' => $amount,
                'currency' => '€',
            ];

            // Send purchase request
            $response = $gateway->purchase(
                [
                    'language' => 'ENG',
                    'transactionId' => $transactionId,
                    // 'paymentMethod' => 'hanzaee',
                    'amount' => $amount,
                    'currency' => 'EUR',
                    'returnUrl' =>  $self_url . "/return/{$transactionId}",
                    'cancelUrl' => $self_url,
                    'notifyUrl' => $self_url . "/return/{$transactionId}",
                    'callbackurl' => 'callbackurl',
                    'card' => $card,
                ]
            )->send();
            if ($response->isRedirect()) {
                
                return $response->redirect();

            }

        } 

        return back();
    }


    public function payseraReturn($transactionId)
    {
        $params = [];
        parse_str(base64_decode(strtr($_GET['data'], ['-' => '+', '_' => '/'])), $params);
      
        if($params['status'] == 1) {

            DB::table('transactions')
            ->where('id', $transactionId)
            ->update([
                'meta->status' => 1,
                'confirmed' => true,
                ]);
        
            return redirect()->route('wallet.index')->with('success', __('Payment completed successfully!'));

        } elseif($params['status'] == 2) {

            DB::table('transactions')
            ->where('id', $transactionId)
            ->update([
                'meta->status' => 0,
                'confirmed' => 0,
                ]);

            return redirect()->route('wallet.index')->with('warning', __('Processing in progress!'));


        } elseif ($params['status'] == 0) {

            DB::table('transactions')
            ->where('id', $transactionId)
            ->update([
                'meta->status' => 2,
                'confirmed' => 0,
                ]);

            return redirect()->route('wallet.index')->with('error', __('Payment failed!'));


        }

    }
}
