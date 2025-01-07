<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){

        $users = User::findOrFail(Auth::id());

        return view('profile.index', compact('users'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
        ]);

        $users = User::find($id);

        $users->name = $request->name;
        $users->username = $request->username;
        $users->email = $request->email;  



        $users->save();

        return back()->with('sukses','Data profile berhasil diupdate.');
    }

    public function showChangePasswordForm()
    {
        return view('profile.change-password');
    }

    public function changePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        // Cek apakah password lama benar
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->withErrors(['old_password' => 'The provided password does not match our records.']);
        }

        // Update password baru
        Auth::user()->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('password.change')->with('success', 'Password updated successfully!');
    }
}
