<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index(){
        return view('index');
    }

    function nav(){
        return view('/template/sinav');
    }

    function login(){
        return view('login');
    }

    function auth(Request $request){
        $validateData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($validateData)) {
            return redirect('dashboard');
        }

        return redirect('')->with('Pesan', 'Login Gagal');
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }


}
