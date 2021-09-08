<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderCard;
use App\Mail\OrderTopUp;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class OrderController extends Controller
{
    public function pdfDownload($pdf_name)
    {
        $file = public_path(). "/pdf/".$pdf_name;
        $headers = array(
            'Content-Type: application/pdf',
          );

        return Response::download($file, $pdf_name, $headers);
    }
    
    public function imgDownload($img_name)
    {
        $file = public_path(). "/images/order/".$img_name;
        $headers = array(
            'Content-Type: image/*',
          );

        return Response::download($file, $img_name, $headers);
    }

    public function paymentConfirem($order_id)
    {
        $order = Order::find($order_id);
        $order->payment_status = '1';
        $order->update();
        return back()->with('success', 'Payment Was Confirmed');
    }

    public function paymentUnConfirem($order_id)
    {
        $order = Order::find($order_id);
        $order->payment_status = '3';
        $order->update();
        return back()->with('success', 'Payment Was UnConfirmed');
    }

    public function orderConfirem($order_id)
    {
        $order = Order::find($order_id);
        $order->payment_status = '1';
        $order->status = '1';

        if($order->topUpAmount_id != null) {

            $topupAmount = $order->topUpAmount;
            $topupAmount->stock -= $order->quantity;  
            $topupAmount->update();
            Mail::to($order->email)->send(new OrderTopUp($order));

        }elseif($order->cardType != null) {
            $codes = $order->cardType->codes;
            if ($codes->count() < $order->quantity) {
                return back()->with('success', 'Not enough codes in stock!');
            }
             // take codes
             foreach($codes as $key =>$code) {
                $code->bought = true;
                $code->order_id = $order->id;
                $code->update();
    
                if (($key + 1) == $order->quantity) {
                    break;
                }
        
            }
            Mail::to($order->email)->send(new OrderCard($order));
        }

        $order->update();
        
        return back()->with('success', 'Order Was Confirmed');
    }

    public function orderUnConfirem($order_id)
    {
        $order = Order::find($order_id);
        $order->status = '2';
        $order->update();
        if($order->cardType != null) {
            // delete codes
            foreach($order->codes as $code) {
                $code->bought = false;
                $code->order_id = null;
                $code->update();
            }
            Mail::to($order->email)->send(new OrderCard($order));
        } else {
            Mail::to($order->email)->send(new OrderTopUp($order));
        }

        return back()->with('success', 'Order Was UnConfirmed');
    }
}
