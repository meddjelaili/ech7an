<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CardType;
use App\Models\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CodeController extends Controller
{
    public function index()
    {
        $title = "Codes";
        $cardTypes = CardType::orderBy('type')->get(); 
        return view('admin.code.index',compact('cardTypes', 'title'));
    }

    public function show($id)
    {
        $cardType = CardType::findOrFail($id);
        $codes = $cardType->codes->where('bought', 0);
        $title = 'Code Of The Type '.$cardType->type;
        return view('admin.code.show',compact('cardType','title', 'codes'));
    }


    public function store($id, Request $request)
    {
   


         // Add Code to Database from inputs
        if ($request->addMoreInputFields[0]['code'] != null) {
            foreach ($request->addMoreInputFields as $key => $value) {

                $code = Code::firstOrNew([
                    'cardType_id' => $id,
                    'code' =>  $value['code']
                ]);
                if(isset($value['serial_number'])) {
                  $code->serial_number = $value['serial_number'];
                }
                $code->save();
                
            }
        }

         // Add Code to Database from textarea
        $textValue = $request->codes;
        if (isset($textValue)) {
            $textValue = explode("\r\n", $textValue); 
            foreach($textValue as $value) {
                $code = Code::firstOrNew([
                    'cardType_id' => $id,
                    'code' =>  $value
                ]);
                $code->save();
            }
            
        };
        

       
        

            return redirect()->back()->with('success' , 'Codes have been added successfully');
    }


    public function destroy($id)
    {
        Code::findOrFail($id)->delete();
        return redirect()->back()->with('success' , 'Code deleted successfully');

    }
}
