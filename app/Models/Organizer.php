<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $company_name
 * @property string $contact_person
 * @property string $phone
 * @property string $website
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class Organizer extends Model
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
    protected $fillable = ['user_id', 'company_name', 'contact_person', 'phone', 'website'];

    public static $rules = [
        'company_name' => 'required',
        'contact_person' => 'required',
        'phone' => 'required',
        'website' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
