<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EventOrganizer\EventOganizerStatusEnum;
use App\Enums\Tenant\TenantStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Tenant;

class TenantRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tenant::where(['status' => TenantStatusEnum::WaitingApproval])->get();
        return view('admin.tenant.index', [
            'data' => $data,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        if ($tenant->status != TenantStatusEnum::WaitingApproval) {
            noty('Tenant telah disetujui sebelumnya', 'error');
            return redirect('/dashboard/tenant-registration');
        }

        return view('admin.tenant.show', [
            'data' => $tenant,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accept(Tenant $tenant)
    {
        if ($tenant->status != EventOganizerStatusEnum::WaitingApproval) {
            noty('Tenant telah disetujui sebelumnya', 'error');
            return back();
        }

        $tenant->update(['status' => EventOganizerStatusEnum::Active]);

        noty('Berhasil menyetujui pendaftaran', 'info');


        return redirect('/dashboard/tenant-registration');
    }
}
