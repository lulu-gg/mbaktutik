<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CustomHelpers;
use App\Http\Controllers\Controller;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $data = User::where(['id' => Auth::user()->id])->firstOrFail();
        return view('admin.profile.index', [
            'data' => $data,
        ]);
    }

    public function save(Request $request)
    {
        $request->validate(['name' => 'required']);

        $data = User::where(['id' => Auth::user()->id])->firstOrFail();
        $data->update([
            'name' => $request->name,
        ]);

        if ($request->hasFile('photo')) {
            // Validate the input
            $request->validate([
                'photo' => ['required', 'image', 'mimes:jpeg,png', 'max:2048'],
            ]);

            $photo = CustomHelpers::simpleFileUpload(requestFile: $request->photo, path: User::$FILE_PATH);
            $data->update(['photo' => $photo]);
        }

        noty('Berhasil Simpan Data', 'info');

        return redirect('/dashboard/profile');
    }

    public function security()
    {
        return view('admin.profile.security');
    }

    public function updateSecurity(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required',
            'password_confirmation' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/[a-z]/', $value)) {
                        return $fail('The ' . $attribute . ' must contain at least one lowercase character.');
                    }
                    if (!preg_match('/[\d\s\W]/', $value)) {
                        return $fail('The ' . $attribute . ' must contain at least one number, symbol, or whitespace character.');
                    }
                },
            ],
        ]);

        $user = User::where(['id' => Auth::user()->id])->firstOrFail();
        if (!Hash::check($request->currentPassword, $user->password)) {
            return redirect()->back()->withErrors(['currentPassword' => 'The provided password does not match your current password.']);
        }
        $user->password = Hash::make($request->password);
        $user->save();

        noty('Berhasil Update Password', 'info');

        return redirect('/dashboard/profile/security');
    }

    public function organizer()
    {
        $data = Organizer::where(['user_id' => Auth::user()->id])->firstOrFail();
        return view('admin.profile.organizer', [
            'data' => $data,
        ]);
    }

    public function updateOrganizer(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'about_us' => 'required',
            'username' => 'required',
            'province' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'address' => 'required',
        ]);

        $data = Organizer::where(['user_id' => Auth::user()->id])->firstOrFail();

        if ($request->hasFile('logo')) {
            // Validate the input
            $request->validate([
                'logo' => ['required', 'image', 'mimes:jpeg,png', 'max:2048'],
            ]);

            $logo = CustomHelpers::simpleFileUpload(requestFile: $request->logo, path: Organizer::$FILE_PATH);
            $data->update(['logo' => $logo]);
        }

        $data->update([
            ...$request->except('logo')
        ]);

        noty('Berhasil Simpan Data', 'info');

        return redirect('/dashboard/profile/organizer');
    }
}
