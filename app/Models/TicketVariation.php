<?php

namespace App\Models;

use App\Enums\Orders\PaymentStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $event_id
 * @property string $name
 * @property float $price
 * @property integer $quota
 * @property integer $max_quota
 * @property string $created_at
 * @property string $updated_at
 * @property Event $event
 */
class TicketVariation extends Model
{
    use SoftDeletes;

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
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
}
