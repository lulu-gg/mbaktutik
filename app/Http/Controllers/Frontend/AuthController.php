<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\RoleHelpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check() && RoleHelpers::isScanOfficer()) return redirect('/');

        return view('frontend.auth.login');
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

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Check if the user is a Scan Officer
            if (RoleHelpers::isScanOfficer()) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            } else {
                // Log out if not a Scan Officer
                Auth::logout();
                return back()->withErrors([
                    'email' => 'You do not have the required role to access this resource.',
                ])->onlyInput('email');
            }
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

        return redirect('/');
    }
}
