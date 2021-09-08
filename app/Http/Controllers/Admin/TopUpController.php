<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\TopUp;
use App\Models\TopUpAmount;
use App\Models\TopUpInformation;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TopUpController extends Controller
{

    public function index ()
    {
        $title = 'Game Top Up';
        $topUps = TopUp::all();
        return view('admin.topup.index', compact('title', 'topUps'));
    }

    public function create()
    {
        $title = 'Add New Top Up';
        return view('admin.topup.create',compact('title'));
    }

    public function store(Request $request)
    {
  
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'region_en' => 'required',
            'region_ar' => 'required',
            'note_en' => 'required',
            'note_ar' => 'required',
            'instruction_en' => 'required',
            'instruction_ar' => 'required',
            'cover_image' => 'required|image',
            'addMoreAmountFields.*.amount' => 'required',
            'addMoreAmountFields.*.price' => 'required',
            'addMoreAmountFields.*.merchant_price' => 'required',
            'addMoreInfoFields.*.name' => 'required',
            'addMoreInfoFields.*.placeholder' => 'required',
        ]);

        $img_name = time().'.'.$request->cover_image->getClientOriginalExtension();
        $request->cover_image->move(public_path('images'), $img_name);

        $topUp = TopUp::create([
            'slug' => SlugService::createSlug(TopUp::class, 'slug', $request->title_en),
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'region_en' => $request->region_en ,
            'region_ar' => $request->region_ar,
            'note_en' => $request->note_en,
            'note_ar' => $request->note_ar,
            'instruction_en' => $request->instruction_en,
            'instruction_ar' => $request->instruction_ar,
            'cover_image' => $img_name, 
            'popular' => $request->popular,
        ]);
        

        // Add Amounts Top Up to Database
        foreach ($request->addMoreAmountFields as $key => $value) {
            TopUpAmount::create([
                'topUp_id' => $topUp->id,
                'amount' => $value['amount'],
                'price' => $value['price'],
                'merchant_price' => $value['merchant_price'],
            ]);
        }

         // Add Info Order Top Up to Database
         foreach ($request->addMoreInfoFields as $key => $value) {
            TopUpInformation::create([
                'topUp_id' => $topUp->id,
                'name' => $value['name'],
                'placeholder' => $value['placeholder'],
            ]);
        }

        return redirect()->back()->with('success', 'Top Up have been added successfully'); 
    }

    public function changeStatus($id)
    {
        $topUp = TopUp::findOrFail($id);
        $topUp->status = !$topUp->status;
        $topUp->update();

        return redirect()->back()->with('success', 'Top Up Status have been Updated successfully');
    }

    public function edit($id)
    {
        $topUp = TopUp::findOrFail($id);
        $title = 'Edit '.$topUp->title_en;
        return view('admin.topup.edit', compact('topUp', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'region_en' => 'required',
            'region_ar' => 'required',
            'note_en' => 'required',
            'note_ar' => 'required',
            'instruction_en' => 'required',
            'instruction_ar' => 'required',
            'cover_image' => 'image',
            'addMoreAmountFields.*.amount' => 'required',
            'addMoreAmountFields.*.price' => 'required',
            'addMoreAmountFields.*.merchant_price' => 'required',
            'addMoreInfoFields.*.name' => 'required',
            'addMoreInfoFields.*.placeholder' => 'required',
        ]);

        $topUp = TopUp::findOrFail($id);


        if($request->has('cover_image')){
            $old_filename = public_path().'/images/'.$topUp->cover_image;
            \File::delete($old_filename);
            $img_name = time().'.'.$request->cover_image->getClientOriginalExtension();
            $request->cover_image->move(public_path('images'), $img_name);
            $topUp->cover_image = $img_name; 
        }
        if($topUp->title_en != $request->title_en ){
            $topUp->slug = SlugService::createSlug(TopUp::class, 'slug', $request->title_en);
        }

        $topUp->title_en = $request->title_en;
        $topUp->title_ar = $request->title_ar;
        $topUp->region_en = $request->region_en;
        $topUp->region_ar = $request->region_ar;
        $topUp->note_en = $request->note_en;
        $topUp->note_ar = $request->note_ar;
        $topUp->instruction_en = $request->instruction_en;
        $topUp->instruction_ar = $request->instruction_ar;
        $topUp->title_en = $request->title_en;
        $topUp->popular = $request->popular;
        $topUp->update();



        // Delete Top Up Amount
        $oldIdsAmounts = Arr::pluck($topUp->topUpAmounts, 'id');
        $newIdsAmounts = array_filter(Arr::pluck($request->addMoreAmountFields, 'id'), 'is_numeric'); 
        $deleteAmounts = collect($oldIdsAmounts)
                     ->filter(function ($model) use ($newIdsAmounts) {
                             return !in_array($model, $newIdsAmounts);
                      });
        foreach($deleteAmounts as $id) {
            TopUpAmount::findOrFail($id)->delete();
        }
        // Update Or Create Top Up Amount
        foreach ($request->addMoreAmountFields as $key => $value) {
            if (isset($value['id'])) {
                $topUpAmount = TopUpAmount::findOrFail($value['id']);
                $topUpAmount->amount =  $value['amount'];
                $topUpAmount->price = $value['price'];
                $topUpAmount->merchant_price = $value['merchant_price'];
                $topUpAmount->update();
            } else {
                TopUpAmount::create([
                    'topUp_id' => $topUp->id,
                    'amount' => $value['amount'],
                    'price' => $value['price'],
                    'merchant_price' => $value['merchant_price'],
                ]);
            }
            
        }

        // Delete Informations Order
        $oldIdsInfo = Arr::pluck($topUp->topUpInformations, 'id');
        $newIdsInfo = array_filter(Arr::pluck($request->addMoreInfoFields, 'id'), 'is_numeric'); 
        $deleteInfos = collect($oldIdsInfo)
                     ->filter(function ($model) use ($newIdsInfo) {
                             return !in_array($model, $newIdsInfo);
                      });
        foreach($deleteInfos as $id) {
            TopUpInformation::findOrFail($id)->delete();
        }
        // Update Or Create Top Up Informations Order
        foreach ($request->addMoreInfoFields as $key => $value) {
            if (isset($value['id'])) {
                $topUpInfo = TopUpInformation::findOrFail($value['id']);
                $topUpInfo->name =  $value['name'];
                $topUpInfo->placeholder = $value['placeholder'];
                $topUpInfo->update();
            } else {
                TopUpInformation::create([
                    'topUp_id' => $topUp->id,
                    'name' => $value['name'],
                    'placeholder' => $value['placeholder'],
                ]);
            }
            
        }

        return redirect()->back()->with('success', 'Top Up have been Updated successfully');
    }

    public function destroy($id)
    {
        $topUp = TopUp::findOrFail($id);
        $filename = public_path().'/images/'.$topUp->cover_image;
        \File::delete($filename);
        $topUp->delete();
        return redirect(route('admin.topUp.index'))->with('success', 'Top Up have been Deleted successfully');
    }






    public function order()
    {
        $title = 'New Order Top Up';
        $orders = Order::where(
            [
                ['topUpAmount_id', '!=', null],
                ['payment_status', '!=', 0],  
                'status' => '0',
            ])->get();
          
        return view('admin.topup.order', compact('orders', 'title'));
    }

    public function orderFailed()
    {
        $title = 'Failed Orders Top Up';
        $orders = Order::where(
            [
                ['topUpAmount_id', '!=', null],
                ['payment_status', '!=', 0],  
                'status' => '2',
            ])->latest()->get();
          
        return view('admin.topup.order', compact('orders', 'title'));
    }

    public function orderConfermed()
    {
        $title = 'Confermed Orders Top Up';
        $orders = Order::where(
            [
                ['topUpAmount_id', '!=', null],
                ['payment_status', '!=', 0],  
                'status' => '1',
            ])->latest()->get();
          
        return view('admin.topup.order', compact('orders', 'title'));
    }

    public function paymentFaild()
    {
        $title = 'Payment Failed  Top Up';
        $orders = Order::where(
            [
                ['topUpAmount_id', '!=', null],
                ['payment_status',  3],  
            
            ])->latest()->get();
          
        return view('admin.topup.order', compact('orders', 'title'));
    }

    public function orderShow($order_id)
    {
        $order = Order::find($order_id);
        $title = 'TopUp #Order"'.$order->id.'"';
        $user = User::where('email',$order->email)->first();
      
        return view('admin.topup.show_order',compact('order', 'title', 'user'));
    }

  
}
