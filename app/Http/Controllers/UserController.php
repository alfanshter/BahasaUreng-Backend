<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
        public function login()
        {
                return view('login');
        }

        public function authenticate(Request $request)
        {
            $credentials = $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

    
            if (Auth::attempt($credentials)) {

                $request->session()->regenerate();
                return redirect()->intended('/')->with('failed', 'Login gagal');;
            }

            return redirect('/login')->with('failed', 'Login gagal');

        }
    

        public function register()
        {
                return view('register');
        }

        public function register_proses(Request $request)
        {
                $validatedData = $request->validate([
                        'name' => 'required|max:255',
                        'email' => ['required', 'min:3', 'max:255', 'unique:users'],
                        'password' => ['required', 'min:5'],
                ]);
                
                $validatedData['role'] = 1;
                $validatedData['password'] = Hash::make($validatedData['password']);
                User::create($validatedData);
                notify()->success('Pendaftaran Berhasil', 'User');
                return redirect('/login');
        }

        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect('/login');
        }
}
