<?php

namespace App\Http\ViewComposers;

use App\Models\Page;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Permission\Models\Role;

class SettingComposer
{
    protected $pages;
    protected $settings;
    protected $isAdmin;

    public function __construct()
    {
        $lang = LaravelLocalization::getCurrentLocale();
        $this->pages = Page::select(
            'title_' . $lang . ' as title',
            'slug',
        )->get();

        $this->settings = Setting::pluck('value', 'name')->all();
        if (Auth::check()) {
            if (Auth::user()->hasAllRoles(Role::all())) {
                $this->isAdmin = true;
            } else {
                $this->isAdmin = false;
            }
        }
    }


    public function compose(View $view)
    {
        return $view->with([
            'pages' => $this->pages,
            'settings' => $this->settings,
            'isAdmin' => $this->isAdmin,
        ]);
    }
}
