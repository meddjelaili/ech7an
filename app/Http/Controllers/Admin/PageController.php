<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pages';
        $pages = Page::all();
        return view('admin.page.index', compact('title', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Page';
        return view('admin.page.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'content_ar' => 'required',
            'content_en' => 'required'
        ]);

        Page::create([
            'slug' => SlugService::createSlug(Page::class, 'slug', $request->title_en),
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'content_ar' => $request->content_ar,
            'content_en' => $request->content_en,
        ]);

        return redirect()->back()->with('success', 'Page has been Created');  
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
        $page = Page::findOrFail($id);
        $title = 'Edit '.$page->title_en;
        return view('admin.page.edit', compact('page', 'title'));
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
        $request->validate([
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'content_ar' => 'required',
            'content_en' => 'required'
        ]);
        $page = Page::findOrFail($id);
        $page->title_en = $request->title_en;
        $page->title_ar = $request->title_ar;
        $page->content_ar = $request->content_ar;
        $page->content_en = $request->content_en;
        $page->update();

        return redirect()->back()->with('success', 'Page has been Updated');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::findOrFail($id)->delete();
        return redirect(route('admin.pages.index'))->with('success', 'Page Has Ben Deleted');
    }
}
