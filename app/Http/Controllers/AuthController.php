<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        if (Auth::check() === true) {
            return "Logado";
        }else{
            return redirect()->route('logado.showLogin');
        }        
    }

    public function showLogin(){
        return view('login');
    }

    public function login(Request $request){
        
        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        auth('web')->attempt($credentials);
        auth('api')->attempt($credentials);

        return redirect()->route('products');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('logado.showLogin');
    }
}
