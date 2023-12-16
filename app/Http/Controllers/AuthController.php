<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginform(){
        return view('loginform');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
    ]);
    $userinofo=$request->only('email', 'password');
    if(Auth::attempt( $userinofo)){
        if(Auth::user()->role==1){
            return redirect()->route('dashboard');
        }else{
            return redirect('/login');
        }
    }
    else{
        return back()->with('error', 'Email or password inncorrect');
    }


    }
    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
