<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Carbon\Carbon;

class UserController extends Controller
{

    
    public function showLoginForm(){
        if($user = Auth::user()){
            if($user->level == 'admin'){
                return redirect()->intended('dashboard');
            }
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {

       // kita buat validasi pada saat tombol login di klik
      // validas nya username & password wajib di isi 
      $request->validate([
        'username'=>'required',
        'password'=>'required'
    ]);

   
   // ambil data request username & password saja 
    $credential = $request->only('username','password');

  // cek jika data username dan password valid (sesuai) dengan data
    if(Auth::attempt($credential)){
       // kalau berhasil simpan data user ya di variabel $user
        $user =  Auth::user();
        // cek lagi jika level user admin maka arahkan ke halaman admin
        if($user->level =='admin'){
            return redirect()->intended('/dashboard')->with('sukses','Selamat datang Admin.');

        }
          
         // jika belum ada role maka ke halaman /
        return redirect()->intended('/tracking-hotline');
    }

// jika ga ada data user yang valid maka kembalikan lagi ke halaman login
// pastikan kirim pesan error juga kalau login gagal ya
    return redirect('/login')
        ->withInput()
        ->withErrors(['login_gagal'=>'These credentials does not match our records']);


    
    }

    public function showRegistrationForm(){
        return view('auth.register');
    }

    public function register(Request $request){
     
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
 
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'user', 
        ]);
 
        return redirect('/login')->with('success', 'Registration successful! Please log in.');
        // dd($request->input());
    }

    public function logout(Request $request){
        // logout itu harus menghapus session nya 
        
                $request->session()->flush();
        
        // jalan kan juga fungsi logout pada auth 
        
                Auth::logout();
        // kembali kan ke halaman login
                return Redirect('login');
    }

    public function processChangePassword(Request $request){

        //cek password lama yg dimiliki
        if(!Hash::check($request->old_password,auth()->user()->password)){
            return back()->with('error','old password does not match with your current password');
        }

        if($request->new_password != $request->repeat_password){

            return back()->with('error','new password and repeat password does not match');
        }
        
    }

    function edit_list(): View
    {
        $users = User::paginate(10);
        return view('users.user', compact('users'));
    }
    
}

