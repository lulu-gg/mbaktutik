<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $display_order
 * @property string $image
 * @property string $description
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Thumbnails extends Model
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
    protected $fillable = ['display_order', 'image', 'description', 'status', 'created_at', 'updated_at'];
}
