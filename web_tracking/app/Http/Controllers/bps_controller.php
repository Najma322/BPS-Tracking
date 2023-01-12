<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\bps_plotting_model;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

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
			$user = Auth::getProvider()->retrieveByCredentials($credentials);
			Auth::login($user, $request->get('remember'));

            return redirect()   -> intended('dashboard');
        } else {
            return redirect('login') -> with('error', 'Akun tidak sesuai!');
        }
    }

	public function dashboard()
    {
        // Username pattern per role
        $pattern_super	= "/sup/";
        $pattern_petlap	= "/lap/";
		$pattern_mimin	= "/min/";

        // Check for role
        $user_creds = Auth::user();
		if (!is_null($user_creds)){
			$user_role= $user_creds['id_role_fk'];
		}

        if(Auth::check()){
            // Supervisor
            if ($user_role == 2) {
                return redirect('super');
            // Petugas lapangan
            } elseif ($user_role == 1) {
                return redirect('petlap');
            // Super admin
			} elseif ($user_role == 3) {
                return redirect('admin');
            } else {
                return redirect("login")->with('error', 'Kredensial error');
            }
        }
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
	// ================================================================================================== LOGIN SYSTEM

	// REGISTRATION SYSTEM ===========================================================================================
    public function registration()
    {
        return view('register');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name'      => 'required|string',
            'username'  => 'required|string|unique:users',
			'email'     => 'required|email',
            'password'  => 'required|confirmed|min:6',
			'petugas'	=> 'required'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("login")->with('success', 'Akun berhasil didaftarkan');
    }

    public function create(array $data)
    {
      return User::create([
        'nama'      	=> $data['name'],
        'username'  	=> $data['username'],
		'email'  		=> $data['email'],
		'id_role_fk'	=> $data['petugas'],
        'password'  	=> Hash::make($data['password'])
      ]);
    }
    // ========================================================================================== REGISTRATION SYSTEM

	// EMPLOYEES PAGE ============================================================================================
    public function superPage()
    {
		$user_creds = Auth::user();
		if (!is_null($user_creds)){
			$user_name	= $user_creds['nama'];
			$user_id	= $user_creds['id'];
		} else {
            return redirect('login') -> with('error', 'Anda belum login');
        }

        return view('supervisor', compact('user_name'));
    }

	public function petlapPage()
    {
		$user_creds = Auth::user();
		if (!is_null($user_creds)){
			$user_name	= $user_creds['nama'];
			$user_id	= $user_creds['id'];
		} else {
            return redirect('login') -> with('error', 'Anda belum login');
        }

        return view('petlap', compact('user_name'));
    }

	public function miminPage()
    {
		$user_creds = Auth::user();
		if (!is_null($user_creds)){
			$user_name	= $user_creds['nama'];
			$user_id	= $user_creds['id'];
		} else {
            return redirect('login') -> with('error', 'Anda belum login');
        }

        return view('admin', compact('user_name'));
    }

    public function createPlotting(Request $request)
    {
        $request->validate([
            'id_user'		=> 'required',
            'id_provinsi'	=> 'required',
            'id_kabupaten'	=> 'required',
            'id_nks'        => 'required',
            'ruta_range'	=> 'required',
        ]);

        $plotting = new bps_plotting_model;
        $plotting -> id_user_fk			= $request -> id_user;
        $plotting -> id_provinsi_fk		= $request -> id_provinsi;
        $plotting -> id_kabupaten_fk	= $request -> id_kabupaten;
        $plotting -> id_nks_fk			= $request -> id_nks;
        $plotting -> ruta				= $request -> ruta_range;
        $plotting -> save();

        return redirect('miminPage')->with('success', 'Plotting telah berhasil ditambahkan');
    }
    // ============================================================================================= EMPLOYEES PAGE

    // ============================================================================================= VIEW ALYA
    /* public function petlap()
    {
		return view('petlap');
    } */

    public function admin()
    {
		return view('admin');
    }

    public function supervisor()
    {
		return view('supervisor');
    }
}

