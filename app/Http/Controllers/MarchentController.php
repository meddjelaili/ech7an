<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarchentController extends Controller
{
    public function index()
    {
        return view('merchant.index');
    }

    public function store(Request $request)
    {
        $request->validate([

            'full_name' => 'required',
            'phone' => 'required',
            'nationality' => 'required',
            'country' => 'required',
            'city' => 'required',
            'adress' => 'required',
 
        ]);

   
        $merchant = Merchant::updateOrCreate(
            ['user_id' =>  Auth::id()],
            [
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'nationality' => $request->nationality,
            'country' => $request->country,
            'city' => $request->city,
            'adress' => $request->adress,
            'website' => $request->website,
            ]
        );

    
     

        return redirect()->route('home')->with('success', __('Your request has been successfully sent!'));
    }
}
