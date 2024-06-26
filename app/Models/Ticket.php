<?php

namespace App\Models;

use App\Enums\Tickets\TicketStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $order_id
 * @property string $ticket_code
 * @property string $qr_code
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property Order $order
 */
class Ticket extends Model
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
    protected $fillable = ['order_id', 'ticket_code', 'order_detail_id', 'qr_code', 'status', 'scanned_at', 'scanned_by', 'created_at', 'updated_at'];

    protected $dates = ['scanned_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderDetail()
    {
        return $this->belongsTo('App\Models\OrdersDetail');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scannedBy()
    {
        return $this->belongsTo('App\Models\User', 'scanned_by', 'id');
    }

    public function getStatusSpanAttribute($inDashboard = false)
    {
        switch ($this->status) {
            case TicketStatusEnum::Pending:
                return '<span class="badge bg-warning text-grey">Waiting Payment</span>';
            case TicketStatusEnum::Active:
                return '<span class="badge bg-success text-grey">Ready to Scan</span>';
            case TicketStatusEnum::Scanned:
                $bgColor = $inDashboard ? 'bg-primary' : 'bg-danger';
                return "<span class='badge $bgColor text-grey'>Already Scanned</span>";
            default:
                return "-";
        }
    }

    public function getStatusReportAttribute()
    {
        switch ($this->status) {
            case TicketStatusEnum::Pending:
                return "Waiting Payment";
            case TicketStatusEnum::Active:
                return "Ready to Scan";
            case TicketStatusEnum::Scanned:
                return "Already Scanned";
            default:
                return "-";
        }
    }

    public static function generateTicketID($prefix = 'TICKET')
    {
        // Get the current timestamp
        $timestamp = time();

        // Generate a random number
        $randomNumber = mt_rand(1000, 9999);

        // Combine the prefix, timestamp, and random number to create a unique ID
        $ticketID = $prefix . '-' . $timestamp . '-' . $randomNumber;

        return $ticketID;
    }
}
