<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\User\AccountStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verify_token',
        'role_id',
        'account_status',
        'organizer_id',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verify_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rulesRegister = [
        'name' => 'required|string|max:250',
        'email' => 'required|email|max:250|unique:users',
        'password' => 'required|min:8|confirmed'
    ];

    public static $rulesEdit = [
        'name' => 'required|string|max:250',
    ];

    public static $rulesWithPassword = [
        'name' => 'required|string|max:250',
        'password' => 'required|min:8|confirmed'
    ];

    public static $FILE_PATH = 'uploads/users/';

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function organizer()
    {
        return $this->hasOne(Organizer::class, 'user_id', 'id');
    }

    public function getStatusNameAttribute()
    {
        return $this->account_status !== null ? AccountStatusEnum::fromValue($this->account_status)->description : '-';
    }

    public function getStatusSpan()
    {
        if ($this->account_status == AccountStatusEnum::Active) {
            return '<span class="badge bg-success">Active</span>';
        }

        if ($this->account_status == AccountStatusEnum::Active) {
            return '<span class="badge bg-danger">Disabled</span>';
        }
    }

    public function getPhotoPathAttribute()
    {
        return $this->photo ? url(self::$FILE_PATH . $this->photo) : asset('images/default-profile.png');
    }
}
