<?php

namespace App\Models;

use App\Enums\Withdrawl\WithdrawlStatusEnum;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $event_organizer_id
 * @property string $beneficiary_name
 * @property string $beneficiary_account
 * @property string $beneficiary_bank
 * @property float $amount
 * @property integer $status
 * @property string $notes
 * @property string $paid_at
 * @property string $created_at
 * @property string $updated_at
 * @property Organizer $organizer
 */
class Withdrawl extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'withdrawl';

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
        'event_organizer_id',
        'beneficiary_name',
        'beneficiary_account',
        'beneficiary_bank',
        'amount',
        'status',
        'notes',
        'paid_at',
        'created_at',
        'updated_at'
    ];

    protected $dates = ['paid_at'];

    public static $rules = [
        'beneficiary_name',
        'beneficiary_account',
        'beneficiary_bank',
        'amount',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organizer()
    {
        return $this->belongsTo('App\Models\Organizer', 'event_organizer_id');
    }

    public function getStatusSpanAttribute()
    {
        switch ($this->status) {
            case WithdrawlStatusEnum::Pending:
                return '<span class="badge bg-warning text-grey">Waiting for Payment</span>';
            case WithdrawlStatusEnum::Paid:
                return '<span class="badge bg-success text-grey">Withdrawl Accepted</span>';
            case WithdrawlStatusEnum::Rejected:
                return '<span class="badge bg-danger text-grey">Withdrawl Rejected</span>';
            default:
                return "-";
        }
    }
}
