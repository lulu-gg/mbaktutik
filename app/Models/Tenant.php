<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $username
 * @property string $type
 * @property string $city
 * @property string $phone
 * @property integer $sheet_number
 * @property string $photo
 * @property integer $price
 * @property integer $quota
 * @property string $description
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Tenant extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tenant';

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
        'name',
        'username',
        'type',
        'city',
        'phone',
        'sheet_number',
        'photo',
        'price',
        'quota',
        'description',
        'status',
        'created_at',
        'updated_at'
    ];

    public static $rulesRegister = [
        'name' => 'required',
        'type' => 'required',
        'username' => 'required',
        'phone' => 'required',
        'city' => 'required',
        'sheet_number' => 'required', 
        'photo' => 'required|file|mimes:png|max:2048', 
        'price' => 'required',
        'quota' => 'required', 
        'description' => 'required',
    ];

    public static $FILE_PATH = 'uploads/tenant/';

    public function getPhotoPathAttribute()
    {
        return $this->photo ? url(self::$FILE_PATH . $this->photo) : null;
    }
}
