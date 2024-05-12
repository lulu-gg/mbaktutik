<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $logo
 * @property integer $display_order
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Sponsors extends Model
{
    use HasFactory;

    protected $table = 'sponsors';

    public static $FILE_PATH = 'uploads/sponsors/';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'logo', 'display_order', 'status'];

    public static $rules = [
        'name' => 'required',
        'logo' => 'required|file',
        'display_order' => 'required',
        'status' => 'required'
    ];

    public static $rules_update = [
        'name' => 'required',
        'display_order' => 'required',
        'status' => 'required'
    ];

    public function getImagePathAttribute()
    {
        return $this->logo ? url(self::$FILE_PATH . $this->logo) : null;
    }
}
