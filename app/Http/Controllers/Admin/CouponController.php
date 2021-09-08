<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Coupon;
use App\Models\TopUp;
use Illuminate\Http\Request;

class CouponController extends Controller
{


    public $coupon;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Coupons';
        $coupons = $this->coupon::all();
        return view('admin.coupon.index',compact('coupons','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Or Update Coupon';
        $topUps = TopUp::all();
        $cards = Card::all();
        return view('admin.coupon.create',compact('title', 'topUps', 'cards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'coupon' => 'required',
            'discount' => 'required',
            'card_id' => 'required_without_all:topup_id,public',
            'topup_id' => 'required_without_all:card_id,public',
            'public' => 'required_without_all:card_id,topup_id',
        ]);

      
        if ($request->has('topup_id')){
            $topup = Coupon::firstOrNew([
                'topUp_id' => $request->topup_id,
                'coupon' =>  $request->coupon,
            ]);
            $topup->discount = $request->discount;
            $topup->save();
        }
        if ($request->has('card_id')){
            $card = Coupon::firstOrNew([
                'card_id' => $request->card_id,
                'coupon' =>  $request->coupon,
            ]);
            $card->discount = $request->discount;
            $card->save();
        }
        if ($request->public == 1){
            $public = Coupon::firstOrNew([
                'topUp_id' => null,
                'card_id' => null,
                'coupon' =>  $request->coupon,
            ]);
            $public->discount = $request->discount;
            $public->save();
        }
        return redirect()->route('admin.coupon.index')->with('success' , 'Coupon have been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->coupon::findOrFail($id)->delete();
        return redirect(route('admin.coupon.index'))->with('success', 'Coupon Has Ben Deleted');
    }
}
