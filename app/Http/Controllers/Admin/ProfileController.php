<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $data = User::where(['id' => Auth::user()->id])->first();
        return view('admin.profile.index', [
            'data' => $data,
        ]);
    }

    public function save(Request $request)
    {
        $request->validate(['name' => 'required']);

        $data = User::where(['id' => Auth::user()->id])->first();
        $data->update([
            'name' => $request->name,
        ]);

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

        $user = User::where(['id' => Auth::user()->id])->first();
        if (!Hash::check($request->currentPassword, $user->password)) {
            return redirect()->back()->withErrors(['currentPassword' => 'The provided password does not match your current password.']);
        }
        $user->password = Hash::make($request->password);
        $user->save();

        noty('Berhasil Update Password', 'info');

        return redirect('/dashboard/profile/security');
    }
}
