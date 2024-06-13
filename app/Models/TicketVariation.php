<?php

namespace App\Models;

use App\Enums\Orders\PaymentStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketVariation extends Model
{
    use SoftDeletes;

    protected $keyType = 'integer';

    protected $fillable = [
        'event_id',
        'name',
        'price',
        'quota',
        'max_user_purchase',
        'description',
        'status'
    ];

    public static $rules = [
        'name' => 'required',
        'price' => 'required',
        'quota' => 'required',
        'max_user_purchase' => 'required',
        'description' => 'required',
    ];

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function getTotalSoldAttribute()
    {
        $total = 0;
        $orderDetail = OrdersDetail::where('ticket_variation_id', $this->id)->with('order')->get();
        foreach ($orderDetail as $detail) {
            if ($detail->order->payment_status == PaymentStatusEnum::Done) {
                $total += $detail->quantity;
            }
        }

        return $total;
    }

    public function getTotalAvailableAttribute()
    {
        $sold = $this->getTotalSoldAttribute();
        return $this->quota - $sold;
    }

    public function getTotalSalesAttribute()
    {
        $total = 0;
        $orderDetail = OrdersDetail::where('ticket_variation_id', $this->id)->with('order')->get();
        foreach ($orderDetail as $detail) {
            if ($detail->order->payment_status == PaymentStatusEnum::Done) {
                $total += $detail->total;
            }
        }

        return $total;
    }

    public function getTotalServiceFeeAttribute()
    {
        $total = 0;
        $orderDetail = OrdersDetail::where('ticket_variation_id', $this->id)->with('order.invoice')->get();
        foreach ($orderDetail as $detail) {
            if ($detail->order->payment_status == PaymentStatusEnum::Done && $detail->order->invoice) {
                $total += $detail->order->invoice->fee;
            }
        }

        return $total;
    }

    public function getTotalHandlingFeeAttribute()
    {
        $total = 0;
        $orderDetail = OrdersDetail::where('ticket_variation_id', $this->id)->with('order.invoice')->get();
        foreach ($orderDetail as $detail) {
            if ($detail->order->payment_status == PaymentStatusEnum::Done && $detail->order->invoice) {
                $total += $detail->order->invoice->handling_fee;
            }
        }

        return $total;
    }
}
