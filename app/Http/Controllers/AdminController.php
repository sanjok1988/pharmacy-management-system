<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    protected $lang;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }

    
    public function adminprofile()
    {
        return view('admin.profile');
    }

    public function setLocale($lang)
    {
        Cookie::queue('locale', $lang);
        return redirect(url(URL::previous()));
    }
}
