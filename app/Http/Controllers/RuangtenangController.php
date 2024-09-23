<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuangtenangController extends Controller
{
    public function create()
    {
        return view('create');
    }
    public function contact()
    {
        return view('contact');
    }
    public function home()
    {
        return view('home');
    }
    public function articles()
    {
        return view('articles');
    }
    public function aboutus()
    {
        return view('aboutus');
    }
}
