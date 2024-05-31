<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\EventOrganizer\EventOganizerStatusEnum;
use App\Helpers\CustomHelpers;
use App\Helpers\RoleHelpers;
use App\Http\Controllers\Controller;
use App\Models\Organizer;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    public function registerEventOrganizer()
    {
        if (Auth::check() && RoleHelpers::isScanOfficer()) return redirect('/');

        return view('frontend.auth.event-organizer.register-form');
    }

    public function registerEventOrganizerSubmit(Request $request)
    {
        $request->validate(Organizer::$rulesRegister);

        $uploadLogo = CustomHelpers::simpleFileUpload(requestFile: $request->logo, path: Organizer::$FILE_PATH);

        $uploadProposal = CustomHelpers::simpleFileUpload(requestFile: $request->proposal, path: Organizer::$FILE_PATH);

        $user = User::create([
            'name' => $request->company_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verify_token' => Str::random(30),
            'role_id' => RoleHelpers::$EVENT_ORGANIZER,
            'account_status' => 0,
        ]);

        $eventOrganizer = Organizer::create([
            ...$request->except(['logo', 'proposal']),
            'user_id' => $user->id,
            'status' => EventOganizerStatusEnum::WaitingApproval,
            'contact_person' => $request->email,
            'logo' => $uploadLogo,
            'proposal' => $uploadProposal,
        ]);

        return redirect("/register/event-organizer/thankyou");
    }

    public function registerEventOrganizerComplete()
    {
        return view('frontend.auth.event-organizer.register-complete');
    }

    public function registerTenant()
    {
        if (Auth::check() && RoleHelpers::isScanOfficer()) return redirect('/');

        return view('frontend.auth.tenant.register-form');
    }

    public function registerTenantSubmit(Request $request)
    {
        $request->validate(Tenant::$rulesRegister);
        
        $uploadPhoto = CustomHelpers::simpleFileUpload(requestFile: $request->photo, path: Tenant::$FILE_PATH);

        Tenant::create([
            ...$request->all(),
            'photo' => $uploadPhoto,
            'status' => 0,
        ]);

        return redirect("/register/tenant/thankyou");
    }

    public function registerTenantComplete()
    {
        return view('frontend.auth.tenant.register-complete');
    }
}
