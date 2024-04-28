<?php

namespace App\Http\Middleware\Driver;

use App\Helpers\RoleHelpers;
use Closure;
use Illuminate\Http\Request;

class DriverAuth
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
        if (!RoleHelpers::isDriver()) return redirect()->route('driver.login');

        return $next($request);
    }
}
