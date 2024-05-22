<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\Invoice\InvoiceStatusEnum;
use App\Enums\Midtrans\MidtransTransactionStatusEnum;
use App\Enums\Orders\PaymentStatusEnum;
use App\Enums\Tickets\TicketStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\EventsCategory;
use App\Models\GeneralParamter;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrdersDetail;
use App\Models\Ticket;
use App\Models\TicketVariation;
use App\Services\Midtrans\MidtransTransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::orderBy('id', 'desc')->with(['organizer'])->get();
        $eventCategorys = EventsCategory::all();

        return view('frontend.events.index', [
            'events' => $events,
            'eventCategorys' => $eventCategorys,
        ]);
    }

    public function show(Events $event)
    {
        $event = Events::where(['id' => $event->id])->with(['ticketVariations', 'organizer'])->firstOrFail();
        return view('frontend.events.detail', [
            'event' => $event,
        ]);
    }

    public function purchase(Events $event)
    {
        $event = Events::where(['id' => $event->id])->with(['ticketVariations', 'organizer'])->firstOrFail();
        return view('frontend.events.purchase', [
            'event' => $event,
        ]);
    }

    public function payment($midtrans_order_id)
    {
        $invoice = Invoice::where(['midtrans_order_id' => $midtrans_order_id])->with(['order.event', 'order.orderDetails.tickets'])->firstOrFail();

        // manual check midtrans status 
        // just in case notification delay or failed to send
        $this->checkMidtransStatus($invoice);

        return view('frontend.events.payment', [
            'event' => $invoice->order->event,
            'invoice' => $invoice,
        ]);
    }

    public function checkout(Request $request, Events $event)
    {
        $formData = [];
        $subtotal = 0;

        foreach ($request->ticket as $key => $item) {
            // validate event status
            $ticket = TicketVariation::where(['id' => $item])->first();
            if ($ticket->status != 1) {
                return back()->withErrors(['name' => "$ticket->name was unavailable at this moment"]);
            }

            // validate max user purchase
            $userAlreadyBuyCounter = OrdersDetail::where(['ticket_variation_id' => $item, 'buyer_nik' => $request->nik[$key]])->count();
            if (($userAlreadyBuyCounter + $request->quantity[$key]) > $ticket->max_user_purchase) {
                return back()->withErrors(['name' => "NIK " . $request->nik[$key] . " was already reached max purchase for ticket $ticket->name"]);
            }

            $subtotal += $ticket->price * $request->quantity[$key];
            $formData[] = (object) [
                'ticket' => $ticket,
                'quantity' => $request->quantity[$key],
                'fullname' => $request->fullname[$key],
                'email' => $request->email[$key],
                'phone' => $request->phone[$key],
                'nik' => $request->nik[$key],
                'price' => (int) $ticket->price,
                'subtotal' => $ticket->price * $request->quantity[$key]
            ];
        }

        $serviceFeePercentage = GeneralParamter::first()->transaction_tax ?? 3;
        $serviceFee = $subtotal * ($serviceFeePercentage / 100);

        $encryptedData = Crypt::encryptString(json_encode([
            'event' => $event,
            'formData' => $formData,
            'subtotal' => $subtotal,
            'serviceFee' => $serviceFee,
        ]));

        return view('frontend.events.checkout', [
            'event' => $event,
            'formData' => $formData,
            'subtotal' => $subtotal,
            'serviceFee' => $serviceFee,
            'encryptedData' => $encryptedData,
        ]);
    }

    public function proceedCheckout(Request $request, Events $event)
    {
        $request->validate(['encData' => 'required']);

        $decryptedData = Crypt::decryptString($request->encData);
        $formData = json_decode($decryptedData, false);

        // create order
        $order = Order::create([
            'event_id' => $event->id,
            'total_amount' => $formData->subtotal + $formData->serviceFee,
            'payment_status' => PaymentStatusEnum::Pending,
        ]);

        // create order_detail
        foreach ($formData->formData as $item) {
            $orderDetail = OrdersDetail::create([
                'ticket_variation_id' => $item->ticket->id,
                'order_id' => $order->id,
                'ticket_name' => $item->ticket->name,
                'ticket_price' => $item->ticket->price,
                'buyer_name' => $item->fullname,
                'buyer_nik' => $item->nik,
                'buyer_email' => $item->email,
                'buyer_phone' => $item->phone,
                'quantity' => $item->quantity,
                'price' => $item->ticket->price,
                'total' => $item->ticket->price * $item->quantity,
            ]);

            // create tickets
            for ($i = 0; $i < $item->quantity; $i++) {
                Ticket::create([
                    'order_detail_id' => $orderDetail->id,
                    'ticket_code' => Ticket::generateTicketID(),
                    'qr_code' => Str::random(40),
                    'status' => TicketStatusEnum::Pending,
                ]);
            }
        }

        // create invoices
        $invoice = Invoice::create([
            'order_id' => $order->id,
            'invoice_number' => Invoice::createInvoiceNumber(),
            'date' => Carbon::now(),
            'due_date' => Carbon::now()->addDay(),
            'subtotal' => $formData->subtotal,
            'fee' => $formData->serviceFee,
            'total' => $formData->subtotal + $formData->serviceFee,
            'status' => InvoiceStatusEnum::Pending,
            'midtrans_order_id' => Str::uuid()->toString(),
        ]);

        // create midtrans transaction
        $midtrans = new MidtransTransactionService($invoice);
        $transaction = $midtrans->createTransaction();
        $invoice->midtrans_snap_token = $transaction->token;
        $invoice->midtrans_snap_redirect = $transaction->redirect_url;
        $invoice->save();

        return redirect("/events/payment/$invoice->midtrans_order_id");
    }

    public function checkMidtransStatus(Invoice $invoice)
    {
        // check payment manual outside callback
        $midtransTransaction  = new MidtransTransactionService();
        $checkTransaction = $midtransTransaction->checkTransaction($invoice->midtrans_order_id);
        if ($checkTransaction !== null && $checkTransaction?->result == MidtransTransactionStatusEnum::Success) {
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

            // // SEND EMAIL NOTIF TO CUSTOMER
            // $name = $invoice->user->name;
            // $receivers = MailHelpers::getAdminEmails();
            // $subject =  "Pembayaran Invoice #$invoice->invoice_number Berhasil!";
            // $message = view('common.mail.notify-messages.admin.payment-success', ['name' => $name, 'invoice' => $invoice])->render();
            // dispatch(new SendBroadcastMailJob($receivers, $subject, $message));
        }

        if ($checkTransaction !== null && in_array($checkTransaction?->result ?? '', [MidtransTransactionStatusEnum::Expired, MidtransTransactionStatusEnum::Cancelled])) {
            $invoice->update(['status' => InvoiceStatusEnum::Cancel]);

            // Update order
            $invoice->order->update([
                'payment_status' => PaymentStatusEnum::Cancel,
            ]);
        }
    }
}
