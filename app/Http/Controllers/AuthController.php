<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth-view.login');
    }
    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role_id == 2) {
                return redirect()->intended('/')->with('toast_success', 'Login Successfully!');
            } elseif (Auth::user()->role_id == 1) {
                return redirect('/admin-dashboard')->with('toast_success', 'Login Successfully!');
            }
        }
        Session::flash('status-login-fail', 'failed');
        Session::flash('message-login-fail', 'Login failed! Maybe your email and password are wrong');

        return redirect('/login');
    }
    public function create()
    {
        return view('Auth-view.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users|max:50',
            'password' => 'required|min:6|max:20',
        ]);
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        $user = User::create($data);
        if ($user) {
            Session::flash('status-register', 'success');
            Session::flash('message-register', 'Your account has been created, please login!');
        }
        return redirect('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('toast_success', 'Logout Successfully!');
    }
}
