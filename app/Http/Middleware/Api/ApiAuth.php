<?php

namespace App\Http\Middleware\Api;

use App\Helpers\ApiHelpers;
use App\Helpers\JWTHelpers;
use Closure;
use Illuminate\Http\Request;

class ApiAuth
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
        try {
            $header = $request->header('x-auth');
            if ($header == null) return ApiHelpers::responseUnautorized();

            JWTHelpers::decode($header);

            return $next($request);
        } catch (\Exception $e) {
            return response()->json(['errors' =>  $e->getMessage()], 401);
        }
    }
}
