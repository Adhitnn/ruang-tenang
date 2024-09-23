<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|max:100',
        ]);
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('articles');
        }
    }
}
