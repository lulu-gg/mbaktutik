<?php

namespace App\Http\Controllers\Midtrans;

use App\Enums\BookingRequest\StatusFlowEnum;
use App\Enums\Order\OrderStatusEnum;
use App\Enums\Order\PaymentTypeEnum;
use App\Enums\Order\StatusPembayaranEnum;
use App\Enums\OrderInvoice\InvoiceStatusEnum;
use App\Helpers\MailHelpers;
use App\Http\Controllers\Controller;
use App\Jobs\SendBroadcastMailJob;
use App\Models\Order;
use App\Models\OrderInvoice;
use App\Models\TrackingDataShipment;
use App\Services\LocalNotification\LocalNotificationService;
use App\Services\Midtrans\MidtransCallbackService;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function notification(Request $request)
    {
        $callback = new MidtransCallbackService;

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();

            $message = 'Notification Success';

            if ($callback->isSuccess()) {
                // Update invoice
                $orderInvoice = OrderInvoice::where('midtrans_order_id', $notification->order_id)->with('order')->first();
                $orderInvoice->update(['status_invoice' => InvoiceStatusEnum::Complete, 'complete_date' => date('Y-m-d H:i:s')]);

                // Update Order
                $order = $orderInvoice->order;
                if ($order->payment_type == PaymentTypeEnum::Cost) {
                    $order->update(['status_pembayaran' => StatusPembayaranEnum::Paid, 'order_status' => OrderStatusEnum::Done]);
                    $order->booking_request->update(['status_flow' => StatusFlowEnum::PendingDocumentShipment]);

                    TrackingDataShipment::create([
                        'status' => StatusFlowEnum::PendingDocumentShipment,
                        'data_shipment_id' => $order->booking_request->data_shipment->id
                    ]);
                }

                if ($order->payment_type == PaymentTypeEnum::Tempo) {
                    // check termin
                    $done = true;
                    foreach ($order->order_invoices as $otherInvoice) {
                        if ($otherInvoice->status_invoice != InvoiceStatusEnum::Complete) $done = false;
                    }

                    if ($done) {
                        $order->update(['status_pembayaran' => StatusPembayaranEnum::Paid, 'order_status' => OrderStatusEnum::Done]);
                    }
                }

                // SEND EMAIL NOTIF TO ADMIN
                $name = $orderInvoice->user->name;
                $receivers = MailHelpers::getAdminEmails();
                $subject =  "Pembayaran Invoice #$orderInvoice->invoice_number Berhasil!";
                $message = view('common.mail.notify-messages.admin.payment-success', ['name' => $name, 'invoice' => $orderInvoice])->render();
                dispatch(new SendBroadcastMailJob($receivers, $subject, $message));

                // CREATE LOCAL NOTIFICATION
                LocalNotificationService::createAdminNotification($subject, "$name telah menyelesaikan pembayaran invoice");

                // SEND EMAIL NOTIF TO CLIENT
                $name = $orderInvoice->user->name;
                $receivers = [$orderInvoice->user->email];
                $subject =  "Pembayaran Invoice #$orderInvoice->invoice_number Berhasil!";
                $message = view('common.mail.notify-messages.client.payment-success', ['name' => $name, 'invoice' => $orderInvoice])->render();
                dispatch(new SendBroadcastMailJob($receivers, $subject, $message));

                // CREATE LOCAL NOTIFICATION
                LocalNotificationService::createNotification($orderInvoice->user->id, $subject, "Terimakasih telah menyelesaikan pembayaran invoice");
            }

            if ($callback->isExpire() || $callback->isCancelled()) {
                OrderInvoice::where('midtrans_order_id', $notification->order_id)->update(['status_invoice' => InvoiceStatusEnum::Expired]);

                $order = $orderInvoice->order;
                if ($order->payment_type == PaymentTypeEnum::Cost) {
                    $order->update(['status_pembayaran' => StatusPembayaranEnum::Expired, 'order_status' => OrderStatusEnum::Cancel]);
                    $order->booking_request->update(['status_flow' => StatusFlowEnum::FailedPayment]);

                    TrackingDataShipment::create([
                        'status' => StatusFlowEnum::FailedPayment,
                        'data_shipment_id' => $order->booking_request->data_shipment->id
                    ]);
                }
            }

            // if ($callback->isCancelled()) {
            //     OrderInvoice::where('midtrans_order_id', $notification->order_id)->update(['status_invoice' => InvoiceStatusEnum::Cancelled]);
            // }

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
