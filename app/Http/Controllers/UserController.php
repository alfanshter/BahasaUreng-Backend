<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
        public function login()
        {
                return view('login');
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
}
