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
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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
        if ($user_creds['id_role_fk'] == 2)
        {
            $user_name	= $user_creds['nama'];
			$user_id	= $user_creds['id'];
        } else
        {
            return redirect('login') -> with('error', 'Anda belum login');
        }

        $dbSupervisor = DB::table('plotting')
                        ->select('id_plot', 'id_petlap_fk', 'id_supervisor_fk', 'id_provinsi_fk', 'id_kabupaten_fk', 'kode_nks_fk', 'ruta', 'state')
                        ->where('id_supervisor_fk', '=', $user_id)
                        ->get();

        $petlapNames = DB::table('users')
                        ->join('plotting', 'plotting.id_petlap_fk', '=', 'users.id')
                        ->select('users.id', 'users.nama')
                        ->where('plotting.id_supervisor_fk', '=', $user_id)
                        ->groupBy('users.id', 'users.nama')
                        ->get();
        $photos = DB::table('photos')
        ->select('*')
        ->get();

        return view('supervisor', compact('user_name','dbSupervisor', 'petlapNames', 'photos'));
    }

	public function petlapPage()
    {
		$user_creds = Auth::user();
		if ($user_creds['id_role_fk'] == 1)
        {
            $user_name	= $user_creds['nama'];
			$user_id	= $user_creds['id'];
        } else
        {
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
		if ($user_creds['id_role_fk'] == 3)
        {
            $user_name	= $user_creds['nama'];
			$user_id	= $user_creds['id'];
        } else
        {
            return redirect('login') -> with('error', 'Anda belum login');
        }

        $dbUsers = DB::table('users')
                    ->select('id', 'nama', 'username', 'email', 'id_role_fk')
                    ->get();

        $dbPlot = DB::table('plotting')
                    ->select('*')
                    ->get();

        return view('admin', compact('user_name', 'dbUsers', 'dbPlot'));
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

    public function storeIMG(Request $request)
    {
            $validatedData = $request->validate([
             'image' => 'required|image|mimes:jpg,png,jpeg|max:8192',
             'id_plot_img' => 'required'

            ]);

            $name = 'photo' . $request->id_plot_img . '.jpg';
            $path = Storage::putFileAs('public/imejis', $request->file('image'), $name);

            if(Image::where('id_plot_fk', '=', $request -> id_plot_img) -> exists())
            {
                Image::where('id_plot_fk', $request -> id_plot_img)
                        ->update(['name' => $name], ['path' => $path]);

                return redirect('petlap')->with('status', 'Gambar telah ter-update');
            }

            $save = new Image;
            $save->name = $name;
            $save->path = $path;
            $save->id_plot_fk = $request -> id_plot_img;

            $save->save();

          return redirect('petlap')->with('status', 'Gambar telah ter-upload');
    }

    public function deleteData(Request $request)
    {
        $validatedData = $request->validate
        ([
             'id_plot' => 'required'
        ]);

        DB::delete('DELETE FROM plotting WHERE id_plot = ?', [$request -> id_plot]);

        return redirect('admin') -> with('successDelete', 'Plotting telah berhasil dihapus');
    }

    public function deleteImage(Request $request)
    {
        $validatedData = $request->validate
        ([
             'id_plot' => 'required'
        ]);

        DB::delete('DELETE FROM photos WHERE id_plot_fk = ?', [$request -> id_plot]);

        return redirect('supervisor') -> with('successDelete', 'Gambar telah berhasil dihapus');
    }

    public function webcam(Request $request)
    {
        $validatedData = $request->validate
        ([
            'image'         => 'required',
            'id_plot_img'   => 'required'
        ]);

        $img = $request->image;
        $image_parts = explode(";base64,", $img);
        $image_base64 = base64_decode($image_parts[1]);
        $name = 'photo' . $request->id_plot_img . '.jpg';
        $path = Storage::putFileAs('public/imejis', $img, $name);

        if(Image::where('id_plot_fk', '=', $request -> id_plot_img) -> exists())
            {
                Image::where('id_plot_fk', $request -> id_plot_img)
                        ->update(['name' => $name], ['path' => $path]);

                return redirect('petlap')->with('status', 'Gambar telah ter-update');
            }

        $save = new Image;
        $save->name = $name;
        $save->path = $path;
        $save->id_plot_fk = $request -> id_plot_img;

        $save->save();

        return redirect('petlap')->with('status', 'Gambar telah ter-upload');
    }
    // ============================================================================================= EMPLOYEES PAGE

    // ============================================================================================= VIEW ALYA
    /* public function petlap()
    {
		return view('petlap');
    } */

    // Landing Page
    public function landPage()
    {
		return view('landPage');
    }


}

