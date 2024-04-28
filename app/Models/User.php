<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\User\AccountStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'account_status'
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

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'user_id', 'id');
    }

    public function driver()
    {
        return $this->hasOne(Driver::class, 'user_id', 'id');
    }

    public function booking_request()
    {
        return $this->hasMany(BookingRequest::class, 'user_id', 'id');
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
}
