<?php

namespace App\Http\Middleware\Dashboard;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerBookingRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $bookingRequest = $request->bookingRequest;
        if (!is_string($bookingRequest) && $bookingRequest->user_id != Auth::user()->id) {
            abort(404);
        }

        return $next($request);
    }
}
