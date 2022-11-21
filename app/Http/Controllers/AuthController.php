<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $r) {
        $islogged = Auth::check();
        if($islogged) {
            return redirect(route('home'));
        }
        return view('login');
    }
    public function login_action(Request $r) {
        $validator = $r->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($validator)) {
            return redirect(route('home'));
        }
    }

    public function register(Request $r) {
        $islogged = Auth::check();
        if($islogged) {
            return redirect(route('home'));
        }
        return view('register');
    }
    
    public function register_action(Request $r) {

        $r->validate([
            // 'name' => 'required',
            'name' => ['required'],
            // 'email' => 'required|email|unique:users',
            'email' => ['required', 'email', 'unique:users'],
            // 'password' => 'required|min:6|confirmed',
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $data = $r->only(['name', 'email', 'password']);
        $data['password'] = Hash::make($data['password']); 

        User::create($data);
        return redirect(route('login'));
    }

    public function logout() {
        Auth::logout();
        return redirect(route('login'));
    }

}

