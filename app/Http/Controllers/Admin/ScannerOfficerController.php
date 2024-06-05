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

class ScannerOfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = User::where('role_id', RoleHelpers::$SCAN_OFFICER);

        $data = RoleHelpers::isAdmin() ? $query->get() : $query->where('organizer_id', Auth::user()->organizer->id)->get();
        return view('admin.scanner-officer.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.scanner-officer.create');
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
            'role_id' => RoleHelpers::$SCAN_OFFICER,
            'account_status' => 1,
            'organizer_id' => RoleHelpers::isAdmin() ? Organizer::getInternalOrganizerId() : Auth::user()->organizer->id,
        ]);

        noty("Berhasil membuat scan officer", 'info');

        return redirect('dashboard/scanner-officer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $scanner_officer)
    {
        return view('admin.scanner-officer.show', ['user' => $scanner_officer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $scanner_officer)
    {
        return view('admin.scanner-officer.edit', [
            'data' => $scanner_officer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $scanner_officer)
    {
        $request->validate(User::$rulesEdit);
        if ($request->password == null) {
            $scanner_officer->update($request->except('password'));
        } else {
            $request->validate(User::$rulesWithPassword);
            $scanner_officer->update([...$request->all(), 'password' => Hash::make($request->password)]);
        }

        noty("Berhasil edit scan officer", 'info');

        return redirect('dashboard/scanner-officer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $e) {
            noty("Gagal menghapus user", 'error');
        }

        return redirect("dashboard/scanner-officer");
    }
}
