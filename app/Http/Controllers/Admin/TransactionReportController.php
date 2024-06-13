<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RoleHelpers;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\GeneralParamter;
use App\Models\Invoice;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nasution\Terbilang;

class TransactionReportController extends Controller
{
    public function index()
    {
        $query = Order::with(['invoice', 'event']);

        $eventsId = RoleHelpers::isAdmin() ? [] : Events::where('event_organizer_id', Auth::user()->organizer->id)->pluck('id')->toArray();

        $data = RoleHelpers::isAdmin() ? $query->get() : $query->whereIn('event_id', $eventsId)->get();

        if (RoleHelpers::isAdmin()) {
            return view('admin.transaction-report.index', [
                'data' => $data,
            ]);
        } else {
            return view('organizer.transaction-report.index', [
                'data' => $data,
            ]);
        }
    }

    public function show(Order $order)
    {
        if (RoleHelpers::isAdmin()) {
            return view('admin.transaction-report.show', [
                'data' => $order,
            ]);
        } else {
            return view('organizer.transaction-report.show', [
                'data' => $order,
            ]);
        }
    }

    public function invoice(Order $order)
    {
        $invoice = $order->invoice;

        $generalParameter = GeneralParamter::first();
        $pdf = Pdf::loadView('common.pdf.invoice.invoice-pdf', [
            'invoice' => $invoice,
            'orderDetail' => $invoice->order->orderDetails->first(),
            'generalParameter' => $generalParameter,
            'amountStr' => Terbilang::convert($invoice->total),
        ]);

        return $pdf->stream();
    }

    public function pdf()
    {
        $query = Order::with(['invoice', 'event']);

        $eventsId = RoleHelpers::isAdmin() ? [] : Events::where('event_organizer_id', Auth::user()->organizer->id)->pluck('id')->toArray();

        $data = RoleHelpers::isAdmin() ? $query->get() : $query->whereIn('event_id', $eventsId)->get();

        $pdf = Pdf::loadView('common.pdf.transaction.transaction-pdf', [
            'data' => $data,
        ]);

        return $pdf->stream();
    }
}
