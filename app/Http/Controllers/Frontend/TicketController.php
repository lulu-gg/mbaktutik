<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\Tickets\TicketStatusEnum;
use App\Helpers\RoleHelpers;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function show($qrCode)
    {
        $ticket = Ticket::where(['qr_code' => $qrCode])->firstOrFail();

        return view('frontend.ticket.show', [
            'ticket' => $ticket,
        ]);
    }

    public function scan($qrCode)
    {
        if (!RoleHelpers::isScanOfficer()) {
            return redirect('/login');
        }

        $ticket = Ticket::where(['qr_code' => $qrCode])->where('status', '!=', TicketStatusEnum::Pending)->with(['orderDetail.order.event.eventsScannerJob'])->firstOrFail();
        $scannerOfficers = $ticket->orderDetail->order->event->eventsScannerJob->pluck('user_id')->toArray();
        $hasAccess = in_array(Auth::user()->id, $scannerOfficers);

        return view('frontend.ticket.scan', [
            'ticket' => $ticket,
            'hasAccess' => $hasAccess,
        ]);
    }

    public function update(Request $request, $qrCode)
    {
        if (!RoleHelpers::isScanOfficer()) {
            return redirect('/login');
        }

        $ticket = Ticket::where(['qr_code' => $qrCode])->where('status', '!=', TicketStatusEnum::Pending)->with(['orderDetail.order.event.eventsScannerJob'])->firstOrFail();
        $scannerOfficers = $ticket->orderDetail->order->event->eventsScannerJob->pluck('user_id')->toArray();
        $hasAccess = in_array(Auth::user()->id, $scannerOfficers);

        if (!$hasAccess) {
            return view('frontend.ticket.scan', [
                'ticket' => $ticket,
                'hasAccess' => $hasAccess,
            ]);
        }

        $ticket->update([
            'scanned_at' => now(),
            'scanned_by' => Auth::user()->id,
            'status' => TicketStatusEnum::Scanned,
        ]);

        return redirect("/ticket/scan/$qrCode");
    }
}
