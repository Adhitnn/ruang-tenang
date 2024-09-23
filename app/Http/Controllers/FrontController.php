<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){

        return view('home');
    }

    public function aboutus(){
        return view('aboutus');
    }

    public function articles(){
        return view('articles');
    }
   
    public function contact(){
        return view('contact');
    }
}
