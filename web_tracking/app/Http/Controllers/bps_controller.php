<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\bps_plotting_model;
use App\Models\Image;
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
                return redirect('supervisor');
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

        return redirect("admin")->with('success', 'Akun berhasil didaftarkan');
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
        $dbSupervisor = DB::table('plotting')
        ->select('id_plot', 'id_petlap_fk', 'id_provinsi_fk', 'id_kabupaten_fk', 'kode_nks_fk', 'ruta', 'state')
        ->get();
        return view('supervisor', compact('user_name','dbSupervisor'));
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

        $dbPlotting = DB::table('plotting')
                        ->select('id_plot', 'id_petlap_fk', 'id_provinsi_fk', 'id_kabupaten_fk', 'kode_nks_fk', 'ruta', 'state')
                        ->where('id_petlap_fk', '=', $user_id)
                        ->get();

        return view('petlap', compact('user_name', 'dbPlotting'));
    }

	public function miminPage()
    {
		$user_creds = Auth::user();
		if (!is_null($user_creds)){
			$user_name	= $user_creds['nama'];
			$user_id	= $user_creds['id'];
            $user_role  = $user_creds['id_role_fk'];
		} else {
            return redirect('login') -> with('error', 'Anda belum login');
        }

        $dbUsers = DB::table('users')
                    ->select('id', 'nama', 'username', 'email', 'id_role_fk')
                    ->get();

        return view('admin', compact('user_name', 'dbUsers'));
    }

    public function createPlotting(Request $request)
    {
        $request->validate
        ([
            'id_petlap'      => 'required',
            'id_supervisor'  => 'required',
            'id_provinsi'    => 'required',
            'id_kabupaten'   => 'required',
            'kode_nks'       => 'required',
            'ruta_range'     => 'required',
        ]);

        for ($x = 1; $x <= $request -> ruta_range; $x++)
        {
            $plotting = new bps_plotting_model;
            $plotting -> id_petlap_fk		= $request -> id_petlap;
            $plotting -> id_supervisor_fk	= $request -> id_supervisor;
            $plotting -> id_provinsi_fk		= $request -> id_provinsi;
            $plotting -> id_kabupaten_fk	= $request -> id_kabupaten;
            $plotting -> kode_nks_fk		= $request -> kode_nks;
            $plotting -> ruta				= $x;
            $plotting -> save();
        }

        return redirect('admin')->with('successPlot', 'Plotting telah berhasil ditambahkan');
    }

    public function updatePlotting(Request $request)
    {
        $request -> validate
        ([
            'status'    => 'required',
            'id_plot'   => 'required'
        ]);

        bps_plotting_model::where('id_plot', $request -> id_plot)
                            ->update(['state' => $request -> status]);

        return redirect('petlap') -> with('successUpdate', 'Status plot telah di-update!');
    }
    // ============================================================================================= EMPLOYEES PAGE

    // ============================================================================================= VIEW ALYA
    /* public function petlap()
    {
		return view('petlap');
    } */
   
        public function index()
        {
            return view('image');
        }
     
        public function store(Request $request)
        {
             
            $validatedData = $request->validate([
             'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
     
            ]);
     
            $name = $request->file('image')->getClientOriginalName();
     
            $path = $request->file('image')->store('public/bps_resources/upload');
     
     
            $save = new Image;
     
            $save->name = $name;
            $save->path = $path;
     
            $save->save();
     
          return redirect('image-upload')->with('status', 'Image Has been uploaded')->with('image',$name);
    }
    
}

