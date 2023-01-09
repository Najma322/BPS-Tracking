<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bps_controller extends Controller
{
	// LOGIN SYSTEM ======================================================================================================
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
            return redirect('login') -> withError('Login details are not valid!');
        }
    }
	
	public function dashboard()
    {
        $member_list = starbucks_membership_model::paginate(5);

        // Username pattern per role
        $pattern_super	= "/man/";
        $pattern_petlap	= "/kas/";

        $user_creds = Auth::user();
		if (!is_null($user_creds)){
			$user_username = $user_creds['username'];
		}

        if(Auth::check()){
            if (preg_match($pattern_super, $user_username)) {
                // return view('starbucks.member_list', compact('member_list'))->with('i', (request()->input('page', 1) - 1) * 5);
                return redirect('super');
            } elseif (preg_match($pattern_petlap, $user_username)) {
                return redirect('petlap');
            } else {
                return redirect("login")->withSuccess('You are not allowed to access');
            }
        }
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
	// ================================================================================================== LOGIN SYSTEM
}
