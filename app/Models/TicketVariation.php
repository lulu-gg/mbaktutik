<?php

namespace App\Models;

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
}
