<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RoleHelpers;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Organizer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('role_id', RoleHelpers::$ADMIN)->get();

        return view('admin.user.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereIn('id', [1, 2])->get();
        return view('admin.user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(User::$rulesRegister);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verify_token' => Str::random(30),
            'role_id' => RoleHelpers::$ADMIN,
            'account_status' => 1,
        ]);

        noty("Berhasil membuat admin", 'info');

        return redirect('dashboard/user/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin)
    {
        return view('admin.user.show', ['user' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        try {
            $adminLeft = User::where('role_id', RoleHelpers::$ADMIN)->count();

            if (RoleHelpers::isAdmin() && $adminLeft <= 1) {
                noty("Minimal harus ada 1 admin tersedia", 'error');
                return redirect("dashboard/user/admin");
            }

            $admin->delete();
            noty("Berhasil menghapus user", 'info');
        } catch (\Exception $e) {
            noty("Gagal menghapus user", 'error');
        }

        return redirect("dashboard/user/admin");
    }

    public function organizer()
    {
        $data = User::where('role_id', RoleHelpers::$EVENT_ORGANIZER)->get();

        return view('admin.user.organizer.index', ['data' => $data]);
    }

    public function scannerOfficer()
    {
        $data = User::where('role_id', RoleHelpers::$SCAN_OFFICER)->get();

        return view('admin.user.scanner-officer.index', ['data' => $data]);
    }
}
