<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopUpAmount;
use Illuminate\Http\Request;

class TopUpAmountController extends Controller
{
    public function index()
    {
        $amounts = TopUpAmount::all();
        $title = 'Top Up Amount';
        return view('admin.topup.index_amount',compact ('title', 'amounts'));
    }

    public function changeStatus($id)
    {
        $topUpAmount = TopUpAmount::findOrFail($id);
        $topUpAmount->status = !$topUpAmount->status;
        $topUpAmount->update();

        return redirect()->back()->with('success', 'Top Up Amount Status have been Updated successfully');
    }

    public function stock(Request $request,$id) 
    {
        $topUpAmount = TopUpAmount::findOrFail($id);
        $topUpAmount->stock = $request->stock;
        $topUpAmount->update();

        return redirect()->back()->with('success', 'Top Up Amount Stock have been Updated successfully');

    }
    public function destroy($id)
    {
         TopUpAmount::findOrFail($id)->delete();
        return redirect(route('admin.topup.amount.index'))->with('success', 'Top Up Amount have been Deleted successfully');
    }
}
