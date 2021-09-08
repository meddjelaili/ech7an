<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('email', Auth::user()->email)->latest()->paginate(7);
        return view('order.index', compact('orders'));
    }
}
