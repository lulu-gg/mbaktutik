<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Events\EventStatusEnum;
use App\Helpers\CustomHelpers;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\EventsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EventsController extends Controller
{
    protected $HOME_URL = 'admin/events';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Events::with(['eventsCategory'])->withCount('ticketVariations')->get();
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
            'event_organizer_id' => Auth::user()->organizer->id
        ]);

        noty('Berhasil Simpan Data', 'info');

        return redirect($this->HOME_URL . "/" . $event->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Events  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Events $event)
    {
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

        return redirect($this->HOME_URL . "/" . $event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $event)
    {
        try {
            File::delete(public_path(events::$FILE_PATH . $event->thumbnail));
            $event->delete();
            noty('Berhasil Hapus Data', 'info');
        } catch (\Exception $e) {
            noty('Gagal Hapus Data', 'error');
        }

        return redirect($this->HOME_URL);
    }
}
