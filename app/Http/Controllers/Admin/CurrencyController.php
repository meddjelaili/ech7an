<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    public function setDefault()
    {
        DB::table('currencies')->delete();
        DB::table('currencies')->insert([
            'name' => 'US Dollar',
            'code' => 'USD',
            'symbol' => '$',
            'format' => '$1,0.00',
            'exchange_rate' => 1,
            'active' => 1,
        ]);
        DB::table('currencies')->insert([
            'name' => 'Euro',
            'code' => 'EUR',
            'symbol' => '€',
            'format' => '1.0,00 €',
            'exchange_rate' => 0.85,
            'active' => 1,
        ]);
        DB::table('currencies')->insert([
            'name' => 'Algerian Dinar',
            'code' => 'DZD',
            'symbol' => 'د.ج‏',
            'format' => 'د.ج‏ 1,0.00',
            'exchange_rate' => 180,
            'active' => 1,
        ]);

        return back()->with('success', 'updated successfully');
    }


    public function index()
    {
        $currencies = currency()->getCurrencies();
        $title = 'Currencies list ';

        return view('admin.currency.index', compact('currencies', 'title'));
    }

    public function store(Request $request)
    {
        currency()->update($request->currency_code , [
            'exchange_rate' => $request->exchange_rate
        ]);
        return back()->with('success', 'Exchange rate updated successfully');
    }
}
