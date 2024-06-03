<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EventOrganizer\EventOganizerStatusEnum;
use App\Enums\User\AccountStatusEnum;
use App\Http\Controllers\Controller;
use App\Jobs\SendBroadcastMailJob;
use App\Models\GeneralParamter;
use App\Models\Organizer;
use Illuminate\Http\Request;

class OrganizerRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Organizer::where(['status' => EventOganizerStatusEnum::WaitingApproval])->get();
        return view('admin.organizer-registration.index', [
            'data' => $data,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Organizer $organizer)
    {
        if ($organizer->status != EventOganizerStatusEnum::WaitingApproval) {
            noty('Event Organizer telah disetujui sebelumnya', 'error');
            return redirect('/dashboard/organizer-registration');
        }

        return view('admin.organizer-registration.show', [
            'data' => $organizer,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accept(Organizer $organizer)
    {

        if ($organizer->status != EventOganizerStatusEnum::WaitingApproval) {
            noty('Event Organizer telah disetujui sebelumnya', 'error');
            return back();
        }

        $organizer->update(['status' => EventOganizerStatusEnum::Active]);
        $organizer->user->update(['account_status' => AccountStatusEnum::Active]);

        noty('Berhasil menyetujui pendaftaran', 'info');

        // SEND EMAIL NOTIF TO EO
        $receivers = [$organizer->user->email];
        $subject =  "Selamat datang di Rive!";
        $message = view('common.mail.welcome.welcome', ['organizer' => $organizer])->render();
        dispatch(new SendBroadcastMailJob($receivers, $subject, $message));


        return redirect('/dashboard/organizer-registration');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reject(Organizer $organizer)
    {

        if ($organizer->status != EventOganizerStatusEnum::WaitingApproval) {
            noty('Event Organizer telah disetujui sebelumnya', 'error');
            return back();
        }

        $organizer->update(['status' => EventOganizerStatusEnum::Reject]);
        $organizer->user->update(['account_status' => AccountStatusEnum::NonActive]);

        noty('Berhasil menolak pendaftaran', 'info');

        // SEND EMAIL NOTIF TO EO
        $receivers = [$organizer->user->email];
        $subject =  "Pendaftaran Event Organizer di Rive Tidak Dapat Diterima!";
        $supportEmail = GeneralParamter::first()->email;
        $message = view('common.mail.welcome.rejected', ['organizer' => $organizer, 'supportEmail' => $supportEmail])->render();
        dispatch(new SendBroadcastMailJob($receivers, $subject, $message));


        return redirect('/dashboard/organizer-registration');
    }
}
