<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Enums\MerchandiseStatusEnum;

class Merchandise extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    public static $FILE_PATH = 'uploads/merchandise/';

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'name',
        'merchandise_category_id',
        'organizer_id',
        'description',
        'price',
        'stock',
        'status',
        'thumbnail',
        'image',
        'slug'
    ];

    public static $rules = [
        'name' => 'required|string|max:255',
        'merchandise_category_id' => 'required|exists:merchandise_categories,id',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'status' => 'required|integer',
        'thumbnail' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        'image' => 'required|file|mimes:jpg,jpeg,png|max:2048',
    ];

    public static $rules_update = [
        'name' => 'required|string|max:255',
        'merchandise_category_id' => 'required|exists:merchandise_categories,id',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'status' => 'required|integer',
    ];

    public function merchandiseCategory()
    {
        return $this->belongsTo(MerchandiseCategory::class, 'merchandise_category_id');
    }

    public function organizer()
    {
        return $this->belongsTo(Organizer::class, 'organizer_id');
    }

    public function getThumbnailPathAttribute()
    {
        return $this->thumbnail ? url(self::$FILE_PATH . $this->thumbnail) : null;
    }

    public function getImagePathAttribute()
    {
        return $this->image ? url(self::$FILE_PATH . $this->image) : null;
    }

    public function getStatusTextAttribute()
    {
        return MerchandiseStatusEnum::getDescription($this->status);
    }
}
