<?php

namespace App\Http\Controllers\Midtrans;

use App\Enums\Invoice\InvoiceStatusEnum;
use App\Enums\Orders\PaymentStatusEnum;
use App\Enums\Tickets\TicketStatusEnum;
use App\Http\Controllers\Controller;
use App\Jobs\SendBroadcastMailJob;
use App\Models\Invoice;
use App\Services\Midtrans\MidtransCallbackService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MidtransController extends Controller
{
    public function notification(Request $request)
    {
        $callback = new MidtransCallbackService;

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();

            $message = 'Notification Success';

            $invoice = Invoice::where('midtrans_order_id', $notification->order_id)->with('order')->firstOrFail();

            if ($invoice->status != InvoiceStatusEnum::Pending) {
                return response()
                    ->json([
                        'success' => true,
                        'message' => 'Invoice status already done'
                    ], 200);
            }

            if ($callback->isSuccess()) {
                // Update invoice
                $invoice->update(['status' => InvoiceStatusEnum::Done]);

                // Update order
                $invoice->order->update([
                    'paid_at' => Carbon::now(),
                    'payment_status' => PaymentStatusEnum::Done,
                ]);

                // Update ticket status 
                foreach ($invoice->order->orderDetails as $orderDetail) {
                    foreach ($orderDetail->tickets as $ticket) {
                        $ticket->update(['status' => TicketStatusEnum::Active]);
                    }
                }

                // SEND EMAIL ETICKET TO CUSTOMER
                $receivers = [$invoice->order->orderDetails->first()->buyer_email];
                $subject =  "E-Ticket " . $invoice->order->event->name;
                $message = view('common.mail.ticket.ticket', ['order' => $invoice->order])->render();
                dispatch(new SendBroadcastMailJob($receivers, $subject, $message, $invoice->id));
            }

            if ($callback->isExpire() || $callback->isCancelled()) {
                $invoice->update(['status' => InvoiceStatusEnum::Cancel]);

                // Update order
                $invoice->order->update([
                    'payment_status' => PaymentStatusEnum::Cancel,
                ]);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => $message
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key tidak terverifikasi',
                ], 403);
        }
    }
}
