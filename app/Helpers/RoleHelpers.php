<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class RoleHelpers
{
    public static $ADMIN = 1;
    public static $EVENT_ORGANIZER = 2;
    public static $SCAN_OFFICER = 3;
    public static $CUSTOMER = 4;

    public static function isAdmin()
    {
        return Auth::check() && Auth::user()->role->id == self::$ADMIN;
    }

    public static function isEventOrganizer()
    {
        return Auth::check() && Auth::user()->role->id == self::$EVENT_ORGANIZER;
    }

    public static function isScanOfficer()
    {
        return Auth::check() && Auth::user()->role->id == self::$SCAN_OFFICER;
    }

    public static function isCustomer()
    {
        return Auth::check() && Auth::user()->role->id == self::$CUSTOMER;
    }
}
