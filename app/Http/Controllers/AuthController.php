<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect('/dashboard');
        }

        return view('page.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('nim', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'auth' => 'NIM atau Password salah.',
        ]);
    }

    public function register()
    {
        if (auth()->check()) {
            return redirect('/dashboard');
        }

        return view('page.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = \App\Models\User::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect('/');
    }
}
