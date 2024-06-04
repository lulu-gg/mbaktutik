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
    protected $fillable = [
        'user_id',
        'company_name',
        'contact_person',
        'phone',
        'website',
        'about_us',
        'logo',
        'username',
        'province',
        'city',
        'zip',
        'address',
        'proposal',
        'status'
    ];

    public static $rules = [
        'company_name' => 'required',
        'contact_person' => 'required',
        'phone' => 'required',
        'website' => 'required',
    ];

    public static $rulesRegister = [
        'logo' => 'required|file|mimes:png|max:2048',
        'company_name' => 'required',
        'about_us' => 'required',
        'username' => 'required|unique:organizers',
        'email' => 'required|email|unique:users|unique:organizers',
        'phone' => 'required',
        'province' => 'required',
        'city' => 'required',
        'zip' => 'required',
        'address' => 'required',
        'proposal' => 'required|file|mimes:pdf|max:2048',
    ];

    public static $FILE_PATH = 'uploads/event-organizers/';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getLogoPathAttribute()
    {
        return $this->logo ? url(self::$FILE_PATH . $this->logo) : null;
    }

    public function getProposalPathAttribute()
    {
        return $this->proposal ? url(self::$FILE_PATH . $this->proposal) : null;
    }

    public static function getInternalOrganizerId()
    {
        return Organizer::where('is_internal', 1)->first()->id;
    }
}
