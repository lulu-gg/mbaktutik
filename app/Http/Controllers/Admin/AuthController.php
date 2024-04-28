<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RoleHelpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check() && RoleHelpers::isAdmin()) return redirect()->route('admin.home');

        return view('admin.auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials) && (RoleHelpers::isAdmin())) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin');
    }
}
