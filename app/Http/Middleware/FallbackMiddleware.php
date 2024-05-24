<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FallbackMiddleware
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
        $response = $next($request);

        if ($response->status() == 404) {
            if ($request->is('dashboard/*')) {
                return response()->view('admin.layout.404', [], 404);
            } else {
                return response()->view('frontend.layout.404', [], 404);
            }
        }

        return $response;
    }
}
