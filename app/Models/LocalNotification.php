<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LocalNotification extends Model
{
    use HasFactory;

    protected $table = 'local_notification';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function getNotifications($limit = null)
    {
        $notifications = LocalNotification::where('user_id', Auth::user()->id)
            ->orderBy('status', 'ASC')
            ->orderBy('id', 'DESC');

        if ($limit != null) $notifications->limit($limit);

        return $notifications->get();
    }

    public static function getUnreadNotifications()
    {
        $notifications =  LocalNotification::where('user_id', Auth::user()->id)
            ->where('status', 0)
            ->get();

        return $notifications;
    }
}
