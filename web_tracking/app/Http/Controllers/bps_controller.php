<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\bps_plotting_model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            return redirect()   -> intended('dashboard');
        } else {
            return redirect('login') -> with('error', 'Akun salah!');
        }
    }
	
	public function dashboard()
    {
        $member_list = starbucks_membership_model::paginate(5);

        // Username pattern per role
        $pattern_super	= "/man/";
        $pattern_petlap	= "/kas/";
		$pattern_mimin	= "/min/";

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
			} elseif (preg_match($pattern_mimin, $user_username)) {
                return redirect('mimin');
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
            'password'  => 'required|min:3',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("login")->withSuccess('You have signed up successfully!');
    }

    public function create(array $data)
    {
      return User::create([
        'name'      => $data['name'],
        'username'  => $data['username'],
		'email'  	=> $data['email'],
        'password'  => Hash::make($data['password'])
      ]);
    }
    // ========================================================================================== REGISTRATION SYSTEM
	
	// EMPLOYEES PAGE ============================================================================================
    public function superPage()
    {
		$user_creds = Auth::user();
		if (!is_null($user_creds)){
			$user_username 	= $user_creds['name'];
			$user_id		= $user_creds['id'];
		}

        $data_toko = DB::table('toko') -> get();
        $data_karyawan = DB::table('data_karyawan') -> get();
        $data_produk = DB::table('produk') -> get();
        $total_penjualan = DB::table('detail_pemesanan')
                            ->select('kode_produk_fk', DB::raw('SUM(jumlah_pembelian) as total_pembelian'))
                            ->groupByRaw('kode_produk_fk')
                            ->get();
		
        return view('super', compact('user_username', 'user_id', 'data_toko', 'data_karyawan', 'data_produk', 'total_penjualan'));
    }
	
	public function petlapPage()
    {
		$user_creds = Auth::user();
		if (!is_null($user_creds)){
			$user_username 	= $user_creds['name'];
			$user_id		= $user_creds['id'];
		}

        $data_toko = DB::table('toko') -> get();
        $data_karyawan = DB::table('data_karyawan') -> get();
        $data_produk = DB::table('produk') -> get();
        $total_penjualan = DB::table('detail_pemesanan')
                            ->select('kode_produk_fk', DB::raw('SUM(jumlah_pembelian) as total_pembelian'))
                            ->groupByRaw('kode_produk_fk')
                            ->get();
		
        return view('petlap', compact('user_username', 'user_id', 'data_toko', 'data_karyawan', 'data_produk', 'total_penjualan'));
    }
	
	public function miminPage()
    {
		$user_creds = Auth::user();
		if (!is_null($user_creds)){
			$user_username 	= $user_creds['name'];
			$user_id		= $user_creds['id'];
		}

        $data_toko = DB::table('toko') -> get();
        $data_karyawan = DB::table('data_karyawan') -> get();
        $data_produk = DB::table('produk') -> get();
        $total_penjualan = DB::table('detail_pemesanan')
                            ->select('kode_produk_fk', DB::raw('SUM(jumlah_pembelian) as total_pembelian'))
                            ->groupByRaw('kode_produk_fk')
                            ->get();
		
        return view('mimin', compact('user_username', 'user_id', 'data_toko', 'data_karyawan', 'data_produk', 'total_penjualan'));
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
    public function petlap()
    {
		return view('petlap');
    }
    

}

