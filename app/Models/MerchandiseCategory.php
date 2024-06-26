<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerchandiseCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'merchandise_categories'; // Pastikan ini sesuai dengan nama tabel di database

    protected $fillable = [
        'name',
        'description',
    ];

    public static $rules = [
        'name' => 'required',
        'description' => 'required',
    ];

    public function merchandises()
    {
        return $this->hasMany(Merchandise::class);
    }
}
