<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MailHelpers
{
    public static function getAdminEmails()
    {
        return User::where('role_id', RoleHelpers::$ADMIN)->pluck('email')->toArray();
    }
}
