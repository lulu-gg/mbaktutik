<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsCategory extends Model
{
    use HasFactory;

    protected $table = 'events_category';

    protected $fillable = [
        'name',
        'description',
    ];

    public static $rules = [
        'name' => 'required',
        'description' => 'required',
    ];
}
