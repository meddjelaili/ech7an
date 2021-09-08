<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index()
    {
        $title = 'Site Settings';
        $settings = Setting::pluck('value', 'name')->all();
        return view('admin.setting.index',compact('settings', 'title'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'linkedIn' => 'required',
            'about_us_en' => 'required',
            'about_us_ar' => 'required',
            'about_wallet_en' => 'required',
            'about_wallet_ar' => 'required',
            'merchant_en' => 'required',
            'merchant_ar' => 'required',
            'site_email' => 'required',
            'site_address' => 'required',
            'site_logo' => 'image',
            'site_name' => 'required',
            'slideshow_1' => 'image',
            'slideshow_2' => 'image',
            'slideshow_3' => 'image',
            'slideshow_4' => 'image',
            'slideshow_5' => 'image',
            
        ]);

    
        function save_image($input ,$request) {
            if($request->has($input)){
                $old_filename = public_path().'/images/'.$request["old_$input"];   
                \File::delete($old_filename);
                $file = $request->file($input) ;
                $fileName = $file->getClientOriginalName() ;
                $destinationPath = public_path('images') ;       
                 $file->move($destinationPath,$fileName);
               

                 DB::table('settings')
                ->where('name', $input)
                ->update(['value' => "$fileName"]); 
              
            }
        }
        
        save_image('site_logo', $request);
        save_image('slideshow_1', $request);
        save_image('slideshow_2', $request);
        save_image('slideshow_3', $request);
        save_image('slideshow_4', $request);
        save_image('slideshow_5', $request);


       

 
    
        foreach ($request->all() as $name => $value)
        {
            if ($name == 'site_logo' || $name == 'slideshow_1' || $name == 'slideshow_2' || $name == 'slideshow_3' || $name == 'slideshow_4' || $name == 'slideshow_5') {
                continue;
            }
            DB::table('settings')
                    ->where('name', $name)
                    ->update(['value' =>$value]);
        }

        return back()->with('success', 'site setting updated!');
    }
    public function paymentIndex()
    {
        $title = 'Payments Settings';
        $settings = Setting::pluck('value', 'name')->all();
        return view('admin.setting.payment_index',compact('settings', 'title'));
    }


    public function paymentUpdate(Request $request)
    {
        $request->validate([
            'paysera_orderId1_projectId' => 'required',
            'paysera_orderId1_password' => 'required',
            'paysera_orderId2_projectId' => 'required',
            'paysera_orderId2_password' => 'required',
            'ccp' => 'required',
            'ccp_name' => 'required',
            'ccp_city' => 'required',
            'baridimob' => 'required',
            'paysera_wallet_address' => 'required',
            'paysera_wallet_swif' => 'required',
            'paysera_wallet_iban' => 'required',
            'paysera_wallet_acount' => 'required',
        ]);

    
        foreach ($request->all() as $name => $value)
        {

            DB::table('settings')
                    ->where('name', $name)
                    ->update(['value' => $value]);
        }

        return back()->with('success', 'Payment setting updated!');
    }


    public function emailIndex()
    {
        $title = 'Email Settings';
        $settings = Setting::pluck('value', 'name')->all();
        return view('admin.setting.email',compact('settings', 'title'));
    }


    public function emailUpdate(Request $request)
    {
        $request->validate([
            'maildriver' => 'required',
            'mailhost' => 'required',
            'mailport' => 'required',
            'mailencryption' => 'required',
            'mailusername' => 'required',
            'mailpassword' => 'required',
            'mailaddress' => 'required',
        ]);

    
        foreach ($request->all() as $name => $value)
        {

            DB::table('settings')
                    ->where('name', $name)
                    ->update(['value' => $value]);
        }

        return back()->with('success', 'Email setting updated!');
    }
}
