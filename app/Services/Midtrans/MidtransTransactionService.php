<?php

namespace App\Services\Midtrans;

use App\Enums\Midtrans\MidtransTransactionStatusEnum;
use Midtrans\Snap;
use Midtrans\Transaction;
use Illuminate\Support\Str;

class MidtransTransactionService extends Midtrans
{
    protected $invoice;

    public function __construct($invoice = null)
    {
        parent::__construct();

        $this->invoice = $invoice;
    }

    public function createTransaction()
    {
        $generateParam = $this->buildParam();
        $params = [
            /**
             * 'order_id' => id order unik yang akan digunakan sebagai "primary key" oleh Midtrans untuk
             * 				 membedakan order satu dengan order lain. Key ini harus unik (tidak boleh ada duplikat).
             * 'gross_amount' => merupakan total harga yang harus dibayar customer.
             */
            'transaction_details' => [
                'order_id' => $generateParam['order_id'],
                'gross_amount' => $generateParam['gross_amount'],
            ],
            /**
             * 'item_details' bisa diisi dengan detail item dalam order.
             * Umumnya, data ini diambil dari tabel `order_items`.
             */
            'item_details' => $generateParam['item_details'],
            'customer_details' => [
                // Key `customer_details` dapat diisi dengan data customer yang melakukan order.
                'first_name' => $generateParam['name'],
                'last_name' => '',
                'email' => $generateParam['email'],
                'phone' => $generateParam['phone'],
            ]
        ];

        $snapToken = Snap::createTransaction($params);

        return $snapToken;
    }

    protected function buildParam()
    {
        $invoice = $this->invoice;

        $params = [
            'order_id' => $invoice->midtrans_order_id,
            'gross_amount' => (int) $invoice->total,
            'name' => $invoice->order->orderDetails->first()->buyer_name,
            'email' => $invoice->order->orderDetails->first()->buyer_email,
            'phone' => $invoice->order->orderDetails->first()->buyer_phone,
        ];

        $details = [];
        foreach ($invoice->order->orderDetails as $key => $item) {
            $details[] = [
                'id' => $key + 1,
                'price' => (int) $item->total,
                'quantity' => (int) $item->quantity,
                'name' => "Ticket $item->ticket_name - " . $invoice->order->event->name,
            ];
        }

        $details[] = [
            'id' => $key + 1,
            'price' => (int) $invoice->fee,
            'quantity' => 1,
            'name' => "Service Fee",
        ];

        $params['item_details'] = $details;


        return $params;
    }

    public function checkTransaction($midtrans_order_id)
    {
        try {
            $transaction = (object) Transaction::status($midtrans_order_id);

            $transactionStatus = $transaction->transaction_status;
            $fraudStatus = !empty($transaction->fraud_status) ? ($transaction->fraud_status == 'accept') : true;

            if ($transactionStatus == 'pending') {
                // pending
                $transaction->result = MidtransTransactionStatusEnum::Pending;
            }

            if ($fraudStatus && ($transactionStatus == 'capture' || $transactionStatus == 'settlement')) {
                // success
                $transaction->result = MidtransTransactionStatusEnum::Success;
            }

            if ($transactionStatus == 'expire') {
                // expired
                $transaction->result = MidtransTransactionStatusEnum::Expired;
            }

            if ($transactionStatus == 'cancel') {
                // cancelled
                $transaction->result = MidtransTransactionStatusEnum::Cancelled;
            }

            return $transaction;
        } catch (\Exception $e) {
            return null;
        }
    }
}
