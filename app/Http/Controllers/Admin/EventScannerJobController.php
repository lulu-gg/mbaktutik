<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\EventPermissionHelpers;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\EventScannerJob;
use App\Models\TicketVariation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventScannerJobController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Events $event)
    {
        EventPermissionHelpers::isEventOwner($event);

        $registeredScanner = EventScannerJob::where('event_id', $event->id)->pluck('user_id')->toArray();
        $scanners = User::where('organizer_id', Auth::user()->organizer->id)->where('account_status', 1)->whereNotIn('id', $registeredScanner)->get();
        
        if ($scanners->count() == 0) {
            noty('Tidak ada scanner officer tersedia', 'error');
            
            return redirect("/dashboard/events/$event->id");
        }
        
        return view('admin.events.scanner.create', [
            'event' => $event,
            'scanners' => $scanners,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Events $event)
    {
        EventPermissionHelpers::isEventOwner($event);

        EventScannerJob::create([
            'event_id' => $event->id,
            'user_id' => $request->user_id,
        ]);

        noty('Berhasil Simpan Data', 'info');

        return redirect("/dashboard/events/$event->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventScannerJob  $scanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $event, EventScannerJob $scanner)
    {
        EventPermissionHelpers::isEventOwner($event);

        try {
            $scanner->delete();
            noty('Berhasil Hapus Data', 'info');
        } catch (\Exception $e) {
            noty('Gagal Hapus Data', 'error');
        }

        return redirect("/dashboard/events/$event->id");
    }
}
