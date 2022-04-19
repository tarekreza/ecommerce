<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function loginCheck(Request $request)
    {
        if(Auth::attempt([ 'email' => $request->email, 'password' =>$request->password]))
        {
            if(Auth::user()->role == 2) {
                return redirect()->route('adminDashboard');
            } else {
                // return redirect()->route('home');
                dd('user');
            }
        }
        return view('auth.login');

    }




    public function signup(){
        return view('auth.signup');
    }
public function register(Request $request){
    dd($request->all());

}
}
