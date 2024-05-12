<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $event_id
 * @property integer $user_id
 * @property string $date
 * @property string $time
 * @property integer $quantity
 * @property float $total_amount
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
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['event_id', 'user_id', 'date', 'time', 'quantity', 'total_amount', 'payment_method', 'payment_status', 'status', 'invoice_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }
}
