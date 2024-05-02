<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register()
    {
        return view('register');
    }
    
    public function registerPost(Request $request)
    {

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Pendaftaran Akun Berhasil');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/home')->with('success', 'Berhasil Masuk ke Akun');
        }

        return back()->with('error', 'Email atau Password Salah');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('home')->with('success', 'Penggantian Profil Berhasil');
    }
}