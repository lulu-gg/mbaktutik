<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $ticket_variation_id
 * @property integer $order_id
 * @property string $ticket_name
 * @property float $ticket_price
 * @property string $created_at
 * @property string $updated_at
 * @property string $buyer_name
 * @property string $buyer_nik
 * @property string $buyer_email
 * @property string $buyer_phone
 * @property string $buyer_city
 * @property integer $quantity
 * @property float $price
 * @property float $total
 * @property float $service_fee
 * @property float $handling_fee
 * @property Order $order
 * @property TicketVariation $ticketVariation
 * @property Ticket[] $tickets
 */
class OrdersDetail extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'orders_detail';

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
        'ticket_variation_id',
        'order_id',
        'ticket_name',
        'ticket_price',
        'created_at',
        'updated_at',
        'buyer_name',
        'buyer_nik',
        'buyer_email',
        'buyer_phone',
        'buyer_city',
        'quantity',
        'price',
        'total',
        'service_fee',
        'handling_fee'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticketVariation()
    {
        return $this->belongsTo('App\Models\TicketVariation')->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'order_detail_id');
    }
}
