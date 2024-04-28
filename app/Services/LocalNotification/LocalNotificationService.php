<?php

namespace App\Services\LocalNotification;

use App\Helpers\RoleHelpers;
use App\Models\LocalNotification;
use App\Models\User;

class LocalNotificationService
{
    public static function createNotification($userId, $title, $message)
    {
        LocalNotification::create(['user_id' => $userId, 'title' => $title, 'description' => $message, 'status' => 0]);
    }

    public static function createAdminNotification($title, $message)
    {
        $usersId = User::where('role_id', RoleHelpers::$ADMIN)->pluck('id')->toArray();
        foreach ($usersId as $userId) {
            LocalNotification::create(['user_id' => $userId, 'title' => $title, 'description' => $message, 'status' => 0]);
        }
    }
}
