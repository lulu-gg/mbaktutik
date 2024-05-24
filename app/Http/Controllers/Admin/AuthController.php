<?php

namespace App\Http\Controllers\Admin;

use App\Enums\User\AccountStatusEnum;
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

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            if ((RoleHelpers::isAdmin() || RoleHelpers::isEventOrganizer()) && Auth::user()->account_status == AccountStatusEnum::Active) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'You do not have the required permission to access this resource.',
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

        return redirect('/dashboard');
    }
}
