<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bps_controller extends Controller
{
    public function login()
    {
		return view('login');
    }
    
    public function customLogin(Request $request)
    {
		$request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request -> only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()   -> intended('dashboard')
                                -> withSuccess('Signed in');
        } else {
            return redirect("login") -> withSuccess('Login details are not valid');
        }
    }
}
