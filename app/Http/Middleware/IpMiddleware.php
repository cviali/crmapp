<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class IpMiddleware
{
    public function handle($request, Closure $next)
    {
        $whitelist = DB::table('whitelist')->where('ip', $request->ip())->first();
        if ($whitelist == null) {
            return response('Your IP ' . $request->ip() . ' is unauthorized.', 401);
        }

        return $next($request);
    }
}
