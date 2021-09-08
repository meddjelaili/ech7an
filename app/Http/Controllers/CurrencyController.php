<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ParameterBag;

class CurrencyController extends Controller
{
    public function changeCurrency(Request $request)
    {
        $params = [
            'currency' => $request->currency, 
        ];
        $request->query = new ParameterBag($params);
        return back();
    }
}
