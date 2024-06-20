<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category_id', 'price', 'stock', 'status', 'slug'
    ];

    public function category()
    {
        return $this->belongsTo(MerchandiseCategory::class);
    }
}
