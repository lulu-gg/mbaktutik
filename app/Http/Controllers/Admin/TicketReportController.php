<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RoleHelpers;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketReportController extends Controller
{
    public function index()
    {
        $query = Order::with(['orderDetails.tickets']);

        $eventsId = RoleHelpers::isAdmin() ? [] : Events::where('event_organizer_id', Auth::user()->organizer->id)->pluck('id')->toArray();

        $data = RoleHelpers::isAdmin() ? $query->get() : $query->whereIn('event_id', $eventsId)->get();

        return view('admin.ticket-report.index', [
            'data' => $data,
        ]);
    }
}
