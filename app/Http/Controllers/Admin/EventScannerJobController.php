<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\EventPermissionHelpers;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\EventScannerJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EventScannerJobController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Events  $event
     * @return \Illuminate\Http\Response
     */
    public function create(Events $event)
    {
        if (is_null($event)) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $user = Auth::user();
        Log::info('User ID: ' . $user->id . ' Organizer ID: ' . $user->organizer_id);

        if ($user->role->name !== 'Admin' && is_null($user->organizer_id)) {
            return response()->json(['message' => 'User does not have an associated organizer_id'], 403);
        }

        EventPermissionHelpers::isEventOwner($event);

        // If the user is an admin, use a different logic to fetch scanners
        $scannersQuery = User::where('account_status', 1);
        if ($user->role->name !== 'Admin') {
            $scannersQuery->where('organizer_id', $user->organizer_id);
        }
        $registeredScanner = EventScannerJob::where('event_id', $event->id)->pluck('user_id')->toArray();
        $scanners = $scannersQuery->whereNotIn('id', $registeredScanner)->get();

        if ($scanners->count() == 0) {
            noty('Tidak ada scanner officer tersedia', 'error');

            return redirect("/dashboard/events/{$event->slug}");
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
     * @param  \App\Models\Events  $event
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Events $event)
    {
        if (is_null($event)) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $user = Auth::user();
        Log::info('User ID: ' . $user->id . ' Organizer ID: ' . $user->organizer_id);

        if ($user->role->name !== 'Admin' && is_null($user->organizer_id)) {
            return response()->json(['message' => 'User does not have an associated organizer_id'], 403);
        }

        EventPermissionHelpers::isEventOwner($event);

        EventScannerJob::create([
            'event_id' => $event->id,
            'user_id' => $request->user_id,
        ]);

        noty('Berhasil Simpan Data', 'info');

        return redirect("/dashboard/events/{$event->slug}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $event
     * @param  \App\Models\EventScannerJob  $scanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $event, EventScannerJob $scanner)
    {
        if (is_null($event)) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $user = Auth::user();
        Log::info('User ID: ' . $user->id . ' Organizer ID: ' . $user->organizer_id);

        if ($user->role->name !== 'Admin' && is_null($user->organizer_id)) {
            return response()->json(['message' => 'User does not have an associated organizer_id'], 403);
        }

        EventPermissionHelpers::isEventOwner($event);

        try {
            $scanner->delete();
            noty('Berhasil Hapus Data', 'info');
        } catch (\Exception $e) {
            noty('Gagal Hapus Data', 'error');
        }

        return redirect("/dashboard/events/{$event->slug}");
    }
}
