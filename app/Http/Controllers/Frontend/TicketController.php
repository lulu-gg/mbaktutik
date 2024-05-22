<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function show($qrCode)
    {
        $ticket = Ticket::where(['qr_code' => $qrCode])->firstOrFail();
        
        return view('frontend.ticket.show', [
            'ticket' => $ticket,
        ]);
    }
}
