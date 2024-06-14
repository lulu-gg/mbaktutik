<?php

namespace App\Models;

use App\Enums\Orders\PaymentStatusEnum;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $event_id
 * @property integer $user_id
 * @property string $date
 * @property string $time
 * @property integer $quantity
 * @property float $total_amount
 * @property float $service_fee
 * @property float $handling_fee
 * @property string $payment_method
 * @property integer $payment_status
 * @property integer $status
 * @property integer $invoice_id
 * @property string $created_at
 * @property string $updated_at
 * @property Ticket[] $tickets
 * @property Event $event
 * @property User $user
 * @property Invoice[] $invoices
 */
class Order extends Model
{
    protected $keyType = 'integer';

    protected $fillable = [
        'event_id', 
        'user_id', 
        'date', 
        'time', 
        'quantity', 
        'total_amount', 
        'service_fee', 
        'handling_fee',
        'payment_method', 
        'payment_status', 
        'status', 
        'invoice_id', 
        'paid_at'
    ];

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket')->withTrashed();
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Events')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withTrashed();
    }

    public function invoice()
    {
        return $this->hasOne('App\Models\Invoice');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrdersDetail');
    }

    public function getStatusSpanAttribute()
    {
        if ($this->payment_status == PaymentStatusEnum::Pending) {
            return '<span class="badge bg-warning">Waiting for Payment</span>';
        }

        if ($this->payment_status == PaymentStatusEnum::Done) {
            return '<span class="badge bg-primary">Payment Accepted</span>';
        }

        if ($this->payment_status == PaymentStatusEnum::Cancel) {
            return '<span class="badge bg-danger">Payment Cancelled</span>';
        }

        if ($this->payment_status == PaymentStatusEnum::Error) {
            return '<span class="badge bg-danger">Payment Error</span>';
        }
    }

    public function getStatusReportAttribute()
    {
        if ($this->payment_status == PaymentStatusEnum::Pending) {
            return "Waiting for Payment";
        }

        if ($this->payment_status == PaymentStatusEnum::Done) {
            return "Payment Accepted";
        }

        if ($this->payment_status == PaymentStatusEnum::Cancel) {
            return "Payment Cancelled";
        }

        if ($this->payment_status == PaymentStatusEnum::Error) {
            return "Payment Error";
        }
    }
}
