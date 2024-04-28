<?php

namespace App\Http\Middleware\Dashboard;

use App\Helpers\RoleHelpers;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAuth
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
        if (!Auth::check() || !RoleHelpers::isClient()) return redirect()->route('dashboard.login');

        return $next($request);
    }
}
