<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register() {
        return view('register');
    }

    public function registerPost(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Registeration Completed Successfully!');
    }

    public function login() {
        return view('login');
    }

    public function loginPost(Request $request) {
        $credential = [
            'email' => $request->email, 
            'password' => $request->password
        ];

        if(Auth::attempt($credential)) {
            return redirect('/')->with('success', 'Login was successfull!');
        }

        return back()->with('error', 'Wrong Email or password!');
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }
}
