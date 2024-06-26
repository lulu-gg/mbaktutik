<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Events\EventStatusEnum;
use App\Helpers\CustomHelpers;
use App\Helpers\EventPermissionHelpers;
use App\Helpers\RoleHelpers;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\EventsCategory;
use App\Models\Organizer;
use App\Models\TicketVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EventsController extends Controller
{
    protected $HOME_URL = 'dashboard/events';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Events::with(['eventsCategory', 'organizer'])->withCount('ticketVariations');

        $data = RoleHelpers::isAdmin() ? $query->get() : $query->where(['event_organizer_id' => Auth::user()->organizer->id])->get();

        return view('admin.events.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = EventsCategory::all();
        $statuses = EventStatusEnum::asSelectArray();
        return view('admin.events.create', [
            'categorys' => $categorys,
            'statuses' => $statuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Events::$rules);

        $thumbnail = CustomHelpers::simpleFileUpload(requestFile: $request->thumbnail, path: Events::$FILE_PATH);
        $banner = CustomHelpers::simpleFileUpload(requestFile: $request->banner, path: Events::$FILE_PATH);

        $event = Events::create([
            ...$request->all(),
            'thumbnail' => $thumbnail,
            'banner' => $banner,
            'event_organizer_id' => RoleHelpers::isAdmin() ? Organizer::getInternalOrganizerId() : Auth::user()->organizer->id,
        ]);

        noty('Berhasil Simpan Data', 'info');

        return redirect($this->HOME_URL . "/" . $event->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Events  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Events $event)
    {
        EventPermissionHelpers::isEventOwner($event);

        $event = Events::with(['ticketVariations', 'eventsScannerJob', 'eventsScannerJob.user'])->findOrFail($event->id);
        return view('admin.events.show', [
            'data' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Events  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Events $event)
    {
        EventPermissionHelpers::isEventOwner($event);

        $categorys = EventsCategory::all();
        $statuses = EventStatusEnum::asSelectArray();
        return view('admin.events.edit', [
            'data' => $event,
            'categorys' => $categorys,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Events  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Events $event)
    {
        EventPermissionHelpers::isEventOwner($event);

        $request->validate(Events::$rules_update);

        $event->update([...$request->except(['thumbnail', 'banner'])]);

        if ($request->hasFile('thumbnail')) {
            $uploadedImage = CustomHelpers::simpleFileUpload(requestFile: $request->thumbnail, path: Events::$FILE_PATH, oldPath: $event->thumbnail);
            $event->update(['thumbnail' => $uploadedImage]);
        }

        if ($request->hasFile('banner')) {
            $uploadedImage = CustomHelpers::simpleFileUpload(requestFile: $request->banner, path: Events::$FILE_PATH, oldPath: $event->banner);
            $event->update(['banner' => $uploadedImage]);
        }

        noty('Berhasil Edit Data', 'info');

        return redirect($this->HOME_URL . "/" . $event->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $event)
    {
        EventPermissionHelpers::isEventOwner($event);

        try {
            // File::delete(public_path(events::$FILE_PATH . $event->thumbnail));
            $event->delete();
            noty('Berhasil Hapus Data', 'info');
        } catch (\Exception $e) {
            noty('Gagal Hapus Data', 'error');
        }

        return redirect($this->HOME_URL);
    }

    public function report(Events $event)
    {
        $data = $event->ticketVariations;
        return view('admin.events.report', [
            'data' => $data
        ]);
    }
}
