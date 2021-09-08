<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\CardType;
use App\Models\Order;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    public $card;

    public function __construct(Card $card)
    {
        $this->card = $card;
    }
    public function index() 
    {
        $title = 'Game Cards';
        $cards = $this->card::all();
        return view('admin.card.index', compact('title', 'cards'));
    }

    public function create()
    {
        $title = 'Add New Card';
        return view('admin.card.create',compact('title'));
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
            'addMoreInputFields.*.type' => 'required',
            'addMoreInputFields.*.price' => 'required',
            'addMoreInputFields.*.merchant_price' => 'required',

            
        ]);

        $img_name = time().'.'.$request->cover_image->getClientOriginalExtension();
        $request->cover_image->move(public_path('images'), $img_name);

        $card = $this->card::create([
            'slug' => SlugService::createSlug(Card::class, 'slug', $request->title_en),
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
        

        // Add type to Database
        foreach ($request->addMoreInputFields as $key => $value) {
            CardType::create([
                'card_id' => $card->id,
                'type' => $value['type'],
                'price' => $value['price'],
                'merchant_price' => $value['merchant_price'],
            ]);
        }

        return redirect()->back()->with('success', 'Card has been added'); 
    }



    public function changeStatus($id)
    {
        $card = $this->card::findOrFail($id);
        $card->status = !$card->status;
        $card->update();

        return redirect()->back()->with('success', 'Card Status Has Updated');
    }

    public function edit($id)
    {
        $card = $this->card::findOrFail($id);
        $title = 'Edit '.$card->title_en;
        return view('admin.card.edit', compact('card', 'title'));
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
            'addMoreInputFields.*.type' => 'required',
            'addMoreInputFields.*.price' => 'required',
            'addMoreInputFields.*.merchant_price' => 'required',
        ]);

        $card = $this->card::findOrFail($id);


        if($request->has('cover_image')){
            $old_filename = public_path().'/images/'.$card->cover_image;
            \File::delete($old_filename);
            $img_name = time().'.'.$request->cover_image->getClientOriginalExtension();
            $request->cover_image->move(public_path('images'), $img_name);
            $card->cover_image = $img_name; 
        }
        if($card->title_en != $request->title_en ){
            $card->slug = SlugService::createSlug(Card::class, 'slug', $request->title_en);
        }

      
        $card->title_en = $request->title_en;
        $card->title_ar = $request->title_ar;
        $card->region_en = $request->region_en;
        $card->region_ar = $request->region_ar;
        $card->note_en = $request->note_en;
        $card->note_ar = $request->note_ar;
        $card->instruction_en = $request->instruction_en;
        $card->instruction_ar = $request->instruction_ar;
        $card->title_en = $request->title_en;
        $card->popular = $request->popular;
        $card->update();



        // Delete Card Type
        $oldIdsType = Arr::pluck($card->cardTypes, 'id');
        $newIdsType = array_filter(Arr::pluck($request->addMoreInputFields, 'id'), 'is_numeric'); 
        $delete = collect($oldIdsType)
                     ->filter(function ($model) use ($newIdsType) {
                             return !in_array($model, $newIdsType);
                      });
        foreach($delete as $id) {
            CardType::findOrFail($id)->delete();
        }
        // Update Or Create Card Type  
        foreach ($request->addMoreInputFields as $key => $value) {
            
            if (isset($value['id'])) {
                $cardType = CardType::findOrFail($value['id']);
                $cardType->type =  $value['type'];
                $cardType->price = $value['price'];
                $cardType->merchant_price = $value['merchant_price'];
                $cardType->update();
            } else {
                CardType::create([
                    'card_id' => $card->id,
                    'type' => $value['type'],
                    'price' => $value['price'],
                    'merchant_price' => $value['merchant_price']
                ]);
            }
            
        }

        return redirect()->back()->with('success', 'card has ben Updated');
    }

    public function destroy($id)
    {
        $card = $this->card::findOrFail($id);
        $filename = public_path().'/images/'.$card->cover_image;
        \File::delete($filename);
        $card->delete();
        return redirect(route('admin.card.index'))->with('success', 'Card Has Ben Deleted');
    }



    public function order()
    {
        $title = 'New Order Card';
        $orders = Order::where(
            [
                ['cardType_id', '!=', null],
                ['payment_status', '!=', 0],  
                'status' => '0',
            ])->get();
          
        return view('admin.card.order', compact('orders', 'title'));
    }

    public function orderFailed()
    {
        $title = 'Failed Orders Card';
        $orders = Order::where(
            [
                ['cardType_id', '!=', null],
                ['payment_status', '!=', 0],  
                'status' => '2',
            ])->latest()->get();
          
        return view('admin.card.order', compact('orders', 'title'));
    }

    public function orderConfermed()
    {
        $title = 'Confermed Orders Card';
        $orders = Order::where(
            [
                ['cardType_id', '!=', null],
                ['payment_status', '!=', 0],  
                'status' => '1',
            ])->latest()->get();
          
        return view('admin.card.order', compact('orders', 'title'));
    }
    public function paymentFaild()
    {
        $title = 'Payment Failed | Card';
        $orders = Order::where(
            [
                ['cardType', '!=', null],
                ['payment_status',  3],  
            
            ])->latest()->get();
          
        return view('admin.card.order', compact('orders', 'title'));
    }

    public function orderShow($order_id)
    {
        $order = Order::find($order_id);
        $title = 'card #Order"'.$order->id.'"';
        $user = User::where('email',$order->email)->first();
      
        return view('admin.card.show_order',compact('order', 'title', 'user'));
    }
}
