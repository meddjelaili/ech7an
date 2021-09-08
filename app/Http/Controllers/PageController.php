<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Page;
use App\Models\TopUp;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Searchable\ModelSearchAspect;
use Spatie\Searchable\Search;

class PageController extends Controller
{
    //
    public $card;
    public $topUp;

    public function __construct(Card $card, TopUp $topUp)
    {
        $this->card = $card;
        $this->topUp = $topUp;
    }


    public function topups()
    {
        $title = 'Browse Top Up';
        $data = $this->topUp::select('slug','cover_image')->paginate(18);
        $routeName = 'buy.topup';
       
        return view('page.card',compact('data','title','routeName'));

    }
    public function cards()
    {
        $title = 'Browse Cards';
        $data = $this->card::where('status', '0')->select('slug','cover_image')->paginate(18);
        $routeName = 'buy.card';
       
        return view('page.card',compact('data','title','routeName'));
    }
    public function search(Request $request)
    {
      
        $title = "\"$request->search\"";
        
        $data = (new Search())
                ->registerModel(TopUp::class, ['title_en', 'title_ar'], function(ModelSearchAspect $modelSearchAspect) {
                    $modelSearchAspect->where('status', '1') ;
                })
                ->registerModel(Card::class, ['title_en', 'title_ar'], function(ModelSearchAspect $modelSearchAspect) {
                    $modelSearchAspect->where('status', '1') ;
                })
         
                ->search($request->get('search'));


        return view('page.search', compact('data', 'title'));
    }

    public function page($slug)
    {
 
        $lang = LaravelLocalization::getCurrentLocale();
        $page = Page::where('slug', $slug)->select(
            'title_'.$lang.' as title',
            'content_'.$lang.' as content',
         )->first();

        return view('page.page',compact('page'));
    }
}
