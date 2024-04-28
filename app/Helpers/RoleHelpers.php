<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class RoleHelpers
{
    public static $ADMIN = 1;
    public static function isAdmin()
    {
        return Auth::check() && Auth::user()->role->id == self::$ADMIN;
    }
}
