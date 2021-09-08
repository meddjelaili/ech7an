<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function order()
    {
        $title = 'New Order Merchant';
        $merchants = Merchant::where('active', 0)->get();
        return view('admin.merchant.order', compact('title', 'merchants'));
    }

    public function upgrade($id)
    {
        $merchant = Merchant::find($id);
        $merchant->active = true;
        $merchant->update();

        return back()->with('success', 'Upgraded successfully');
    }

    public function delete($id)
    {
        Merchant::find($id)->delete();

        return back()->with('success', 'Deleted successfully');
    }


    public function allMerchant()
    {
        $title = 'all Merchants';
        $merchants = Merchant::where('active', 1)->get();
        return view('admin.merchant.all_merchant', compact('title', 'merchants'));
    }
}
