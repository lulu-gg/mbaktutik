<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * @property integer $id
 * @property integer $event_category_id
 * @property string $name
 * @property string $description
 * @property string $date
 * @property string $time
 * @property string $location
 * @property string $banner
 * @property string $thumbnail
 * @property integer $event_organizer_id
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property Order[] $orders
 * @property EventsCategory $eventsCategory
 * @property EventVariation[] $eventVariations
 */
class Events extends Model
{
    use HasFactory;

    public static $FILE_PATH = 'uploads/events/';

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
        'event_category_id',
        'name',
        'description',
        'location',
        'banner',
        'thumbnail',
        'event_organizer_id',
        'status',
        'start_date',
        'end_date',
        'tnc',
        'seo',
        'seo_description',
        'province',
        'city',
        'zip',
        'latitude',
        'longitude',
    ];

    public static $rules = [
        'event_category_id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'location' => 'required',
        'banner' => 'required | file',
        'thumbnail' => 'required | file',
        'status' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'tnc' => 'required',
        'seo' => 'required',
        'seo_description' => 'required',
        'province' => 'required',
        'city' => 'required',
        'zip' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
    ];

    public static $rules_update = [
        'event_category_id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'location' => 'required',
        'status' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'tnc' => 'required',
        'seo' => 'required',
        'seo_description' => 'required',
        'province' => 'required',
        'city' => 'required',
        'zip' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
    ];

    protected $casts = [
        'start_date'  => 'datetime',
        'end_date' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventsCategory()
    {
        return $this->belongsTo('App\Models\EventsCategory', 'event_category_id');
    }
    public function organizer()
    {
        return $this->belongsTo('App\Models\Organizer', 'event_organizer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketVariations()
    {
        return $this->hasMany('App\Models\TicketVariation', 'event_id', 'id')->orderBy('id', "ASC");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketVariationsAvailable()
    {
        return $this->hasMany('App\Models\TicketVariation', 'event_id', 'id')->where(['status' => 1])->orderBy('id', "ASC");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventsScannerJob()
    {
        return $this->hasMany('App\Models\EventScannerJob', 'event_id', 'id');
    }

    public function getBannerPathAttribute()
    {
        return $this->banner ? url(self::$FILE_PATH . $this->banner) : null;
    }

    public function getThumbnailPathAttribute()
    {
        return $this->thumbnail ? url(self::$FILE_PATH . $this->thumbnail) : null;
    }

    public function isPast()
    {
        $currentDate = Carbon::now();
        return $this->end_date < $currentDate;
    }

    public function getStatusTimeSpanAttribute()
    {
        if ($this->isPast()) {
            return '<span class="badge badge-danger bg-danger">Past Event</span>';
        }

        return '<span class="badge badge-primary bg-primary">Ongoing Event</span>';
    }
}
