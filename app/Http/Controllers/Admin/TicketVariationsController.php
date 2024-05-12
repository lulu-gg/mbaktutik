<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\TicketVariation;
use Illuminate\Http\Request;

class TicketVariationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Events $event)
    {
        return view('admin.events.ticket-variations.create', [
            'event' => $event,
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
        $request->validate(TicketVariation::$rules);
        TicketVariation::create([
            ...$request->all(),
            'event_id' => $event->id,
            'status' => 1
        ]);

        noty('Berhasil Simpan Data', 'info');

        return redirect("/admin/events/$event->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketVariation  $ticketVariation
     * @return \Illuminate\Http\Response
     */
    public function show(TicketVariation $TicketVariation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketVariation  $ticketVariation
     * @return \Illuminate\Http\Response
     */
    public function edit(Events $event, TicketVariation $ticket)
    {
        return view('admin.events.ticket-variations.edit', [
            'event' => $event,
            'ticket' => $ticket,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketVariation  $ticketVariation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Events $event, TicketVariation $ticket)
    {
        $request->validate(TicketVariation::$rules);
        $ticket->update($request->all());

        noty('Berhasil Simpan Data', 'info');

        return redirect("/admin/events/$event->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketVariation  $ticketVariation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $event, TicketVariation $ticket)
    {
        try {
            $ticket->delete();
            noty('Berhasil Hapus Data', 'info');
        } catch (\Exception $e) {
            noty('Gagal Hapus Data', 'error');
        }

        return redirect("/admin/events/$event->id");
    }
}
