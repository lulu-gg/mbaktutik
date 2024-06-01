<?php


namespace App\Helpers;

use App\Models\Events;
use Illuminate\Support\Facades\Auth;

class EventPermissionHelpers
{
    public static function isEventOwner(Events $event)
    {
        if (RoleHelpers::isAdmin()) {
            return true;
        }

        if ($event->event_organizer_id != Auth::user()->organizer->id) {
            return abort(403);
        }

        return true;
    }
}
