<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\TopUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lang = LaravelLocalization::getCurrentLocale();
       
                            
    
        $cards = Card::where([
                            'popular' => 1,
                            'status' => 0
                            ])
                            ->select('slug','title_'.$lang.' as title', 'cover_image')
                            ->take(6)
                            ->get();

        $new_cards = Card::where([
                                'status' => 0
                                ])
                                ->select('slug','title_'.$lang.' as title', 'cover_image')
                                ->orderBy('created_at', 'DESC')
                                ->take(6)
                                ->get();

        $topUps = TopUp::where([
                                'popular' => 1,
                                'status' => 0
                            ])
                            ->select('slug','title_'.$lang.' as title', 'cover_image')
                            ->take(6)
                            ->get();

        $new_topUps = TopUp::where([
                                'status' => 0
                            ])
                            ->select('slug','title_'.$lang.' as title', 'cover_image')
                            ->orderBy('created_at', 'DESC')
                            ->take(6)
                            ->get();

        return view('home', compact('topUps', 'cards', 'new_cards', 'new_topUps'));
    }


    public function profileIndex()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

}
