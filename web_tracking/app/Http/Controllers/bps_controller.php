<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        return view('registration');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name'      => 'required|string',
            'username'  => 'required|string|unique:users',
			'email'      => 'required|email',
            'password'  => 'required|min:3',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("login")->withSuccess('You have signed up successfully!');
    }

    public function create(array $data)
    {
      return userStarbucks::create([
        'name'      => $data['name'],
        'username'  => $data['username'],
        'password'  => Hash::make($data['password'])
      ]);
    }
    // ========================================================================================== REGISTRATION SYSTEM
	
	// EMPLOYEE PAGES ============================================================================================
    public function manager()
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
		
        return view('starbucks.manager', compact('user_username', 'user_id', 'data_toko', 'data_karyawan', 'data_produk', 'total_penjualan'));
    }

    public function store_karyawan(Request $request)
    {
        $request->validate([
            'nama'           => 'required',
            'gender_member'         => 'required',
            'nomor_telepon_member'  => 'required',
            'alamat_member'         => 'nullable',
            'tanggal_lahir_member'  => 'required',
            'email'                 => 'required',
            'username'              => 'required',
            'password'              => 'required',
        ]);

        $member = new starbucks_membership_model;
        $member -> nama                 = $request -> nama;
        $member -> jenis_kelamin        = $request -> gender_member;
        $member -> nomor_telepon        = $request -> nomor_telepon_member;
        $member -> alamat               = $request -> alamat_member;
        $member -> tanggal_lahir        = $request -> tanggal_lahir_member;
        $member -> email                = $request -> email;
        $member -> username             = $request -> username;
        $member -> password             = Hash::make($request->password);
        $member -> save();

        return redirect('catalog')->with('success', 'Data member telah berhasil diinput');
    }
    // =============================================================================================MANAGER
    public function register()
    {
        return view('register');
    }


}

