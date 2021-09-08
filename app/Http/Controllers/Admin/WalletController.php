<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class WalletController extends Controller
{
    public function index()
    {
        $title = 'Top Up Wallets';
        $transactions = Transaction::where([
                                    'confirmed' => 0,
                                    'meta->status' => 0,
                                    ])->get();

        return view('admin.wallet.index', compact('title','transactions'));
    }

    public function rejectedOrder()
    {
        $title = 'Rejected Order Wallets';
        $transactions = Transaction::where([
                                    'confirmed' => 0,
                                    'meta->status' => 2,
                                    ])->get();

        return view('admin.wallet.rejected_order', compact('title','transactions'));
    }

    public function confirmedOrder()
    {
        $title = 'Confirmed Order Wallets';
        $transactions = Transaction::where([
                                    'confirmed' => 1,
                                    'meta->status' => 1,
                                    ])->get();

        return view('admin.wallet.confirmed_order', compact('title','transactions'));
    }

    public function confirme($id )
    {


        DB::table('transactions')
            ->where('id', $id)
            ->update([
                'meta->status' => 1,
                'confirmed' => true,
                ]);

        return redirect()->back()->with('success', 'Wallet shipped successfully');
    }
    public function unconfirme($id )
    {

        DB::table('transactions')
            ->where('id', $id)
            ->update(['meta->status' => 2]);

        return redirect()->back()->with('success', 'Wallet recharge denied');
    }






    public function pdfDownload($pdf_name)
    {
        $file = public_path(). "/pdf/".$pdf_name;
        $headers = array(
            'Content-Type: application/pdf',
          );

        return Response::download($file, $pdf_name, $headers);
    }
    
    public function imgDownload($img_name)
    {
        $file = public_path(). "/images/wallet/".$img_name;
        $headers = array(
            'Content-Type: image/*',
          );

        return Response::download($file, $img_name, $headers);
    }
}
