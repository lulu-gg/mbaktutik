<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventsCategory extends Model
{
    use HasFactory, SoftDeletes;

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
