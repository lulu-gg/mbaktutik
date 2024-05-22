<?php

namespace App\Models;

use App\Enums\Invoice\InvoiceStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property integer $id
 * @property integer $order_id
 * @property string $invoice_number
 * @property string $date
 * @property string $due_date
 * @property float $amount
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property Order $order
 */
class Invoice extends Model
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
    protected $fillable = [
        'order_id',
        'invoice_number',
        'date',
        'due_date',
        'status',
        'created_at',
        'updated_at',
        'midtrans_snap_redirect',
        'midtrans_snap_token',
        'midtrans_order_id',
        'subtotal',
        'fee',
        'total',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }


    public static function createInvoiceNumber()
    {
        $counter = 1;
        $now = Carbon::now();

        $lastMonthInvoice = Invoice::whereYear('created_at', '=', $now->year)
            ->whereMonth('created_at', '=', $now->month)
            ->latest('created_at')
            ->first();

        if ($lastMonthInvoice !== null) {
            $number = explode('/', $lastMonthInvoice->invoice_number);
            $counter = (int) $number[0] + 1;
        }

        $counter = str_pad($counter, 3, '0', STR_PAD_LEFT);
        $month = date('m');
        $year = date('y');
        return "$counter/INV/RIVE/$month/$year";
    }

    public function getStatusSpanAttribute()
    {
        switch ($this->status) {
            case InvoiceStatusEnum::Pending:
                return '<span class="badge bg-warning text-grey">Waiting for payment</span>';
            case InvoiceStatusEnum::Done:
                return '<span class="badge bg-success text-grey">Payment Accepted</span>';
            case InvoiceStatusEnum::Cancel:
                return '<span class="badge bg-danger text-grey">Payment Cancelled</span>';
            default:
                return "-";
        }

    }
}
