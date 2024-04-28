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

        return [
            'order_id' => $invoice->midtrans_order_id,
            'gross_amount' => (int)$invoice->price + (int)$invoice->transaction_code,
            'name' => $invoice->order->booking_request->user->client->fullname,
            'email' => $invoice->order->booking_request->user->client->email ?? $invoice->order->booking_request->user->email,
            'phone' => $invoice->order->booking_request->user->client->phone,
            'item_details' => [
                [
                    'id' => 1,
                    'price' => (int) $invoice->price,
                    'quantity' => 1,
                    'name' => "Invoice $invoice->invoice_number",
                ],
                [
                    'id' => 2,
                    'price' => (int)$invoice->transaction_code,
                    'quantity' => 1,
                    'name' => 'Kode Unik Transaksi'
                ],
            ]
        ];
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
