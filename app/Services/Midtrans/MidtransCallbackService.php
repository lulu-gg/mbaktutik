<?php

namespace App\Services\Midtrans;

use App\Services\Midtrans\Midtrans;
use Midtrans\Notification;

class MidtransCallbackService extends Midtrans
{
    protected $notification;
    protected $transaction;
    protected $serverKey;

    public function __construct()
    {
        parent::__construct();

        $this->serverKey = env('MIDTRANS_SERVER_KEY');
        $this->_handleNotification();
    }

    public function isSignatureKeyVerified()
    {
        return ($this->_createLocalSignatureKey() == $this->notification->signature_key);
    }

    public function isSuccess()
    {
        $statusCode = $this->notification->status_code;
        $transactionStatus = $this->notification->transaction_status;
        $fraudStatus = !empty($this->notification->fraud_status) ? ($this->notification->fraud_status == 'accept') : true;

        return ($statusCode == 200 && $fraudStatus && ($transactionStatus == 'capture' || $transactionStatus == 'settlement'));
    }

    public function isExpire()
    {
        return ($this->notification->transaction_status == 'expire');
    }

    public function isCancelled()
    {
        return ($this->notification->transaction_status == 'cancel');
    }

    public function getNotification()
    {
        return $this->notification;
    }

    public function getTransaction()
    {
        return $this->transaction;
    }

    protected function _createLocalSignatureKey()
    {
        $orderId = $this->notification->order_id;
        $statusCode = $this->notification->status_code;
        $grossAmount = $this->notification->gross_amount;
        $serverKey = $this->serverKey;
        $input = $orderId . $statusCode . $grossAmount . $serverKey;
        $signature = openssl_digest($input, 'sha512');

        return $signature;
    }

    protected function _handleNotification()
    {
        $notification = new Notification();
        $this->notification = $notification;
    }
}
